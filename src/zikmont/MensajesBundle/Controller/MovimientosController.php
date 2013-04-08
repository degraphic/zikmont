<?php

namespace zikmont\FrontEndBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use zikmont\MensajesBundle\GenerarMensajes;
use zikmont\ImpresionesBundle\Control_Impresion;

class MovimientosController extends Control_Impresion {
    /*
     * Lista los movimientos (Encabezado) - Filtro
     */

    public function inventario_movimientos_listaAction($codigoDocumento) {
        $request = $this->getRequest();
        $arMovimientosFrm = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $objFormulario = $this->createForm(new \zikmont\FrontEndBundle\Form\MovimientoNuevoType(), $arMovimientosFrm);

        $em = $this->getDoctrine()->getEntityManager();
        $arMovimientos = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->findBy(array('codigoDocumentoFk' => $codigoDocumento, 'estadoImpreso' => '0'));
        $arDocumento = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->find($codigoDocumento);
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            $objChkFecha = NULL;
            if (isset($arrControles['ChkFecha']))
                $objChkFecha = $arrControles['ChkFecha'];
            $arMovimientos = new \zikmont\InventarioBundle\Entity\InvMovimientos();
            $arMovimientos = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->DevMovimientosFiltro(
                    $codigoDocumento, $arrControles['TxtCodigoMovimiento'], $arrControles['TxtNumeroMovimiento'], $arrControles['TxtCodigoTercero'], $objChkFecha, $arrControles['TxtFechaDesde'], $arrControles['TxtFechaHasta']);

            $objFormulario->bindRequest($request);
            if ($objFormulario->isValid()) {
                $em->persist($arMovimientosFrm);
                $em->flush();
                return $this->redirect($this->generateUrl('inventario_movimientos_lista'));
            }
        }

