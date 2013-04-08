<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;
use Symfony\Component\HttpFoundation\Response;

class ListasCostosController extends Controller {
    public function ListarListasCostosAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $arListasCostos = new \zikmont\FrontEndBundle\Entity\ListasCostos();
        $arListasCostos = $em->getRepository('zikmontFrontEndBundle:ListasCostos')->findAll();
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {
                case "OpEliminar"; 
                    if(count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoLpDetalle) {
                            //$arListaPrecioDetalle = new \zikmont\FrontEndBundle\Entity\ListasPreciosDetalles();                            
                            //$arListaPrecioDetalle = $em->getRepository('zikmontInventarioBundle:InvListasPreciosDetalles')->find($codigoLpDetalle);                            
                            //$em->remove($arListaPrecioDetalle);
                            //$em->flush();                                                              
                        }                         
                    }                    
                    break;   
                case "OpGuardar"; 
                    if($arrControles['LblCodigoLista'] == 0) {
                        $arListaCosto = new \zikmont\FrontEndBundle\Entity\ListasCostos();
                        $arListaCosto->setNombreListaCostos($arrControles['TxtNombreLista']);
                        $arListaCosto->setFechaCreacion(date_create(date('Y-m-d H:i:s')));
                        $arListaCosto->setFechaHasta($arrControles['TxtFechaHasta']);
                        $em->persist($arListaCosto);
                        $em->flush($arListaCosto);                          
                        return $this->redirect($this->generateUrl('listarlistascostos'));
                    }                        
                    else {                        
                        $arListaCosto = new \zikmont\FrontEndBundle\Entity\ListasCostos();
                        $arListaCosto = $em->getRepository('zikmontFrontEndBundle:ListasCostos')->find($arrControles['LblCodigoLista']);
                        $arListaCosto->setNombreListaCostos($arrControles['TxtNombreLista']);
                        $em->persist($arListaCosto);
                        $em->flush();                        
                    }
                    break; 
                    
                case "OpInactivarListas"; 
                    if(count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoLista) {
                            $arListaCosto = new \zikmont\FrontEndBundle\Entity\ListasCostos();                            
                            $arListaCosto = $em->getRepository('zikmontFrontEndBundle:ListasCostos')->find($codigoLista);                            
                            if($arListaCosto->getEstadoInactiva() == 1) 
                                $arListaCosto->setEstadoInactiva (0);
                            else
                                $arListaCosto->setEstadoInactiva (1);                            
                            
                            $em->persist($arListaCosto);
                            $em->flush();                                                              
                        }                         
                    }                    
                    break;                     
            }                           
        }         
        return $this->render('zikmontFrontEndBundle:Maestros/ListasCostos:listarListasCostos.html.twig', array('arListasCostos' => $arListasCostos));
    } 
    
    public function ListarListasCostosDetallesAction($codigoListaCostos) {      
        $em = $this->getDoctrine()->getEntityManager();
        $arListaCostos = new \zikmont\FrontEndBundle\Entity\ListasCostos();
        $arListaCostos = $em->getRepository('zikmontFrontEndBundle:ListasCostos')->find($codigoListaCostos);
        $arListasCostosDetalles = new \zikmont\FrontEndBundle\Entity\ListasCostosDetalles();
        $arListasCostosDetalles = $em->getRepository('zikmontInventarioBundle:InvListasCostosDetalles')->findBy(array('codigoListaCostoFk' => $codigoListaCostos));                
        return $this->render('zikmontFrontEndBundle:Maestros/ListasCostos:listarListasCostosDetalles.html.twig', array('arListasCostosDetalles' => $arListasCostosDetalles, 'arListaCostos' => $arListaCostos));
    }  
    
    public function ListasCostosDetallesAccionesAction($codigoListaCostos) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager(); 
        $objMensaje = new GenerarMensajes();
        $arListaCosto = new \zikmont\FrontEndBundle\Entity\ListasCostos();
        $arListaCosto = $em->getRepository('zikmontFrontEndBundle:ListasCostos')->find($codigoListaCostos);
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {
                case "OpInactivarDetalle"; 
                    if(count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoLpDetalle) {
                            $arListaCostoDetalle = new \zikmont\FrontEndBundle\Entity\ListasCostosDetalles();                            
                            $arListaCostoDetalle = $em->getRepository('zikmontInventarioBundle:InvListasCostosDetalles')->find($codigoLpDetalle);                            
                            if($arListaCostoDetalle->getEstadoInactiva() == 1) 
                                $arListaCostoDetalle->setEstadoInactiva (0);
                            else
                                $arListaCostoDetalle->setEstadoInactiva (1); 
                            $em->persist($arListaCostoDetalle);
                            $em->flush();                                                              
                        }                         
                    }                    
                    break;   
                case "OpGuardar"; 
                    if($arrControles['LblCodigoListaCostosDetalle'] == 0) {
                        $arListaCostoDetalle = new \zikmont\FrontEndBundle\Entity\ListasCostosDetalles();
                        $arItem = new \zikmont\InventarioBundle\Entity\InvItem();
                        $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->find($arrControles['TxtCodigoItem']);
                        if(count($arItem) > 0) {
                            $arListaCostoDetalle->setListaCostosRel($arListaCosto);
                            $arListaCostoDetalle->setItemRel($arItem);                            
                            $arListaCostoDetalle->setCosto($arrControles['TxtCosto']);
                            $em->persist($arListaCostoDetalle);
                            $em->flush($arListaCostoDetalle);                            
                        }  
                        else 
                            $objMensaje->Mensaje("Error", "El item " . $arrControles['TxtCodigoItem'], $this);
                    }                        
                    else {                        
                        $arListaCostoDetalle = new \zikmont\FrontEndBundle\Entity\ListasCostosDetalles();
                        $arListaCostoDetalle = $em->getRepository('zikmontInventarioBundle:InvListasCostosDetalles')->find($arrControles['LblCodigoListaCostosDetalle']);
                        $arListaCostoDetalle->setCosto($arrControles['TxtCosto']);
                        $em->persist($arListaCostoDetalle);
                        $em->flush();                        
                    }

                    break;                     
            }                           
        }       
        return $this->redirect($this->generateUrl('listarlistascostosdetalles', array('codigoListaCostos' => $codigoListaCostos)));        
    }
    
    public function ListarListasCostosDetallesEditarAction($codigoListaCostosDetalle) {        
        $em = $this->getDoctrine()->getEntityManager();
        $arListasCostosDetalle = new \zikmont\FrontEndBundle\Entity\ListasCostosDetalles();
        if($codigoListaCostosDetalle != 0)
            $arListasCostosDetalle = $em->getRepository('zikmontInventarioBundle:InvListasCostosDetalles')->find($codigoListaCostosDetalle);        
        else
            $arListasCostosDetalle = null;
        return $this->render('zikmontFrontEndBundle:Maestros/ListasCostos:listarListasCostosDetallesEditar.html.twig', array('arListasCostosDetalle' => $arListasCostosDetalle));
    }    

    public function NuevaListasCostosAction($codigoListaCostos) { 
        $em = $this->getDoctrine()->getEntityManager();        
        $arListaCostos = new \zikmont\FrontEndBundle\Entity\ListasCostos();
        if($codigoListaCostos != 0)
            $arListaCostos = $em->getRepository ('zikmontFrontEndBundle:ListasCostos')->find ($codigoListaCostos);
        else
            $arListaCostos = null;
        
        return $this->render('zikmontFrontEndBundle:Maestros/ListasCostos:nuevaListasCostos.html.twig', array('arListaCostos' => $arListaCostos));
    }    
    
}