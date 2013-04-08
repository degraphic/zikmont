<?php

namespace zikmont\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\ImpresionesBundle\Formatos;
use zikmont\MensajesBundle\GenerarMensajes;

class AsientosController extends Controller {

    public function asientosNuevoAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        
        $arComprobantesContables = new \zikmont\ContabilidadBundle\Entity\CtbComprobantesContables();
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();            
            $arComprobanteContable = $em->getRepository('zikmontContabilidadBundle:CtbComprobantesContables')->find($arrControles['CboComprobanteContable']);            
            $arAsientoNuevo = new \zikmont\ContabilidadBundle\Entity\CtbAsientos();                        
            $arAsientoNuevo->setComentarios($arrControles['TxtComentarios']);
            $arAsientoNuevo->setFecha(date_create($arrControles['TxtFecha']));
            $arAsientoNuevo->setFechaCreacion(date_create(date('Y-m-d H:i:s')));
            $arAsientoNuevo->setComprobanteContableRel($arComprobanteContable);            
            $em->persist($arAsientoNuevo);
            $em->flush();
            return $this->redirect($this->generateUrl('contabilidad_asientos_detalles', array('codigoAsiento' => $arAsientoNuevo->getCodigoAsientoPk())));
        }
        
        $arComprobantesContables = $em->getRepository('zikmontContabilidadBundle:CtbComprobantesContables')->findAll();                
        return $this->render('zikmontContabilidadBundle:Asientos:asientosNuevo.html.twig', array('arComprobantesContables' => $arComprobantesContables));
    }    
    
    public function listaAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        //$arAsientoTipo = new \zikmont\FrontEndBundle\Entity\AsientosTipos();
        //$arAsientoTipo = $em->getRepository('zikmontFrontEndBundle:AsientosTipos')->find($codigoAsientoTipo);
        $arAsientos = new \zikmont\ContabilidadBundle\Entity\CtbAsientos();
        $objControles = array('TxtNumero' => '', 'CboComprobantes' => '', 'TxtFechaDesde' => '', 'TxtFechaHasta' => ''); 
        if ($request->getMethod() == 'POST') {
            $objControles = $request->request->all();
            $arrSeleccionados = $request->request->get('ChkSeleccionar');            
            switch ($request->request->get('OpSubmit')) {
                case "OpEliminar";
                    if (count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoAsiento) {
                            $arAsiento = new \zikmont\ContabilidadBundle\Entity\CtbAsientos();
                            $arAsiento = $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->find($codigoAsiento);
                            if ($arAsiento->getEstadoAutorizado() == 0) {
                                if ($em->getRepository('zikmontContabilidadBundle:CtbAsientosDetalles')->DevNroDetallesAsiento($codigoAsiento) <= 0) {
                                    $em->remove($arAsiento);
                                    $em->flush();
                                }
                            }
                        }
                    }
                    break;
                case "OpBuscar";
                    $arAsientos = $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->DevAsientos($objControles['TxtNumero'], $objControles['CboComprobantes'], "", "", 0);
                    break;                                        
            }
            
        }
        else {
            $arAsientos = $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->findBy(array('estadoContabilizado' => 0));  
        }
            

        $arComprobantes = new \zikmont\ContabilidadBundle\Entity\CtbComprobantesContables();
        $arComprobantes = $em->getRepository('zikmontContabilidadBundle:CtbComprobantesContables')->findAll();
        return $this->render('zikmontContabilidadBundle:Asientos:asientosLista.html.twig', array(
            'arAsientos' => $arAsientos,
            'arComprobantes' => $arComprobantes,
            'objControles' => $objControles
            ));
    }

    public function detallesAction($codigoAsiento) {
        $request = $this->getRequest();
        $objMensaje = new GenerarMensajes();
        $em = $this->getDoctrine()->getEntityManager();
        $arAsiento = new \zikmont\ContabilidadBundle\Entity\CtbAsientos();
        $arAsiento = $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->find($codigoAsiento);
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            switch ($request->request->get('OpSubmit')) {                
                case "OpAutorizar";
                    $strResultado = $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->Autorizar($codigoAsiento);
                    if ($strResultado != "")
                        $objMensaje->Mensaje("error", "No se autorizo el asiento: " . $strResultado, $this);
                    break;
                
                case "OpDesAutorizar";
                    $strResultado = $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->DesAutorizar($codigoAsiento);
                    if ($strResultado != "")
                        $objMensaje->Mensaje("error", "No se desautorizo el asiento: " . $strResultado, $this);
                    break;                    

                case "OpImprimir";                                        
                    $strResultado = $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->Imprimir($codigoAsiento);
                    $objFormato = new Formatos\FormatoComprobanteEgreso();                       
                    $objFormato->Generar($em, $arAsiento);                    
                    break;                     
                    
                case "OpEliminarDetalle";
                    if (count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoAsientoDetalle) {
                            $arAsientoDetalle = new \zikmont\ContabilidadBundle\Entity\CtbAsientosDetalles();
                            $arAsientoDetalle = $em->getRepository('zikmontContabilidadBundle:CtbAsientosDetalles')->find($codigoAsientoDetalle);
                            $em->remove($arAsientoDetalle);
                            $em->flush();
                        }
                        $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->Liquidar($codigoAsiento);
                    }
                    break;

                case "OpAgregar";
                    try {
                        $arAsientoDetalle = new \zikmont\ContabilidadBundle\Entity\CtbAsientosDetalles();
                        $arAsientoDetalle->setAsientoRel($arAsiento);
                        $intCentroCostos = $arrControles['CboCentroCostos'];                        
                        $arrayCuenta = explode("-", $arrControles['TxtCuenta']);
                        $arrayTercero = explode("-", $arrControles['TxtCodigoTercero']);
                        if (is_array($arrayCuenta))
                            $intCuenta = $arrayCuenta[0];
                        elseif (is_numeric($arrControles['TxtCuenta']))
                            $intCuenta = $arrControles['TxtCuenta'];
                        
                        if (is_array($arrayTercero))
                            $intTercero = $arrayTercero[0];
                        elseif (is_numeric($arrControles['TxtCodigoTercero']))
                            $intTercero = $arrControles['TxtCodigoTercero'];
                        
                        if($arrControles['TxtDebito'] != 0 && $arrControles['TxtCredito'] != 0) {
                            $objMensaje->Mensaje("error", "No puede tener valores en el dato debito y credito al mismo tiempo", $this);                                                        
                        }
                        else {
                            $arCuenta = new \zikmont\ContabilidadBundle\Entity\CtbCuentasContables();
                            $arCuenta = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($intCuenta);
                            $arTercero = new \zikmont\FrontEndBundle\Entity\GenTerceros();
                            $arTercero = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->find($intTercero);
                            $arCentroCostos = new \zikmont\ContabilidadBundle\Entity\CtbCentrosCostos();
                            $arCentroCostos = $em->getRepository('zikmontContabilidadBundle:CtbCentrosCostos')->find($intCentroCostos);
                            if(count($arCuenta) > 0) {
                                if($arCuenta->getPermiteMovimientos() == 1) {
                                    $arAsientoDetalle->setCuentaRel($arCuenta);
                                    $arAsientoDetalle->setTerceroRel($arTercero);
                                    $arAsientoDetalle->setCentroCostosRel($arCentroCostos);
                                    $arAsientoDetalle->setDebito($arrControles['TxtDebito']);
                                    $arAsientoDetalle->setCredito($arrControles['TxtCredito']);
                                    $arAsientoDetalle->setBase($arrControles['TxtBase']);
                                    $arAsientoDetalle->setDescripcionContable($arrControles['TxtDescripcion']);
                                    $em->persist($arAsientoDetalle);
                                    $em->flush();
                                    $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->Liquidar($codigoAsiento);                                                            
                                }
                                else
                                    $objMensaje->Mensaje("error", "La cuenta no permite movimientos", $this);
                            }  
                            else 
                                $objMensaje->Mensaje("error", "No se encontro la cuenta", $this);                                                                                                                            
                        }
                                                   
                        break;
                    } catch (Exception $e) {
                        $objMensaje = new GenerarMensajes();
                        $objMensaje->Mensaje('error', "Error al grabar el asiento", $this);
                    }
            }
            return $this->redirect($this->generateUrl('contabilidad_asientos_detalles', array('codigoAsiento' => $codigoAsiento)));
        } else {
            $arAsientosDetalles = $em->getRepository('zikmontContabilidadBundle:CtbAsientosDetalles')->findBy(array('codigoAsientoFk' => $codigoAsiento));
            $arCentrosCostos = $em->getRepository('zikmontContabilidadBundle:CtbCentrosCostos')->findAll();
        }


        return $this->render('zikmontContabilidadBundle:Asientos:asientosDetalle.html.twig', array('arAsientosDetalles' => $arAsientosDetalles, 'arAsiento' => $arAsiento, 'arCentrosCostos' => $arCentrosCostos));
    }



}
