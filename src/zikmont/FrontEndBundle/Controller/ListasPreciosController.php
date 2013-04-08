<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;
use Symfony\Component\HttpFoundation\Response;

class ListasPreciosController extends Controller {
    
    public function ListarListasPreciosAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $arListasPrecios = new \zikmont\FrontEndBundle\Entity\ListasPrecios();
        $arListasPrecios = $em->getRepository('zikmontFrontEndBundle:ListasPrecios')->findAll();
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
                        $arListaPrecio = new \zikmont\FrontEndBundle\Entity\ListasPrecios();
                        $arListaPrecio->setNombreListaPrecios($arrControles['TxtNombreLista']);
                        $em->persist($arListaPrecio);
                        $em->flush($arListaPrecio);                            
                        return $this->redirect($this->generateUrl('listarlistasprecios'));
                    }                        
                    else {                        
                        $arListaPrecio = new \zikmont\FrontEndBundle\Entity\ListasPrecios();
                        $arListaPrecio = $em->getRepository('zikmontFrontEndBundle:ListasPrecios')->find($arrControles['LblCodigoLista']);
                        $arListaPrecio->setNombreListaPrecios($arrControles['TxtNombreLista']);
                        $em->persist($arListaPrecio);
                        $em->flush();                        
                    }
                    break;  
                    
                case "OpInactivarListas"; 
                    if(count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoLista) {
                            $arListaPrecio = new \zikmont\FrontEndBundle\Entity\ListasPrecios();                            
                            $arListaPrecio = $em->getRepository('zikmontFrontEndBundle:ListasPrecios')->find($codigoLista);                            
                            if($arListaPrecio->getEstadoInactiva() == 1) 
                                $arListaPrecio->setEstadoInactiva (0);
                            else
                                $arListaPrecio->setEstadoInactiva (1);                            
                            
                            $em->persist($arListaPrecio);
                            $em->flush();                                                              
                        }                         
                    }                    
                    break;                    
            }                           
        }        
        return $this->render('zikmontFrontEndBundle:Maestros/ListasPrecios:listarListasPrecios.html.twig', array('arListasPrecios' => $arListasPrecios));
    } 
    
    public function ListarListasPreciosDetallesAction($codigoListaPrecio, $codigoListaPrecioDetalle) {      
        $em = $this->getDoctrine()->getEntityManager();
        $arListaPrecios = new \zikmont\FrontEndBundle\Entity\ListasPrecios();
        $arListaPrecios = $em->getRepository('zikmontFrontEndBundle:ListasPrecios')->find($codigoListaPrecio);
        $arListasPreciosDetalles = new \zikmont\FrontEndBundle\Entity\ListasPreciosDetalles();
        $arListasPreciosDetalles = $em->getRepository('zikmontInventarioBundle:InvListasPreciosDetalles')->findBy(array('codigoListaPrecioFk' => $codigoListaPrecio));                
        $arListaPreciosDetalle = new \zikmont\FrontEndBundle\Entity\ListasPreciosDetalles();
        $arListaPreciosDetalle = $em->getRepository('zikmontInventarioBundle:InvListasPreciosDetalles')->find($codigoListaPrecioDetalle);        
        if($codigoListaPrecioDetalle != 0)
            echo "";
        return $this->render('zikmontFrontEndBundle:Maestros/ListasPrecios:listarListasPreciosDetalles.html.twig', array('arListasPreciosDetalles' => $arListasPreciosDetalles, 'arListaPrecios' => $arListaPrecios, 'arListaPreciosDetalle' => $arListaPreciosDetalle));
    }  
    
    public function ListasPreciosDetallesAccionesAction($codigoListaPrecio) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager(); 
        $objMensaje = new GenerarMensajes();
        $arListaPrecio = new \zikmont\FrontEndBundle\Entity\ListasPrecios();
        $arListaPrecio = $em->getRepository('zikmontFrontEndBundle:ListasPrecios')->find($codigoListaPrecio);
        if ($request->getMethod() == 'POST') {
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {
                case "OpInactivarDetalle"; 
                    if(count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoLpDetalle) {
                            $arListaPrecioDetalle = new \zikmont\FrontEndBundle\Entity\ListasPreciosDetalles();                            
                            $arListaPrecioDetalle = $em->getRepository('zikmontInventarioBundle:InvListasPreciosDetalles')->find($codigoLpDetalle); 
                            if($arListaPrecioDetalle->getEstadoInactiva() == 1) 
                                $arListaPrecioDetalle->setEstadoInactiva (0);
                            else
                                $arListaPrecioDetalle->setEstadoInactiva (1);                             
                            $em->persist($arListaPrecioDetalle);
                            $em->flush();                                                              
                        }                         
                    }                    
                    break;   
                case "OpGuardar"; 
                    if($arrControles['LblCodigoListaPreciosDetalle'] == 0) {
                        $arListaPrecioDetalle = new \zikmont\FrontEndBundle\Entity\ListasPreciosDetalles();
                        $arItem = new \zikmont\InventarioBundle\Entity\InvItem();
                        $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->find($arrControles['TxtCodigoItem']);
                        if(count($arItem) > 0) {
                            $arListaPrecioDetalle->setListaPrecioRel($arListaPrecio);
                            $arListaPrecioDetalle->setItemRel($arItem);                            
                            $arListaPrecioDetalle->setPrecio($arrControles['TxtPrecio']);
                            $em->persist($arListaPrecioDetalle);
                            $em->flush($arListaPrecioDetalle);                            
                        }  
                        else 
                            $objMensaje->Mensaje("Error", "El item " . $arrControles['TxtCodigoItem'], $this);
                    }                        
                    else {                        
                        $arListaPrecioDetalle = new \zikmont\FrontEndBundle\Entity\ListasPreciosDetalles();
                        $arListaPrecioDetalle = $em->getRepository('zikmontInventarioBundle:InvListasPreciosDetalles')->find($arrControles['LblCodigoListaPreciosDetalle']);
                        $arListaPrecioDetalle->setPrecio($arrControles['TxtPrecio']);
                        $em->persist($arListaPrecioDetalle);
                        $em->flush();                        
                    }
                    break;                     
                                        
            }                           
        }       
        return $this->redirect($this->generateUrl('listarlistaspreciosdetalles', array('codigoListaPrecio' => $codigoListaPrecio)));        
    }
    
    public function ListarListasPreciosDetallesEditarAction($codigoListaPrecioDetalle) {        
        $em = $this->getDoctrine()->getEntityManager();
        $arListasPreciosDetalle = new \zikmont\FrontEndBundle\Entity\ListasPreciosDetalles();
        if($codigoListaPrecioDetalle != 0)
            $arListasPreciosDetalle = $em->getRepository('zikmontInventarioBundle:InvListasPreciosDetalles')->find($codigoListaPrecioDetalle);        
        else
            $arListasPreciosDetalle = null;
        return $this->render('zikmontFrontEndBundle:Maestros/ListasPrecios:listarListasPreciosDetallesEditar.html.twig', array('arListasPreciosDetalle' => $arListasPreciosDetalle));
    }    
    
    public function NuevaListasPreciosAction($codigoListaPrecios) { 
        $em = $this->getDoctrine()->getEntityManager();        
        $arListaPrecios = new \zikmont\FrontEndBundle\Entity\ListasPrecios();
        if($codigoListaPrecios != 0)
            $arListaPrecios = $em->getRepository ('zikmontFrontEndBundle:ListasPrecios')->find ($codigoListaPrecios);
        else
            $arListaPrecios = null;
        
        return $this->render('zikmontFrontEndBundle:Maestros/ListasPrecios:nuevaListasPrecios.html.twig', array('arListaPrecios' => $arListaPrecios));
    }     
}
