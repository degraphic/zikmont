<?php

namespace zikmont\InventarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class ProcesosController extends Controller {   
    
    public function regenerarKardexAction() {
        $request = $this->getRequest();
        $objMensaje = new GenerarMensajes();
        if ($request->getMethod() == 'POST') {
            $this->regenerarKardexGlobal();
            $objMensaje->Mensaje("completado", "El proceso de regeneracion de kardex se a ejecutado con exito", $this);
        }
        return $this->render('zikmontInventarioBundle:Procesos/Inventario:regenerarKardex.html.twig');
    }    
    
    public function regenerarCostosAction() {
        set_time_limit(0);
        $request = $this->getRequest();
        $objMensaje = new GenerarMensajes();        
        if ($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getEntityManager();             
            $arItems = new \zikmont\InventarioBundle\Entity\InvItem();
            $arItems = $em->getRepository('zikmontInventarioBundle:InvItem')->findAll();
            foreach($arItems as $arItem) {
                $douCostoPromedio = 0;
                $intExistenciaAnterior = 0;
                $arMovimientosDetalles = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevMovimientosDetallesOperacion("", "", $arItem->getCodigoItemPk());     
                foreach ($arMovimientosDetalles as $arMovimientosDetalle) {
                    $arMovimientoDetalleAct = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                    $arMovimientoDetalleAct = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($arMovimientosDetalle['codigoDetalleMovimientoPk']);
                    //Si el documento de este movimiento es generador de costo se debe recalcular el costo promedio
                    if($arMovimientoDetalleAct->getMovimientoRel()->getDocumentoRel()->getGeneraCostoPromedio() == 1) {
                        $arMovimientoDetalleAct->setCosto($arMovimientoDetalleAct->getPrecio());                        
                        $douCostoPromedio = \zikmont\FrontEndBundle\Repository\MovimientosDetallesRepository::CacularCostoPromedio($intExistenciaAnterior, $arMovimientoDetalleAct->getCantidad(), $douCostoPromedio, $arMovimientoDetalleAct->getCosto());                                                                        
                    }   
                    else 
                        $arMovimientoDetalleAct->setCosto($douCostoPromedio);                                            
                        
                    $arMovimientoDetalleAct->setCostoPromedio($douCostoPromedio);
                    $em->persist($arMovimientoDetalleAct);
                    $em->flush();                        
                    $intExistenciaAnterior = $intExistenciaAnterior + $arMovimientoDetalleAct->getCantidadOperada();
                }
                $arItemAct = new \zikmont\InventarioBundle\Entity\InvItem();
                $arItemAct = $em->getRepository('zikmontInventarioBundle:InvItem')->find($arItem->getCodigoItemPk());
                $arItemAct->setCostoPromedio($douCostoPromedio);
                $em->persist($arItemAct);
                $em->flush();
            }
            $objMensaje->Mensaje("completado", "El proceso de regeneracion de costos se a ejecutado con exito", $this);
        }
        set_time_limit(0);
        return $this->render('zikmontInventarioBundle:Procesos/Inventario:regenerarCostos.html.twig');            
    }  
    
