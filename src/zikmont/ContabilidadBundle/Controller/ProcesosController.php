<?php

namespace zikmont\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class ProcesosController extends Controller
{           
    public function cierreCajaAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager(); 
        $arCierresCaja = new \zikmont\ContabilidadBundle\Entity\CierresCaja();
        $arCierresCaja = $em->getRepository('zikmontContabilidadBundle:CierresCaja')->findAll();  
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {                    
                case "OpGenerar"; 
                    if($arrControles['TxtFecha'] != "") {
                        $arCierreCajaNuevo = new \zikmont\ContabilidadBundle\Entity\CierresCaja();
                        $arCierreCajaNuevo->setFecha(date_create($arrControles['TxtFecha']));
                        $arCierreCajaNuevo->setBase($arrControles['TxtBase']);
                        $em->persist($arCierreCajaNuevo);
                        $em->flush(); 
                        $em->getRepository('zikmontContabilidadBundle:CierresCaja')->LiquidarCierreCaja($arCierreCajaNuevo->getCodigoCierreCajaPk());                                            
                    }
                    break;                     
            }                           
        }        
        return $this->render('zikmontContabilidadBundle:Procesos:cierreCaja.html.twig', array('arCierresCaja' => $arCierresCaja));        
    }  
    
    public function cierreCajaAccionesAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager(); 
        $objMensaje = new GenerarMensajes();
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {                    
                case "OpGenerar"; 
                    if($arrControles['TxtFecha'] != "") {
                        $arCierreCajaNuevo = new \zikmont\ContabilidadBundle\Entity\CierresCaja();
                        $arCierreCajaNuevo->setFecha(date_create($arrControles['TxtFecha']));
                        $arCierreCajaNuevo->setBase($arrControles['TxtBase']);
                        $arCierreCajaNuevo->setComentarios($arrControles['TxtComentarios']);
                        $em->persist($arCierreCajaNuevo);
                        $em->flush(); 
                        $em->getRepository('zikmontContabilidadBundle:CierresCaja')->LiquidarCierreCaja($arCierreCajaNuevo->getCodigoCierreCajaPk());                                            
                    }
                    break;
                    
                case "OpEliminar"; 
                    if(count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoCierreCaja) {
                            $arCierresCajaDetalle = new \zikmont\ContabilidadBundle\Entity\CierresCajaDetalle();
                            $arCierresCajaDetalle = $em->getRepository('zikmontContabilidadBundle:CierresCajaDetalle')->findBy(array('codigoCierreCajaFk' => $codigoCierreCaja));                            
                            if(count($arCierresCajaDetalle) <= 0) {
                                $arCierreCaja = new \zikmont\ContabilidadBundle\Entity\CierresCaja();
                                $arCierreCaja = $em->getRepository('zikmontContabilidadBundle:CierresCaja')->find($codigoCierreCaja);                            
                                $em->remove($arCierreCaja);
                                $em->flush();                                                                                         
                            }
                        } 
                    }                    
                    break;                                        
            }                           
        }        
        return $this->redirect($this->generateUrl('contabilidadcierrecaja'));
        
    }    
    
    public function cierreCajaDetalleAction($codigoCierreCaja) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager(); 
        $arCierresCajaDetalle = new \zikmont\ContabilidadBundle\Entity\CierresCajaDetalle();
        $arCierresCajaDetalle = $em->getRepository('zikmontContabilidadBundle:CierresCajaDetalle')->findBy(array('codigoCierreCajaFk' => $codigoCierreCaja));        
        $arCierreCaja = new \zikmont\ContabilidadBundle\Entity\CierresCaja();
        $arCierreCaja = $em->getRepository('zikmontContabilidadBundle:CierresCaja')->find($codigoCierreCaja);
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {
                case "OpEliminar"; 
                    if(count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoCierreCajaDetalle) {
                            $arCierreCajaDetalle = new \zikmont\ContabilidadBundle\Entity\CierresCajaDetalle();
                            $arCierreCajaDetalle = $em->getRepository('zikmontContabilidadBundle:CierresCajaDetalle')->find($codigoCierreCajaDetalle);
                            $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
                            $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($arCierreCajaDetalle->getCodigoMovimientoFk());
                            $em->remove($arCierreCajaDetalle);
                            $em->flush();                            
                            $arMovimiento->setCierreCaja(0);
                            $em->persist($arMovimiento);
                            $em->flush();                                    
                        } 
                        $em->getRepository('zikmontContabilidadBundle:CierresCaja')->LiquidarCierreCaja($codigoCierreCaja);
                    }                    
                    break;                                         
            }                           
        }        
        return $this->render('zikmontContabilidadBundle:Procesos:cierreCajaDetalle.html.twig', array('arCierresCajaDetalle' => $arCierresCajaDetalle, 'arCierreCaja' => $arCierreCaja));
    }    
    
    public function cierreCajaDetalleAccionesAction($codigoCierreCaja) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager(); 
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {
                case "OpEliminar"; 
                    if(count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoCierreCajaDetalle) {
                            $arCierreCajaDetalle = new \zikmont\ContabilidadBundle\Entity\CierresCajaDetalle();
                            $arCierreCajaDetalle = $em->getRepository('zikmontContabilidadBundle:CierresCajaDetalle')->find($codigoCierreCajaDetalle);
                            $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
                            $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($arCierreCajaDetalle->getCodigoMovimientoFk());
                            $em->remove($arCierreCajaDetalle);
                            $em->flush();                            
                            $arMovimiento->setCierreCaja(0);
                            $em->persist($arMovimiento);
                            $em->flush();                                    
                        } 
                        $em->getRepository('zikmontContabilidadBundle:CierresCaja')->LiquidarCierreCaja($codigoCierreCaja);
                    }                    
                    break;                     
            }                           
        }       
        return $this->redirect($this->generateUrl('contabilidadcierrecajadetalle', array('codigoCierreCaja' => $codigoCierreCaja)));        
    }    
    
    public function agregarMovimientoCierreCajaAction($codigoCierreCaja) {
        $em = $this->getDoctrine()->getEntityManager(); 
        $request = $this->getRequest();
        $arMovimientos = new \zikmont\InventarioBundle\Entity\InvMovimientos();          
        $arMovimientos = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->DevMovimientosFacturasPos();
        $arCierreCaja = new \zikmont\ContabilidadBundle\Entity\CierresCaja();
        $arCierreCaja = $em->getRepository('zikmontContabilidadBundle:CierresCaja')->find($codigoCierreCaja);
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {
                case "OpAgregar"; 
                    if(count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoMovimiento) {
                            $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
                            $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
                            $arCierreCajaDetalle = new \zikmont\ContabilidadBundle\Entity\CierresCajaDetalle();
                            $arCierreCajaDetalle->setCierreCajaRel($arCierreCaja);
                            $arCierreCajaDetalle->setMovimientoRel($arMovimiento);
                            $arCierreCajaDetalle->setTotal($arMovimiento->getTotal());
                            $em->persist($arCierreCajaDetalle);
                            $em->flush();
                            $arMovimiento->setCierreCaja(1);
                            $em->persist($arMovimiento);
                            $em->flush();                                    
                        }
                        $em->getRepository('zikmontContabilidadBundle:CierresCaja')->LiquidarCierreCaja($codigoCierreCaja);
                    }
                    echo "<script languaje='javascript' type='text/javascript'>window.close();window.opener.location.reload();</script>";
                    break;                
            }                           
        }        
        
        return $this->render('zikmontContabilidadBundle:Procesos:agregarMovimientoCierreCaja.html.twig', array('arMovimientos' => $arMovimientos, 'arCierreCaja' => $arCierreCaja));                
    }
    
    public function cierreMesAction()    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();        
        if ($request->getMethod() == 'POST') {
            $intCodigoCierreMesContabilidad = $request->request->get('OpSubmit');
            $arTercero = new \zikmont\FrontEndBundle\Entity\GenTerceros();
            $arCuentaContable = new \zikmont\ContabilidadBundle\Entity\CtbCuentasContables();
            $arCierreMesContabilidad = new \zikmont\ContabilidadBundle\Entity\CtbCierresMes();            
            $arCierreMesContabilidad = $em->getRepository('zikmontContabilidadBundle:CtbCierresMes')->find($intCodigoCierreMesContabilidad);            
            
            //Generar control de retenciones
            $arMovimientosContables = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
            $arMovimientosContables = $em->getRepository('zikmontContabilidadBundle:CtbMovimientos')->DevMovimientosRetencionesResumidoTercero($arCierreMesContabilidad->getFechaInicio(), $arCierreMesContabilidad->getFechaFin());                
            foreach ($arMovimientosContables as $arMovimientosContables) {
                $arTercero = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->find($arMovimientosContables['codigoTerceroFk']);
                $arCtbControlRetenciones = new \zikmont\ContabilidadBundle\Entity\CtbControlRetenciones();
                $arCtbControlRetenciones->setAnnio($arCierreMesContabilidad->getAnnio());
                $arCtbControlRetenciones->setMes($arCierreMesContabilidad->getMes());
                $arCtbControlRetenciones->setTerceroRel($arTercero);
                $arCtbControlRetenciones->setValor($arMovimientosContables['debito']);
                $em->persist($arCtbControlRetenciones);
                $em->flush();                
            }
            //Guardar resumen por cuenta en movimientos contables resumen
            /*$arMovimientosContables = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
            $arMovimientosContables = $em->getRepository('zikmontContabilidadBundle:MovimientosContables')->DevMovimientosContablesFechaResumidoCuenta($arCierreMesContabilidad->getFechaInicio(), $arCierreMesContabilidad->getFechaFin());            
            foreach ($arMovimientosContables as $arMovimientosContables) {
                $arMovimientosContablesResumen = new \zikmont\ContabilidadBundle\Entity\MovimientosContablesResumen();
                $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimientosContables['codigoCuentaFk']);
                $arMovimientosContablesResumen->setCiereMesContabilidadRel($arCierreMesContabilidad);
                $arMovimientosContablesResumen->setAnnio($arCierreMesContabilidad->getAnnio());
                $arMovimientosContablesResumen->setMes($arCierreMesContabilidad->getMes());                
                $arMovimientosContablesResumen->setDebito($arMovimientosContables['debito']);
                $arMovimientosContablesResumen->setCredito($arMovimientosContables['credito']);
                $arMovimientosContablesResumen->setBase($arMovimientosContables['base']);
                $arMovimientosContablesResumen->setCuentaRel($arCuentaContable);
                $em->persist($arMovimientosContablesResumen);
                $em->flush();                
            }             
            //Guardar registros en historico
            $arMovimientosContablesRemover = new \zikmont\ContabilidadBundle\Entity\MovimientosContablesHistorico();
            $arMovimientosContables = $em->getRepository('zikmontContabilidadBundle:MovimientosContables')->DevMovimientosContablesFecha($arCierreMesContabilidad->getFechaInicio(), $arCierreMesContabilidad->getFechaFin());                        
            foreach ($arMovimientosContables as $arMovimientosContables) {            
                $arMovimientosContablesRemover = $em->getRepository('zikmontContabilidadBundle:MovimientosContables')->find($arMovimientosContables->getCodigoMovimientoContablePk());
                $arMovimientosContablesHistorico = new \zikmont\ContabilidadBundle\Entity\MovimientosContablesHistorico();
                $arMovimientosContablesHistorico->setFecha($arMovimientosContables->getFecha());
                $arMovimientosContablesHistorico->setDebito($arMovimientosContables->getDebito());
                $arMovimientosContablesHistorico->setCredito($arMovimientosContables->getCredito());
                $arMovimientosContablesHistorico->setBase($arMovimientosContables->getBase());
                $arMovimientosContablesHistorico->setCuentaRel($arMovimientosContables->getCuentaRel());
                $arMovimientosContablesHistorico->setComprobanteContableRel($arMovimientosContables->getComprobanteContableRel());                
                $arMovimientosContablesHistorico->setTerceroRel($arMovimientosContables->getTerceroRel());
                $arMovimientosContablesHistorico->setNumeroMovimiento($arMovimientosContables->getNumeroMovimiento());
                $em->persist($arMovimientosContablesHistorico);
                $em->flush();
                //$em->remove($arMovimientosContablesRemover);
                //$em->flush();
            }*/
            
        }        
        $arCierresMesLista = new \zikmont\ContabilidadBundle\Entity\CtbCierresMes();
        $arCierresMesLista = $em->getRepository('zikmontContabilidadBundle:CtbCierresMes')->findAll();        
        return $this->render('zikmontContabilidadBundle:Procesos:cierreMes.html.twig', array('arCierresMes' => $arCierresMesLista));
    }     
    
    public function contabilizarAsientosAction() {
        $em = $this->getDoctrine()->getEntityManager(); 
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {                                      
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            switch ($request->request->get('OpSubmit')) {
                case "OpContabilizar"; 
                    if(count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoAsiento) {
                            $arAsientoAct = new \zikmont\ContabilidadBundle\Entity\CtbAsientos();
                            $arAsientoAct = $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->find($codigoAsiento);
                            $arAsientosDetalles = new \zikmont\ContabilidadBundle\Entity\CtbAsientosDetalles();
                            $arAsientosDetalles = $em->getRepository('zikmontContabilidadBundle:CtbAsientosDetalles')->findBy(array('codigoAsientoFk' => $codigoAsiento));
                            foreach($arAsientosDetalles as $arAsientoDetalle) {
                                $arMovimientoContable = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                                $arMovimientoContable->setTerceroRel($arAsientoDetalle->getTerceroRel());
                                $arMovimientoContable->setCuentaRel($arAsientoDetalle->getCuentaRel()); 
                                $arMovimientoContable->setCentroCostosRel($arAsientoDetalle->getCentroCostosRel());
                                $arMovimientoContable->setComprobanteContableRel($arAsientoAct->getComprobanteContableRel());
                                $arMovimientoContable->setFecha($arAsientoAct->getFecha());
                                $arMovimientoContable->setDebito($arAsientoDetalle->getDebito());
                                $arMovimientoContable->setCredito($arAsientoDetalle->getCredito());
                                $arMovimientoContable->setNumeroMovimiento($arAsientoAct->getNumeroAsiento());
                                $arMovimientoContable->setDetalle($arAsientoDetalle->getDescripcionContable());
                                $em->persist($arMovimientoContable);
                                $em->flush();
                            } 
                            //$arAsientoAct->setEstadoContabilizado(1);
                            //$em->persist($arAsientoAct);
                            //$em->flush();
                        }   
                    }
                    break;
            }                               
        }               
        $arAsientos = new \zikmont\ContabilidadBundle\Entity\CtbAsientos();
        $arAsientos = $em->getRepository('zikmontContabilidadBundle:CtbAsientos')->findBy(array('estadoImpreso' => 1, 'estadoContabilizado' => 0));
        return $this->render('zikmontContabilidadBundle:Procesos/Contabilizar:asientos.html.twig', array('arAsientos' => $arAsientos));                        
    }
    
    public function contabilizarMovimientosAction($codigoDocumentoTipo) {
        set_time_limit(0);
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $arMovimientos = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->findBy(array('codigoDocumentoTipoFk' => $codigoDocumentoTipo, 'estadoContabilizado' => 0, 'estadoAutorizado' => 1));
        $arDocumentoTipo = $em->getRepository('zikmontFrontEndBundle:DocumentosTipo')->find($codigoDocumentoTipo);
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            switch ($request->request->get('OpSubmit')) {
                case "OpContabilizar";
                    foreach ($arrSeleccionados AS $intCodigoMovimiento)
                        $em->getRepository('zikmontContabilidadBundle:CtbMovimientos')->ContabilizarMovimiento($intCodigoMovimiento);
                    break;
            }
        }
        set_time_limit(60);

        return $this->render('zikmontContabilidadBundle:Procesos/Contabilizar:movimientos.html.twig', array('arMovimientos' => $arMovimientos, 'arDocumentoTipo' => $arDocumentoTipo));
    }    
}