        return $this->render('zikmontFrontEndBundle:Movimientos:inventario_movimientos_lista.html.twig', array('arMovimientos' => $arMovimientos, 'arDocumento' => $arDocumento, 'objformulario' => $objFormulario->createView()));
    }

    /**
     * Alamacena un nuevo movimiento
     * @return type 
     */
    public function movimientosNuevoAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();

        if ($request->getMethod() == 'POST') {
            $arMovimientoNuevo = new \zikmont\InventarioBundle\Entity\InvMovimientos();
            $codigoTercero = explode("-", $request->request->get('codigotercero'));

            $arTercero = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->find($codigoTercero[1]);
            $arDocumento = new \zikmont\InventarioBundle\Entity\InvDocumentos();
            $arDocumento = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->find($request->request->get('iddocumento'));

            $arMovimientoNuevo->setDocumentoRel($arDocumento);
            $arMovimientoNuevo->setTerceroRel($arTercero);
            $arMovimientoNuevo->setComentarios($request->request->get('comentarios'));
            $arMovimientoNuevo->setSubTotal('0');
            $arMovimientoNuevo->setValorTotalDescuento('0');
            $arMovimientoNuevo->setFecha(date_create(date('Y-m-d H:i:s')));
            $arMovimientoNuevo->setEstadoAutorizado('0');

            $em->persist($arMovimientoNuevo);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('movimientosdetalle', array('codigoMovimiento' => $arMovimientoNuevo->getCodigoMovimientoPk())));
    }

    public function movimientosEditarAction() {
        
    }

    public function movimientosAutorizarAction($codigoMovimiento) {
        set_time_limit(0);

        $objMensaje = new GenerarMensajes(); 
        $em = $this->getDoctrine()->getEntityManager();
        $varAutoriza = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Autorizar($codigoMovimiento);

        if ($varAutoriza instanceof Exception) {
            $objMensaje->Mensaje(2, 'Error', 'Ha ocurrido un error durante la operación');
            return false;
        }
        
        if ($varAutoriza == false) 
            $objMensaje->Mensaje(2, 'Error', 'No se autorizo el movimiento, verifique los datos de inventario (lote, bodega, vencimiento)');            
             

        if ($varAutoriza)
            $objMensaje->Mensaje(1, 'Autorizado', 'El documento ha sido Autorizado');

        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
        $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->findBy(array('codigoMovimientoFk' => $codigoMovimiento));

        return $this->render('zikmontFrontEndBundle:Plantillas:topmenudetalles.html.twig', array('arMovimiento' => $arMovimiento, 'arMovimientosDetalle' => $arMovimientosDetalle));


        set_time_limit(60);
    }

    public function movimientosDesAutorizarAction($codigoMovimiento) {
        $em = $this->getDoctrine()->getEntityManager();
        $Mensaje = new GenerarMensajes();

        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
        $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->findBy(array('codigoMovimientoFk' => $codigoMovimiento));

        if ($arMovimiento->getEstadoImpreso() == 1) {
            $Mensaje->Mensaje(2, 'Desautorizar', 'No se puede desautorizar un documento impreso');
            return $this->render('zikmontFrontEndBundle:Plantillas:topmenudetalles.html.twig', array('arMovimiento' => $arMovimiento, 'arMovimientosDetalle' => $arMovimientosDetalle));
        }

        $Desautorizar = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->DesAutorizar($codigoMovimiento);

        if ($Desautorizar instanceof Exception || $Desautorizar == false) {
            $Mensaje->Mensaje(2, 'Error', 'Ha ocurrido un error durante la operación');
            return $this->render('zikmontFrontEndBundle:Plantillas:topmenudetalles.html.twig', array('arMovimiento' => $arMovimiento, 'arMovimientosDetalle' => $arMovimientosDetalle));
        }

        if ($Desautorizar)
            $Mensaje->Mensaje(1, 'Desautorizado', 'El documento ha sido Desautorizado');

        return $this->render('zikmontFrontEndBundle:Plantillas:topmenudetalles.html.twig', array('arMovimiento' => $arMovimiento, 'arMovimientosDetalle' => $arMovimientosDetalle));
    }

    public function movimientosAbrirAction() {
        
    }

    public function movimientosCerrarAction() {
        
    }

    public function movimientosAnularAction() {
        
    }

    public function movimientosImprimirAction($codigoMovimiento) {
        $em = $this->getDoctrine()->getEntityManager();
        $Mensaje = new GenerarMensajes();

        $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
        
        $arMovimientosDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
        $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->findBy(array('codigoMovimientoFk' => $codigoMovimiento));

        if ($arMovimiento->getEstadoAutorizado() == 1) {
         
            $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Imprimir($codigoMovimiento);

            $this->CounstruirImpresion($arMovimiento->getCodigoDocumentoFk(),$arMovimientosDetalle);

             return $this->render('zikmontFrontEndBundle:Plantillas:topmenudetalles.html.twig', array('arMovimiento' => $arMovimiento, 'arMovimientosDetalle' => $arMovimientosDetalle));
        }
        else {
            $Mensaje->Mensaje(2, 'Impresión', 'No se puede imprimir un documento que no este autorizado');
            return $this->render('zikmontFrontEndBundle:Plantillas:topmenudetalles.html.twig', array('arMovimiento' => $arMovimiento, 'arMovimientosDetalle' => $arMovimientosDetalle));
        }
    }

    /**
     * Lista los movimientos detalle (Detalles) segun encabezado - Filtro
     */
    public function movimientosDetalleAction($codigoMovimiento) {
        $request = $this->getRequest();
        $arMovimientosDetallesFrm = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();

        $objFormulario = $this->createForm(new \zikmont\FrontEndBundle\Form\MovimientoDetalleNuevoType(), $arMovimientosDetallesFrm);
        $em = $this->getDoctrine()->getEntityManager();
        $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->findBy(array('codigoMovimientoFk' => $codigoMovimiento));
        $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
        $arDocumento = new \zikmont\InventarioBundle\Entity\InvDocumentos();
        $arDocumento = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->find($arMovimiento->getCodigoDocumentoFk());
        $arMovimientosRetenciones = new \zikmont\InventarioBundle\Entity\InvMovimientosRetenciones();
        $arMovimientosRetenciones = $em->getRepository('zikmontInventarioBundle:InvMovimientosRetenciones')->findBy(array('codigoMovimientoFk' => $codigoMovimiento));
        if ($request->getMethod() == 'POST') {
            $objFormulario->bindRequest($request);
            if ($objFormulario->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($arMovimientosDetallesFrm);
                $em->flush();
                return $this->redirect($this->generateUrl('movimientosdetalle'));
            }
        }

        return $this->render('zikmontFrontEndBundle:Movimientos:movimientosDetalle.html.twig', array('arMovimiento' => $arMovimiento,
                    'arMovimientosDetalle' => $arMovimientosDetalle,
                    'objformulario' => $objFormulario->createView(),
                    'arDocumento' => $arDocumento,
                    'arMovimientosRetenciones' => $arMovimientosRetenciones));
    }

    /*
     * Eliminar los detalles marcados en la lista de detalles
     */

    public function movimientosAccionEncabezadoAction($codigoDocumento) {
        set_time_limit(0);
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            //$arrControles = $request->request->All();
            if (count($arrSeleccionados) > 0) {
                switch ($request->request->get('OpSubmit')) {
                    case "OpAutorizar";
                        foreach ($arrSeleccionados AS $codigoMovimiento) {
                            $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Autorizar($codigoMovimiento);
                        }
                        break;

                    case "OpImprimir";
                        foreach ($arrSeleccionados AS $codigoMovimiento) {
                            $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Imprimir($codigoMovimiento);
                        }
                        break;
                }
            }
        }
        set_time_limit(60);
        //return $this->render('zikmontFrontEndBundle:Movimientos:prueba.html.twig');
        return $this->redirect($this->generateUrl('inventario_movimientos_lista', array('codigoDocumento' => $codigoDocumento)));
    }

    /*
     * Eliminar los detalles marcados en la lista de detalles
     */

    public function movimientosDetalleAccionItemsAction($codigoMovimiento) {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            $arrControles = $request->request->All();

            if (isset($arrControles['LblCodigoDetalle'])) {
                if (count($arrControles['LblCodigoDetalle']) > 0) {
                    switch ($request->request->get('OpSubmit')) {
                        case "OpEliminar";
                            foreach ($arrSeleccionados AS $objCheck) {
                                $arMovimientoDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($objCheck);
                                $em->remove($arMovimientoDetalle);
                                $em->flush();
                            }
                            break;
                        case "OpCerrar";
                            break;

                        case "OpActualizarDetalles";
                            $intIndice = 0;

                            foreach ($arrControles['LblCodigoDetalle'] as $intCodigoDetalle) {
                                $arMovimientoDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                                $arMovimientoDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($intCodigoDetalle);
                                $arMovimientoDetalle->setLoteFk($arrControles['TxtLote'][$intIndice]);
                                $arMovimientoDetalle->setCodigoBodegaFk($arrControles['TxtBodega'][$intIndice]);
                                $arMovimientoDetalle->setCantidad($arrControles['TxtCantidad'][$intIndice]);
                                $arMovimientoDetalle->setPorcentajeDescuento($arrControles['TxtDescuento'][$intIndice]);
                                $arMovimientoDetalle->setFechaVencimiento(date_create($arrControles['TxtVencimiento'][$intIndice]));


                                $em->persist($arMovimientoDetalle);
                                $em->flush();
                                $intIndice++;
                            }
                            $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Liquidar($codigoMovimiento);

                            break;
                    }
                }
            }
        }
        //return $this->render('zikmontFrontEndBundle:Movimientos:prueba.html.twig');
        return $this->redirect($this->generateUrl('movimientosdetalle', array('codigoMovimiento' => $codigoMovimiento)));
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

    public function movimientosPendientesDetallesAction($codigoMovimiento) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->findBy(array('codigoMovimientoFk' => $codigoMovimiento));
        if ($request->getMethod() == 'POST') {
            
        }

        return $this->render('zikmontFrontEndBundle:Movimientos:movimientosPendientesDetalles.html.twig', array('arMovimientosDetalle' => $arMovimientosDetalle));
    }

}
