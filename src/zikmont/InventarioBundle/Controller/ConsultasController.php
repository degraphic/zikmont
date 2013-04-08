<?php

namespace zikmont\InventarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ConsultasController extends Controller {

    public function kardexAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $arMovimientosDetalle = "";
        $intUltimoItem = "";
        $intCodigoDocumento = "";
        $intCodigoTercero = "";
        $strLote = "";
        $intBodega = "";
        $dateDesde = "";
        $dateHasta = "";

        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();

            //Item
            $arrayItem = explode("-", $arrControles['TxtCodigoItem']);
            $intUltimoItem = $arrayItem[0];
//          
            // Fecha
            $dateDesde = $arrControles['TxtFechaDesde'];
            $dateHasta = $arrControles['TxtFechaHasta'];

            // Documento
            $intCodigoDocumento = $arrControles['CboDocumentos'];

            $arrayTercero = explode("-", $arrControles['terceroconsulta']);
            $intCodigoTercero = $arrayTercero[0];

            $strLote = $arrControles['TxtLote'];
            $intBodega = $arrControles['TxtBodega'];

            $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevMovimientosDetalles($intUltimoItem, $intCodigoDocumento, $intCodigoTercero, $strLote, $intBodega,$dateDesde,$dateHasta);
        }

        $arDocumentos = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->DevDocumentos();

        return $this->render('zikmontInventarioBundle:Consultas/Inventario:kardex.html.twig', array('arMovimientosDetalle' => $arMovimientosDetalle,
                    'arDocumentos' => $arDocumentos,
                    'ultimo_item' => $intUltimoItem,
                    'lote' => $strLote,
                    'bodega' => $intBodega,
                    'codigo_documento' => $intCodigoDocumento,
                    'codigo_tercero' => $intCodigoTercero,
                    'fecha_desde'=>$dateDesde,
                    'fecha_hasta'=>$dateHasta));
    }

    /**
     * Consulta las cantidades en existencia de un producto con ul lote determinado
     * @return vista disponibles 
     * */
    public function disponiblesAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        $arrControles = $request->request->All();
        $arExistencias = "";
        $arPedidos = "";
        $arOrdenes = "";
        $intCodigoProducto = "";

        if ($request->getMethod() == 'POST') {
            $intCodigoProducto = $arrControles['TxtCodigoItem'];
            $arExistencias = $em->getRepository('zikmontInventarioBundle:InvLotes')->DevLotesExistencia($intCodigoProducto);
            $arPedidos = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevPedidosPendientes($intCodigoProducto);
        }

        return $this->render('zikmontInventarioBundle:Consultas/Inventario:disponibles.html.twig', array('arExistencias' => $arExistencias,
                    'arPedidos' => $arPedidos,
                    'arOrdenes' => $arOrdenes,
                    'ultimo_item' => $intCodigoProducto));
    }

    public function existenciasAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $intUltimoItem = "";
        $strLote = "";
        $intBodega = "";
        
        $arLotes = new \zikmont\InventarioBundle\Entity\InvLotes();
        $arLotes = $em->getRepository('zikmontInventarioBundle:InvLotes')->DevLotesExistenciaFiltro();
        return $this->render('zikmontInventarioBundle:Consultas/Inventario:existencias.html.twig', array('arLotes' => $arLotes, 'intItem' => "",'ultimo_item' => $intUltimoItem, 'lote' => $strLote,'bodega' => $intBodega));
    }
    
    public function inventarioValorizadoAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager(); 
        $arTemporalInventarioValorizado = new \zikmont\FrontEndBundle\Entity\TemporalInventarioValorizado();        
        $intUltimoItem = "";        
        $dateDesde = "";
        $dateHasta = "";

        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            //Item
            $arrayItem = explode("-", $arrControles['TxtCodigoItem']);
            $intUltimoItem = $arrayItem[0];
            // Fecha
            $dateDesde = $arrControles['TxtFechaDesde'];
            $dateHasta = $arrControles['TxtFechaHasta'];
            
            
            $objQuery = $em->createQuery('DELETE FROM zikmontFrontEndBundle:TemporalInventarioValorizado')->getResult();            
            
            $arItems = new \zikmont\InventarioBundle\Entity\InvItem();
            if($intUltimoItem != "")                            
                $arItems = $em->getRepository('zikmontInventarioBundle:InvItem')->findBy(array('codigoItemPk' => $intUltimoItem));
            else
                $arItems = $em->getRepository('zikmontInventarioBundle:InvItem')->findAll();
            foreach ($arItems as $arItem) {
                $douCostoPromedio = 0;
                $intExistenciaAnterior = 0;
                $arMovimientosDetalles = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevMovimientosDetallesGeneranCosto($dateDesde, $dateHasta, $arItem->getCodigoItemPk()); 
                foreach ($arMovimientosDetalles as $arMovimientoDetalle) {
                    if($arMovimientoDetalle['generaCostoPromedio'] == 1)
                        $douCostoPromedio = \zikmont\FrontEndBundle\Repository\MovimientosDetallesRepository::CacularCostoPromedio($intExistenciaAnterior, $arMovimientoDetalle['cantidadOperada'], $douCostoPromedio, $arMovimientoDetalle['costo']);                                                                            
                    $intExistenciaAnterior = $intExistenciaAnterior + $arMovimientoDetalle['cantidadOperada'];
                } 
                if($intExistenciaAnterior > 0) {
                    $arRegistroInventarioValorizado = new \zikmont\FrontEndBundle\Entity\TemporalInventarioValorizado();
                    $arRegistroInventarioValorizado->setItemMD($arItem);  
                    $arRegistroInventarioValorizado->setCostoPromedio($douCostoPromedio);
                    $arRegistroInventarioValorizado->setSaldo($intExistenciaAnterior);
                    $arRegistroInventarioValorizado->setTotalPromedio($douCostoPromedio * $intExistenciaAnterior);
                    $em->persist($arRegistroInventarioValorizado);
                    $em->flush();
                }
            } 
            $arTemporalInventarioValorizado = $em->getRepository('zikmontFrontEndBundle:TemporalInventarioValorizado')->findAll();
        }        
        return $this->render('zikmontFrontEndBundle:Consultas/Inventario:inventarioValorizado.html.twig', array(
                    'arTemporalInventarioValorizado' => $arTemporalInventarioValorizado,
                    'ultimo_item' => $intUltimoItem,
                    'fecha_desde'=>$dateDesde,
                    'fecha_hasta'=>$dateHasta));        
        
    }    

    public function itemAction($codigoItem) {
        $em = $this->getDoctrine()->getEntityManager();
        $arItem = new \zikmont\InventarioBundle\Entity\InvItem();
        $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->find($codigoItem);
        $arLotes = new \zikmont\InventarioBundle\Entity\InvLotes();        
        $arLotes = $em->getRepository('zikmontInventarioBundle:InvLotes')->DevLotesExistencia($codigoItem);
        return $this->render('zikmontInventarioBundle:Consultas/Inventario:item.html.twig', array('arLotes' => $arLotes, 'arItem' => $arItem));
    }
    
    public function generalAnalisisGeneralAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $arCierreMesInventario = new \zikmont\InventarioBundle\Entity\InvCierresMes();
        $arCierreMesInventario = $em->getRepository('zikmontInventarioBundle:InvCierresMes')->findAll();
        return $this->render('zikmontFrontEndBundle:Consultas/General:analisisGeneral.html.twig', array('arCierreMesInventario' => $arCierreMesInventario));
    }
    
    public function comercialesPresupuestosAction() {
        $em = $this->getDoctrine()->getEntityManager();
        return $this->render('zikmontFrontEndBundle:Consultas/Comerciales:presupuestos.html.twig');
    }    

    /*
     * Lista los movimientos detalle (Detalles) segun encabezado - Filtro
     */

    public function movimientosPendientesAction($codigoDocumentoTipo) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $arMovimientos = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $arMovimientos = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->findBy(array('codigoDocumentoTipoFk' => $codigoDocumentoTipo, 'estadoAutorizado' => 1, 'estadoCerrado' => 0));
        if ($request->getMethod() == 'POST') {

        }

        return $this->render('zikmontFrontEndBundle:Movimientos:movimientosPendientes.html.twig', array('arMovimientos' => $arMovimientos));
    }

    /**
     * Genera un listado de los detalles pendientes de un movimiento
     * @param integer $codigoMovimiento El codigo del movimiento a consultar
     * @return Render Movimientos:movimientosPendientesDetalles
     */
    public function movimientosPendientesDetallesAction($codigoMovimiento, $codigoDocumentoTipo) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $arDocumentosTipos = new \zikmont\FrontEndBundle\Entity\DocumentosTipo();
        $arDocumentosTipos = $em->getRepository('zikmontFrontEndBundle:DocumentosTipo')->findAll();
        $arDocumentos = new \zikmont\InventarioBundle\Entity\InvDocumentos();
        $arDocumentos = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->findAll();

        $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevMovimientosDetallesPendientes(0, $codigoDocumentoTipo);

        if ($request->getMethod() == 'POST') {

        }

        return $this->render('zikmontInventarioBundle:Consultas/Inventario:movimientosPendientesDetalles.html.twig', array(
                    'arMovimientosDetalle' => $arMovimientosDetalle,
                    'arDocumentos' => $arDocumentos,
                    'arDocumentosTipos' => $arDocumentosTipos,
                    'intCodigoDocumentoTipo' => $codigoDocumentoTipo,
                    'intCodigoDocumento' => 0));
    }    
    
}

