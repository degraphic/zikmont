<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use zikmont\MensajesBundle\GenerarMensajes;

class MovimientosCivilesPresupuestosController extends Controller {

    /**
     * Lista los presupuestos (Encabezado) - Filtro
     */
    public function listaAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            if (count($arrSeleccionados) > 0) {
                switch ($request->request->get('OpSubmit')) {
                    case "OpEliminar";
                        foreach ($arrSeleccionados AS $codigoMovimiento) {
                            $arMovimientoCivilPresupuesto = new \zikmont\FrontEndBundle\Entity\MovimientosCivilesPresupuestos();
                            $arMovimientoCivilPresupuesto = $em->getRepository('zikmontFrontEndBundle:MovimientosCivilesPresupuestos')->find($codigoMovimiento);
                            if ($arMovimientoCivilPresupuesto->getEstadoAutorizado() == 0) {
                                if ($em->getRepository('zikmontFrontEndBundle:MovimientosCivilesPresupuestosDetalles')->DevNroDetallesMovimiento($codigoMovimiento) <= 0) {
                                    $em->remove($arMovimientoCivilPresupuesto);
                                    $em->flush();
                                }
                            }
                        }
                        break;
                }
            }
        }
        $arMovimientosCivilesPresupuestos = new \zikmont\FrontEndBundle\Entity\MovimientosCivilesPresupuestos();                              
        $arMovimientosCivilesPresupuestos = $em->getRepository('zikmontFrontEndBundle:MovimientosCivilesPresupuestos')->findAll();        
        return $this->render('zikmontFrontEndBundle:Movimientos/Civiles/Presupuestos:lista.html.twig', array('arMovimientosCivilesPresupuestos' => $arMovimientosCivilesPresupuestos));
    }

    /**
     * Genera la plantilla de nuevo movimiento
     * @return Render plantilla de nuevo
     */
    public function nuevoAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $codigoTercero = explode("-", $request->request->get('TxtCodigoTercero'));
            $arTercero = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->find($codigoTercero[0]);            
            $arMovimientoCivilPresupuesto = new \zikmont\FrontEndBundle\Entity\MovimientosCivilesPresupuestos();
            $arMovimientoCivilPresupuesto->setTerceroRel($arTercero);
            $arMovimientoCivilPresupuesto->setFecha(date_create(date('Y-m-d H:i:s')));
            $arMovimientoCivilPresupuesto->setNombrePresupuesto($request->request->get('TxtNombre'));
            $arMovimientoCivilPresupuesto->setComentarios($request->request->get('comentarios'));            
            $em->persist($arMovimientoCivilPresupuesto);
            $em->flush();
            return $this->redirect($this->generateUrl('movimientos_civiles_presupuestos_lista'));
        }
        return $this->render('zikmontFrontEndBundle:Movimientos/Civiles/Presupuestos:nuevo.html.twig');
    }
    
    /**
     * Genera la plantilla de nuevo movimiento
     * @return Render plantilla de nuevo
     */
    public function detalleAction($codigoMovimientoCivilPresupuesto) {
        $em = $this->getDoctrine()->getEntityManager();        
        $request = $this->getRequest();
        $arMovimientosCivilesPresupuestos = new \zikmont\FrontEndBundle\Entity\MovimientosCivilesPresupuestos();
        $arMovimientosCivilesPresupuestos = $em->getRepository('zikmontFrontEndBundle:MovimientosCivilesPresupuestos')->find($codigoMovimientoCivilPresupuesto);
        if ($request->getMethod() == 'POST') {
                switch ($request->request->get('OpSubmit')) {
                    case "OpEliminar";
                        $arrSeleccionados = $request->request->get('ChkSeleccionar');
                        if (count($arrSeleccionados) > 0) {
                            foreach ($arrSeleccionados AS $codigoMovimientoDetalle) {
                                $arMovimientoCivilPresupuestoDetalle = new \zikmont\FrontEndBundle\Entity\MovimientosCivilesPresupuestosDetalles();
                                $arMovimientoCivilPresupuestoDetalle = $em->getRepository('zikmontFrontEndBundle:MovimientosCivilesPresupuestosDetalles')->find($codigoMovimientoDetalle);                                
                                $em->remove($arMovimientoCivilPresupuestoDetalle);
                                $em->flush();                                                                
                            }
                        }
                        break;                
            }
        }
        $arMovimientosCivilesPresupuestosDetalles = new \zikmont\FrontEndBundle\Entity\MovimientosCivilesPresupuestosDetalles();        
        $arMovimientosCivilesPresupuestosDetalles = $em->getRepository('zikmontFrontEndBundle:MovimientosCivilesPresupuestosDetalles')->findBy(array('codigoMovimientoCivilPresupuestoFk' => $codigoMovimientoCivilPresupuesto));        
        return $this->render('zikmontFrontEndBundle:Movimientos/Civiles/Presupuestos:detalle.html.twig', array('arMovimientosCivilesPresupuestos' => $arMovimientosCivilesPresupuestos, 'arMovimientosCivilesPresupuestosDetalles' => $arMovimientosCivilesPresupuestosDetalles));
    }    
    
    public function agregarItemAction($codigoMovimientoCivilPresupuesto) {
        $em = $this->getDoctrine()->getEntityManager();        
        $request = $this->getRequest();        
        $arMovimientoCivilPresupuesto = new \zikmont\FrontEndBundle\Entity\MovimientosCivilesPresupuestos();
        $arMovimientoCivilPresupuesto = $em->getRepository('zikmontFrontEndBundle:MovimientosCivilesPresupuestos')->find($codigoMovimientoCivilPresupuesto);        
        if ($request->getMethod() == 'POST') {            
            $arrControles = $request->request->All();
            if (isset($arrControles['TxtCantidad'])) {
                $intIndice = 0;                
                $arMovimientosCivilesPresupuestosItem = new \zikmont\FrontEndBundle\Entity\MovimientosCivilesPresupuestosItems();
                foreach ($arrControles['LblCodigoItem'] as $intCodigoItem) {  
                    if($arrControles['TxtCantidad'][$intIndice] != "" && $arrControles['TxtCantidad'][$intIndice] != 0) {                                                
                        $arMovimientosCivilesPresupuestosItem = $em->getRepository('zikmontFrontEndBundle:MovimientosCivilesPresupuestosItems')->find($intCodigoItem);                                                
                        $intCantidad = $arrControles['TxtCantidad'][$intIndice];
                        $arMovimientosCivilesPresupuestosDetalleAct = new \zikmont\FrontEndBundle\Entity\MovimientosCivilesPresupuestosDetalles();
                        $arMovimientosCivilesPresupuestosDetalleAct->setItemRel($arMovimientosCivilesPresupuestosItem);
                        $arMovimientosCivilesPresupuestosDetalleAct->setPresupuestoRel($arMovimientoCivilPresupuesto);   
                        $arMovimientosCivilesPresupuestosDetalleAct->setCantidad($intCantidad);
                        $em->persist($arMovimientosCivilesPresupuestosDetalleAct);
                        $em->flush();                           
                    }
                    $intIndice++;
                }                
                echo "<script languaje='javascript' type='text/javascript'>window.close();window.opener.location.reload();</script>";                
            }            
        }
        $arMovimientosCivilesPresupuestosItems = new \zikmont\FrontEndBundle\Entity\MovimientosCivilesPresupuestosItems();
        $arMovimientosCivilesPresupuestosItems = $em->getRepository('zikmontFrontEndBundle:MovimientosCivilesPresupuestosItems')->findAll();        
        return $this->render('zikmontFrontEndBundle:Movimientos/Civiles/Presupuestos:agregarItem.html.twig', array('arMovimientosCivilesPresupuestosItems' => $arMovimientosCivilesPresupuestosItems, 'arMovimientoCivilPresupuesto' => $arMovimientoCivilPresupuesto));
    }
}
