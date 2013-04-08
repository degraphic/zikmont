<?php

namespace zikmont\InventarioBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MovimientosAgregarItemController extends Controller
{   
    
    public function listaItemAction($codigoMovimiento) {                
        $request = $this->getRequest();                   
        $em = $this->getDoctrine()->getEntityManager();
        $arItemes = $em->getRepository('zikmontInventarioBundle:InvItem')->findAll();     
        $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            switch ($request->request->get('OpSubmit')) {
                case "OpBuscar";
                    if($request->request->get('TxtDescripcionItem') != "")    
                        $arItemes = $em->getRepository('zikmontInventarioBundle:InvItem')->BuscarDescripcionItem($request->request->get('TxtDescripcionItem'));     

                    if($request->request->get('TxtCodigoItem') != "")    
                        $arItemes = $em->getRepository('zikmontInventarioBundle:InvItem')->find($request->request->get('TxtCodigoItem'));                     
                    break;      
                case "OpAgregar";                    
                    if (isset($arrControles['TxtCantidad'])) {
                        $intIndice = 0;                
                        foreach ($arrControles['LblCodigoItem'] as $intCodigoItem) {  
                            if($arrControles['TxtCantidad'][$intIndice] != "" && $arrControles['TxtCantidad'][$intIndice] != 0) {
                                $arItem = new \zikmont\InventarioBundle\Entity\InvItem();
                                $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->find($intCodigoItem);                    
                                $intCantidad = $arrControles['TxtCantidad'][$intIndice];

                                $arMovimientoDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();                    
                                $arMovimientoDetalle->setMovimientoRel($arMovimiento);
                                $arMovimientoDetalle->setCantidad($intCantidad);

                                if($arMovimiento->getDocumentoRel()->getTipoValor() == 2)                        
                                    $arMovimientoDetalle->setPrecio($em->getRepository('zikmontInventarioBundle:InvListasPreciosDetalles')->DevPrecio($arMovimiento->getCodigoTerceroFk(), $intCodigoItem));

                                if($arMovimiento->getDocumentoRel()->getTipoValor() == 1)                        
                                    $arMovimientoDetalle->setPrecio($em->getRepository('zikmontInventarioBundle:InvListasCostosDetalles')->DevCosto($arMovimiento->getCodigoTerceroFk(), $intCodigoItem));

                                $arMovimientoDetalle->setItemRel($arItem);
                                $arMovimientoDetalle->setPorcentajeIva($arItem->getPorcentajeIva());
                                $arMovimientoDetalle->setLoteFk("SL");
                                $arMovimientoDetalle->setFechaVencimiento(date_create('2020/12/30')); 
                                $arMovimientoDetalle->setCodigoBodegaFk(1);

                                $em->persist($arMovimientoDetalle);
                                $em->flush();                           
                            }
                            $intIndice++;
                        }                
                        echo "<script languaje='javascript' type='text/javascript'>window.close();window.opener.location.reload();</script>";                
                    }                    
                    break;      
            }            
        }        
        return $this->render('zikmontInventarioBundle:Movimientos:agregarItem.html.twig', array('arItems' => $arItemes, 'arMovimiento' => $arMovimiento));                                        
    }    
    
    /*
     * Lista los items
     */
    public function documentosControlAction($codigoMovimiento) {                                  
        $em = $this->getDoctrine()->getEntityManager();        
        $arMovimientos = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);        
        $arMovimientos = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->DevMovimientosDocumentosControl($arMovimientos->getcodigoDocumentoFk(), $arMovimientos->getCodigoTerceroFk());                                                               
        return $this->render('zikmontInventarioBundle:Movimientos:documentosControl.html.twig', array('arMovimientos' => $arMovimientos, 'intCodigoMovimientoOrigen' => $codigoMovimiento));                                        
    }    
    

    /*
     * Lista los items
     */
    public function documentosControlDetalleAction($codigoMovimiento, $codigoMovimientoOrigen) {                
        $request = $this->getRequest();                   
        $em = $this->getDoctrine()->getEntityManager();        
        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
        $arMovimientoOrigen = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimientoOrigen);        
        $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevMovimientosDetallesPendientesAfectar($codigoMovimiento);       
        
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            $intIndice = 0;
            if (isset($arrControles['LblCodigoDetalle'])) {
                if (count($arrControles['LblCodigoDetalle']) > 0) {                    
                    foreach ($arrControles['LblCodigoDetalle'] as $intCodigoDetalle) {
                        if($arrControles['TxtCantidad'][$intIndice] != "" && $arrControles['TxtCantidad'][$intIndice] != 0) {
                            $intCantidad = $arrControles['TxtCantidad'][$intIndice];
                            $arMovimientoDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                            $arMovimientoDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($intCodigoDetalle);                            
                            if(($arMovimientoDetalle->getCantidadAfectada() + $intCantidad) <= $arMovimientoDetalle->getCantidad()) {
                                $arMovimientoDetalleAct = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();                
                                $arMovimientoDetalleAct->setMovimientoRel($arMovimientoOrigen);                                
                                $arMovimientoDetalleAct->setItemRel($arMovimientoDetalle->getItemRel());
                                $arMovimientoDetalleAct->setCodigoBodegaFk($arMovimientoDetalle->getCodigoBodegaFk());
                                $arMovimientoDetalleAct->setLoteFk($arMovimientoDetalle->getLoteFk());
                                $arMovimientoDetalleAct->setFechaVencimiento($arMovimientoDetalle->getFechaVencimiento());
                                $arMovimientoDetalleAct->setCantidad($intCantidad);
                                $arMovimientoDetalleAct->setCantidadOperada($intCantidad * $arMovimientoOrigen->getDocumentoRel()->getOperacionInventario());
                                $arMovimientoDetalleAct->setPrecio($arMovimientoDetalle->getPrecio());
                                $arMovimientoDetalleAct->setPorcentajeIva($arMovimientoDetalle->getPorcentajeIva());
                                $arMovimientoDetalleAct->setPorcentajeDescuento($arMovimientoDetalle->getPorcentajeDescuento());                                
                                $arMovimientoDetalleAct->setCodigoDetalleMovimientoEnlace($arMovimientoDetalle->getCodigoDetalleMovimientoPk());                                                                
                                //La operacion de inventario se le asigna al autorizar
                                //$arMovimientoDetalleAct->setOperacionInventario($em->getRepository('zikmontInventarioBundle:InvItem')->DevOperacionInventario($arMovimientoOrigen->getDocumentoRel()->getOperacionInventario(), $arMovimientoDetalle->getItemMD()->getItemServicio()));
                                
                                $em->persist($arMovimientoDetalleAct);
                                $em->flush();
                                $arMovimientoDetalle->setCantidadAfectada($arMovimientoDetalle->getCantidadAfectada() + $intCantidad);
                                $em->persist($arMovimientoDetalle);
                                $em->flush();                                
                            }
                        }                            
                        $intIndice++;
                    }
                    
                    $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Liquidar($codigoMovimiento);
                    
                    echo "<script languaje='javascript' type='text/javascript'>window.close();window.opener.location.reload();</script>";
                }                
            }                          
        }
        
        return $this->render('zikmontInventarioBundle:Movimientos:documentosControlDetalle.html.twig', 
                array(
                    'arMovimientosDetalle' => $arMovimientosDetalle,
                    'arMovimiento' => $arMovimiento,
                    'intCodigoMovimientoOrigen' => $codigoMovimientoOrigen));                                        
    }    
    
}
