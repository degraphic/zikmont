<?php

namespace zikmont\InventarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class MovimientosAgregarLoteController extends Controller
{   
    /*
     * Lista los lotes
     */
    public function listaAction($codigoMovimientoDetalle) {                
        $request = $this->getRequest();                   
        $em = $this->getDoctrine()->getEntityManager();
        $arMovimientoDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
        $arMovimientoDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($codigoMovimientoDetalle);        
        $arLotes = new \zikmont\InventarioBundle\Entity\InvLotes();        
        $arLotes = $em->getRepository('zikmontInventarioBundle:InvLotes')->DevLotesExistencia($arMovimientoDetalle->getCodigoItemFk());   
        if ($request->getMethod() == 'POST') {                        
            
        }                                                       
        return $this->render('zikmontInventarioBundle:Movimientos:agregarLote.html.twig', array('arLotes' => $arLotes,'intCodigoMovimientoDetalle'=>$codigoMovimientoDetalle));                                        
    }    
    
    public function AsignarLoteAction($codigoMovimientoDetalle) {                
        $request = $this->getRequest();                   
        $em = $this->getDoctrine()->getEntityManager();
        $arMovimientoDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
        $arMovimientoDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($codigoMovimientoDetalle);        
        $arLotes = new \zikmont\InventarioBundle\Entity\InvLotes();        
        $arLotes = $em->getRepository('zikmontInventarioBundle:InvLotes')->DevLotesExistencia($arMovimientoDetalle->getCodigoItemFk());   
        if ($request->getMethod() == 'POST') {                        
            
        }                                                       
        return $this->render('zikmontFrontEndBundle:Movimientos:movimientosAgregarLote.html.twig', array('arLotes' => $arLotes));                                        
    }    
    
  
    
}