    public function cierreMesAction () {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            $arCierreMesInventarioProcesar = new \zikmont\InventarioBundle\Entity\InvCierresMes();
            $arCierreMesInventarioProcesar = $em->getRepository('zikmontInventarioBundle:InvCierresMes')->find($arrControles['BtnCerrar']);   
            $arMovimientoDetalles = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
            $dateFechaDesde = date_format($arCierreMesInventarioProcesar->getFechaInicio(), 'Y-m-d');
            $dateFechaHasta = date_format($arCierreMesInventarioProcesar->getFechaFin(), 'Y-m-d');
            $douTotalVentas = 0;
            $douTotalCompras = 0;
            $arMovimientoDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevMovimientosDetallesResumen($dateFechaDesde, $dateFechaHasta, "", "", 4);
            if(count($arMovimientoDetalles) > 0) 
                $douTotalVentas = $arMovimientoDetalles[0][1];

            $arMovimientoDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevMovimientosDetallesResumen($dateFechaDesde, $dateFechaHasta, "", "", 1);
            if(count($arMovimientoDetalles) > 0) 
                $douTotalCompras = $arMovimientoDetalles[0][1];             
            
            $arCierreMesInventarioProcesar->setTotalCompras($douTotalCompras);
            $arCierreMesInventarioProcesar->setTotalVentas($douTotalVentas);
            //$arCierreMesInventarioProcesar->setEstadoCerrado(1);    
            
            //Guardar los costos de los movimientos de inventario
            $arDocumentos = new \zikmont\InventarioBundle\Entity\InvDocumentos();
            $arDocumentos = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->findAll();
            foreach ($arDocumentos as $arDocumento) {                
                $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->DevMovimientosResumenCosto($dateFechaDesde, $dateFechaHasta, $arDocumento->getCodigoDocumentoPk(), "");                
                if(count($arMovimiento) > 0) {
                    $douTotal = $arMovimiento[0][1];             
                    if($douTotal > 0) {
                        $arCierreMesInventarioDocumentos = new \zikmont\FrontEndBundle\Entity\CierresMesInventarioDocumentos();
                        $arCierreMesInventarioDocumentos->setCierreMesInventarioRel($arCierreMesInventarioProcesar);
                        $arCierreMesInventarioDocumentos->setDocumentoRel($arDocumento);    
                        $arCierreMesInventarioDocumentos->setTotalCosto($douTotal);
                        $em->persist($arCierreMesInventarioDocumentos);
                        $em->flush();
                    }                    
                }
                    
            }
            
            //Guardar los lotes y cantidades            
            //Regenera el kardex para evitar inconsistencias
            $this->regenerarKardexGlobal(date_format($arCierreMesInventarioProcesar->getFechaFin(), 'Y-m-d H:i:s'));
            $arLotes = new \zikmont\InventarioBundle\Entity\InvLotes();
            $arLotes = $em->getRepository('zikmontInventarioBundle:InvLotes')->DevLotesExistenciaTodos();
            foreach ($arLotes as $arLotes) {
                $arCierreMesLotes = new \zikmont\InventarioBundle\Entity\InvCierresMesLotes();
                $arCierreMesLotes->setCierreMesRel($arCierreMesInventarioProcesar);
                $arCierreMesLotes->setExistencia($arLotes->getExistencia());
                $arCierreMesLotes->setItemRel($arLotes->getItemRel());
                $arCierreMesLotes->setLoteFk($arLotes->getLoteFk());
                $arCierreMesLotes->setCodigoBodegaFk($arLotes->getCodigoBodegaFk());                
                $em->persist($arCierreMesLotes);
                $em->flush();
            }
            
            $arCierreMesInventarioProcesar->setEstadoCerrado(1);
            $em->persist($arCierreMesInventarioProcesar);
            $em->flush();
            $this->regenerarKardexGlobal();
            
        }
        $arCierreMesInventario = new \zikmont\InventarioBundle\Entity\InvCierresMes();
        $arCierreMesInventario = $em->getRepository('zikmontInventarioBundle:InvCierresMes')->findBy(array('annio' => 2013));        
        return $this->render('zikmontInventarioBundle:Procesos/Inventario:cierreMes.html.twig', array('arCierreMesInventario' => $arCierreMesInventario));
    }
    
    public function regenerarKardexGlobal($dateFechaHasta = "") {
            $em = $this->getDoctrine()->getEntityManager(); 
            $em->getRepository('zikmontInventarioBundle:InvLotes')->ReiniciarValoresLotes(); 
            $em->getRepository('zikmontInventarioBundle:InvItem')->ReiniciarExistencias(); 
            $arItemes = new \zikmont\InventarioBundle\Entity\InvItem();
            $arItemes = $em->getRepository('zikmontInventarioBundle:InvItem')->findAll();
            $arUltimoCierreMes = new \zikmont\InventarioBundle\Entity\InvCierresMes();
            $arUltimoCierreMes = $em->getRepository('zikmontInventarioBundle:InvCierresMes')->UltimoCierre();
            $dateUltimoCierreMes = date_format($arUltimoCierreMes[0]->getFechaFin(), 'Y-m-d H:i:s');
            foreach ($arItemes as $arItemes) {
                //Verifica si hay cierres
                if(count($dateUltimoCierreMes) > 0) {
                    //Asigna las catidades del corte que es el ultimo cierre
                    $em->getRepository('zikmontInventarioBundle:InvCierresMesLotes')->AsigarDatosLotesCierreALotes($arUltimoCierreMes[0]->getCodigoCierreMesPk(), $arItemes->getCodigoItemPk());
                    $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevMovimientosDetallesInventario($arItemes->getCodigoItemPk(), $dateUltimoCierreMes, $dateFechaHasta);                                                                
                }                    
                else
                    $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevMovimientosDetallesInventario($arItemes->getCodigoItemPk(), "", $dateFechaHasta);                                                                

                foreach($arMovimientosDetalles as $arMovimientosDetalle) {
                    $arLoteAct = new \zikmont\InventarioBundle\Entity\InvLotes();
                    $arLoteAct = $em->getRepository('zikmontInventarioBundle:InvLotes')->find(array('codigoItemFk' => $arMovimientosDetalle['codigoItemFk'], 'codigoBodegaFk' => $arMovimientosDetalle['codigoBodegaFk'], 'loteFk' => $arMovimientosDetalle['loteFk']));                
                    $arLoteAct->setExistencia($arLoteAct->getExistencia() + $arMovimientosDetalle['cantidadOperada']); 
                    //$arLoteAct->setCantidadDisponible($arLoteAct->getCantidadDisponible() + $arMovimientosDetalle['cantidadOperada']); 
                    $em->persist($arLoteAct);
                    $em->flush();
                }               
            }
            $em->getRepository('zikmontInventarioBundle:InvLotes')->EstablecerExistenciaItems();         
    }
}
