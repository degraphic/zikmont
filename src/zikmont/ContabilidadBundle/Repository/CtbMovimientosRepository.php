<?php

namespace zikmont\ContabilidadBundle\Repository;
use Doctrine\ORM\EntityRepository;

/**
 * MovimientosContablesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CtbMovimientosRepository extends EntityRepository
{
    /**
     * Contabiliza un movimiento
     * @param integer $codigoMovimiento codigo del movimiento que se va a procesar.
     * */
    public function ContabilizarMovimiento($codigoMovimiento) {
        $em = $this->getEntityManager();
        $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
        if($arMovimiento->getEstadoContabilizado() == 0) {
            //----------------------Va por tipo de documento        
            //Documento de compras
            if($arMovimiento->getDocumentoRel()->getCodigoDocumentoTipoFk() == 1) {
                $arMovimientosDetalles = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();

                //------------------ Inicio Cuenta del compras
                //Para las compras
                if($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk() == 4)
                    $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevResumenCuentaCompras($codigoMovimiento);
                //Para las devoluciones de compra
                if($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk() == 11)
                    $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevResumenCuentaDevolucionCompras($codigoMovimiento);


                foreach($arMovimientosDetalles as $arMovimientoDetalle) {
                    $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                    $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                    $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                    $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());                    
                    $arCtbMovimiento->setComprobanteContableRel($arMovimiento->getDocumentoRel()->getComprobanteContableRel());

                    //Para las compras
                    if($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk() == 4) 
                        $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimientoDetalle['cuentaCompras']);

                    //Para las devoluciones de compra
                    if($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk() == 11) 
                        $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimientoDetalle['cuentaDevolucionCompras']);                

                    $arCtbMovimiento->setCuentaRel($arCuentaContable);
                    if($arMovimiento->getDocumentoRel()->getTipoCuentaIngreso() == 1)
                        $arCtbMovimiento->setDebito($arMovimientoDetalle['subTotal']);
                    if($arMovimiento->getDocumentoRel()->getTipoCuentaIngreso() == 2)
                        $arCtbMovimiento->setCredito($arMovimientoDetalle['subTotal']);

                    $em->persist($arCtbMovimiento);
                    $em->flush();
                }
                //------------------ Fin Cuenta del compras

                //------------------ Inicio Cuenta del iva
                if($arMovimiento->getValorTotalIva() > 0) {
                    $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                    $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                    $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                    $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());                    
                    $arCtbMovimiento->setCodigoComprobanteFk($arMovimiento->getDocumentoRel()->getComprobanteContableRel());

                    $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimiento->getDocumentoRel()->getCuentaIva());                                
                    $arCtbMovimiento->setCuentaRel($arCuentaContable);
                    if($arMovimiento->getDocumentoRel()->getTipoCuentaIva() == 1)
                        $arCtbMovimiento->setDebito($arMovimiento->getValorTotalIva());

                    if($arMovimiento->getDocumentoRel()->getTipoCuentaIva() == 2)
                        $arCtbMovimiento->setCredito($arMovimiento->getValorTotalIva());

                    $arCtbMovimiento->setBase($em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevBaseIva($codigoMovimiento));

                    $em->persist($arCtbMovimiento);
                    $em->flush();
                }
                //------------------ Fin Cuenta del iva

                //------------------ Inicio Cuenta de la retencion en la fuente
                if($arMovimiento->getValorRetencionFuente() > 0) {
                    $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                    $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                    $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                    $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());                    
                    $arCtbMovimiento->setCodigoComprobanteFk($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk());

                    $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimiento->getDocumentoRel()->getCuentaRetencionFuente());                                
                    $arCtbMovimiento->setCuentaRel($arCuentaContable);

                    if($arMovimiento->getDocumentoRel()->getTipoCuentaRetencionFuente() == 1)
                        $arCtbMovimiento->setDebito($arMovimiento->getValorRetencionFuente());

                    if($arMovimiento->getDocumentoRel()->getTipoCuentaRetencionFuente() == 2)
                        $arCtbMovimiento->setCredito($arMovimiento->getValorRetencionFuente());

                    $arCtbMovimiento->setBase($arMovimiento->getSubTotal());

                    $em->persist($arCtbMovimiento);
                    $em->flush();
                }
                //------------------ Fin Cuenta de la retencion en la fuente


                //------------------ Inicio Cuenta de otras retenciones
                $arMovimientosRetenciones = new \zikmont\InventarioBundle\Entity\InvMovimientosRetenciones();
                $arMovimientosRetenciones = $em->getRepository('zikmontInventarioBundle:InvMovimientosRetenciones')->findBy(array('codigoMovimientoFk' => $codigoMovimiento));
                foreach($arMovimientosRetenciones as $arMovimientoRetencion) {
                    $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                    $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                    $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                    $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());
                    $arCtbMovimiento->setCodigoComprobanteFk($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk());

                    $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimientoRetencion->getConceptoRetencionRel()->getCuentaContable());                                
                    $arCtbMovimiento->setCuentaRel($arCuentaContable);

                    if($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk() == 4)
                        $arCtbMovimiento->setCredito($arMovimientoRetencion->getValorTotalRetencion());
                    else
                        $arCtbMovimiento->setDebito($arMovimientoRetencion->getValorTotalRetencion());

                    $arCtbMovimiento->setBase($arMovimientoRetencion->getBaseRetencion());
                    $em->persist($arCtbMovimiento);
                    $em->flush();
                }
                //------------------ Inicio Cuenta de otras retenciones

                //------------------ Inicio Cuenta de tesoreria
                $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());
                $arCtbMovimiento->setCodigoComprobanteFk($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk());

                $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimiento->getDocumentoRel()->getCuentaTesoreria()); 
                $arCtbMovimiento->setCuentaRel($arCuentaContable);
                if($arMovimiento->getDocumentoRel()->getTipoCuentaTesoreria() == 1)
                    $arCtbMovimiento->setDebito($arMovimiento->getTotal());

                if($arMovimiento->getDocumentoRel()->getTipoCuentaTesoreria() == 2)
                    $arCtbMovimiento->setCredito($arMovimiento->getTotal());

                $em->persist($arCtbMovimiento);
                $em->flush();
                //------------------ Fin Cuenta de tesoreria
            }
            
            //Documento de ventas
            if($arMovimiento->getDocumentoRel()->getCodigoDocumentoTipoFk() == 4) {
                $arMovimientosDetalles = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();

                //------------------ Inicio Cuenta del costo en ventas                
                $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevResumenCuentaCostoVentas($codigoMovimiento);

                foreach($arMovimientosDetalles as $arMovimientoDetalle) {
                    $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                    $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                    $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                    $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());
                    $arCtbMovimiento->setComprobanteContableRel($arMovimiento->getDocumentoRel()->getComprobanteContableRel());
                    
                    $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimientoDetalle['cuentaCosto']);
                    
                    $arCtbMovimiento->setCuentaRel($arCuentaContable);
                    if($arMovimiento->getDocumentoRel()->getTipoCuentaCosto() == 1)
                        $arCtbMovimiento->setDebito($arMovimientoDetalle['costo']);
                    if($arMovimiento->getDocumentoRel()->getTipoCuentaCosto() == 2)
                        $arCtbMovimiento->setCredito($arMovimientoDetalle['costo']);

                    $em->persist($arCtbMovimiento);
                    $em->flush();
                }
                //------------------ Fin Cuenta del compras                    
                
                //------------------ Inicio Cuenta de venta o ingreso                
                if($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk() == 3)
                    $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevResumenCuentaVentas($codigoMovimiento);
                //Para las devoluciones de ventas
                if($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk() == 13)
                    $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevResumenCuentaDevolucionVentas($codigoMovimiento);


                foreach($arMovimientosDetalles as $arMovimientoDetalle) {
                    $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                    $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                    $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                    $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());
                    $arCtbMovimiento->setComprobanteContableRel($arMovimiento->getDocumentoRel()->getComprobanteContableRel());

                    //Para las ventas
                    if($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk() == 3) 
                        $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimientoDetalle['cuentaIngreso']);

                    //Para las devoluciones de ventas
                    if($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk() == 13) 
                        $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimientoDetalle['cuentaDevolucionVentas']);                

                    $arCtbMovimiento->setCuentaRel($arCuentaContable);
                    if($arMovimiento->getDocumentoRel()->getTipoCuentaIngreso() == 1)
                        $arCtbMovimiento->setDebito($arMovimientoDetalle['subTotal']);
                    if($arMovimiento->getDocumentoRel()->getTipoCuentaIngreso() == 2)
                        $arCtbMovimiento->setCredito($arMovimientoDetalle['subTotal']);

                    $em->persist($arCtbMovimiento);
                    $em->flush();
                }
                //------------------ Fin Cuenta del compras                    

                //------------------ Inicio Cuenta Inventario                
                $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevResumenCuentaInventario($codigoMovimiento);

                foreach($arMovimientosDetalles as $arMovimientoDetalle) {
                    $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                    $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                    $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                    $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());
                    $arCtbMovimiento->setComprobanteContableRel($arMovimiento->getDocumentoRel()->getComprobanteContableRel());

                    //Cuenta Inventario
                    if($arMovimiento->getDocumentoRel()->getCodigoComprobanteFk() == 3) 
                        $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimientoDetalle['cuentaInventario']);             

                    $arCtbMovimiento->setCuentaRel($arCuentaContable);
                    if($arMovimiento->getDocumentoRel()->getTipoCuentaIngreso() == 1)
                        $arCtbMovimiento->setDebito($arMovimientoDetalle['costo']);
                    if($arMovimiento->getDocumentoRel()->getTipoCuentaIngreso() == 2)
                        $arCtbMovimiento->setCredito($arMovimientoDetalle['costo']);

                    $em->persist($arCtbMovimiento);
                    $em->flush();
                }
                //------------------ Fin Cuenta Inventario              

                //------------------ Inicio Cuenta del iva
                if($arMovimiento->getValorTotalIva() > 0) {
                    $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                    $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                    $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                    $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());
                    $arCtbMovimiento->setComprobanteContableRel($arMovimiento->getDocumentoRel()->getComprobanteContableRel());

                    $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimiento->getDocumentoRel()->getCuentaIva());                                
                    $arCtbMovimiento->setCuentaRel($arCuentaContable);
                    if($arMovimiento->getDocumentoRel()->getTipoCuentaIva() == 1)
                        $arCtbMovimiento->setDebito($arMovimiento->getValorTotalIva());

                    if($arMovimiento->getDocumentoRel()->getTipoCuentaIva() == 2)
                        $arCtbMovimiento->setCredito($arMovimiento->getValorTotalIva());

                    $arCtbMovimiento->setBase($em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevBaseIva($codigoMovimiento));

                    $em->persist($arCtbMovimiento);
                    $em->flush();
                }
                //------------------ Fin Cuenta del iva     
                           
                //------------------ Inicio Cuenta de tesoreria
                $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());
                $arCtbMovimiento->setComprobanteContableRel($arMovimiento->getDocumentoRel()->getComprobanteContableRel());

                $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimiento->getDocumentoRel()->getCuentaCartera()); 
                $arCtbMovimiento->setCuentaRel($arCuentaContable);
                if($arMovimiento->getDocumentoRel()->getTipoCuentaCartera() == 1)
                    $arCtbMovimiento->setDebito($arMovimiento->getTotal());

                if($arMovimiento->getDocumentoRel()->getTipoCuentaCartera() == 2)
                    $arCtbMovimiento->setCredito($arMovimiento->getTotal());

                $em->persist($arCtbMovimiento);
                $em->flush();
                //------------------ Fin Cuenta de tesoreria                
                
                //------------------ Inicio Cuenta de la retencion en la fuente
                if($arMovimiento->getValorRetencionFuente() > 0) {
                    $arCtbMovimiento = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
                    $arCtbMovimiento->setFecha($arMovimiento->getFecha());
                    $arCtbMovimiento->setNumeroMovimiento($arMovimiento->getNumeroMovimiento());
                    $arCtbMovimiento->setTerceroRel($arMovimiento->getTerceroRel());
                    $arCtbMovimiento->setComprobanteContableRel($arMovimiento->getDocumentoRel()->getComprobanteContableRel());

                    $arCuentaContable = $em->getRepository('zikmontContabilidadBundle:CtbCuentasContables')->find($arMovimiento->getDocumentoRel()->getCuentaRetencionFuente());                                
                    $arCtbMovimiento->setCuentaRel($arCuentaContable);

                    if($arMovimiento->getDocumentoRel()->getTipoCuentaRetencionFuente() == 1)
                        $arCtbMovimiento->setDebito($arMovimiento->getValorRetencionFuente());

                    if($arMovimiento->getDocumentoRel()->getTipoCuentaRetencionFuente() == 2)
                        $arCtbMovimiento->setCredito($arMovimiento->getValorRetencionFuente());

                    $arCtbMovimiento->setBase($arMovimiento->getSubTotal());

                    $em->persist($arCtbMovimiento);
                    $em->flush();                                        
                }
                //------------------ Fin Cuenta de la retencion en la fuente
                
            }            
            
            //$arMovimiento->setEstadoContabilizado(1);
            //$em->persist($arMovimiento);
            //$em->flush();
        }
    }
    
    /**
     * Devuelve los movimientos contables de unos filtros
     * @param string $strCuentacodigoMovimiento codigo del movimiento que se va a procesar.
     * */
    public function DevMovimientosFiltro($intNroMovimiento=NULL, $strCuenta = NULL, $intCodigoTercero = NULL, $ChkFecha = NULL, $strFechaDesde = NULL, $strFechaHasta = NULL) {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('mc.codigoCuentaFk, mc.credito, mc.debito, mc.base, m.numeroMovimiento, cuenta.nombreCuenta')
                ->from('zikmontContabilidadBundle:MovimientosContables', 'mc')
                ->leftJoin('mc.movimientoRel', 'm')
                ->leftJoin('mc.cuentaRel', 'cuenta');

        if ($strCuenta != Null && $strCuenta != "")
            $query->andWhere("mc.codigoCuentaFk LIKE '" . $strCuenta . "%'");

        if ($intNroMovimiento != Null && $intNroMovimiento != "")
            $query->andWhere('m.numeroMovimiento = ' . $intNroMovimiento);        
        
        if ($intCodigoTercero != Null && $intCodigoTercero != "")
            $query->andWhere('mc.codigoTerceroFk = ' . $intCodigoTercero);
        
        if ($ChkFecha != Null) {
            if ($strFechaDesde != "" && $strFechaDesde != NULL) {
                if ($strFechaHasta != "" && $strFechaHasta != NULL) {
                    $query->andWhere("mc.fecha >= '" . $strFechaDesde . " 00:00:00' AND mc.fecha <= '" . $strFechaHasta . " 23:59:59'");
                }
            }
        }

        $objQuery = $query->getQuery();
        $arMovimientosContables = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();
        $arMovimientosContables = $objQuery->getResult();

        return $arMovimientosContables;
    }       
    
    public function DevMovimientosFechaResumidoCuenta($dateFechaDesde, $dateFechaHasta) {
        $objRepositorio = $this->getEntityManager()->getRepository('zikmontContabilidadBundle:MovimientosContables');    
        $objQuery = $objRepositorio->createQueryBuilder('movimientos_contables')
                ->select('mc.codigoCuentaFk, SUM(mc.credito) AS debito, SUM(mc.debito) AS credito, SUM(mc.base) AS base')
                ->from('zikmontContabilidadBundle:MovimientosContables', 'mc')
                ->groupBy('mc.codigoCuentaFk')
                ->where('mc.fecha >= :dateFechaDesde')
                ->andWhere('mc.fecha <= :dateFechaHasta')                
                ->setParameter('dateFechaDesde', $dateFechaDesde)
                ->setParameter('dateFechaHasta', $dateFechaHasta)                
                ->getQuery();                                     
        return $objQuery->getResult();
    }      
    
    public function DevMovimientosFecha($dateFechaDesde, $dateFechaHasta) {
        $objRepositorio = $this->getEntityManager()->getRepository('zikmontContabilidadBundle:CtbMovimientos');    
        $objQuery = $objRepositorio->createQueryBuilder('mc')
            ->where('mc.fecha >= :dateFechaDesde')
            ->andWhere('mc.fecha <= :dateFechaHasta')
            ->setParameter('dateFechaDesde', $dateFechaDesde)
            ->setParameter('dateFechaHasta', $dateFechaHasta)
            ->getQuery();           
        
        return $objQuery->getResult();
    }  
    
    public function DevMovimientos($intNumero = "", $intComprobante = "", $dateFechaDesde = "", $dateFechaHasta = "", $boolContabilizado = "") {
        $objRepositorio = $this->getEntityManager()->getRepository('zikmontContabilidadBundle:CtbMovimientos');    
        $objQuery = $objRepositorio->createQueryBuilder('mc');           
        
        if($intNumero != "")
            $objQuery->andWhere ("mc.numeroMovimiento = " . $intNumero);        
        if($intComprobante != "")
            $objQuery->andWhere ("mc.codigoComprobanteContableFk = " . $intComprobante);
        
        $objQuery = $objQuery->getQuery();        
        return $objQuery->getResult();
    }         
    
    public function DevMovimientosRetencionesResumidoTercero($dateFechaDesde, $dateFechaHasta) {
        $objRepositorio = $this->getEntityManager()->getRepository('zikmontContabilidadBundle:CtbMovimientos');    
        $objQuery = $objRepositorio->createQueryBuilder('ctb_movimientos')
                ->select('mc.codigoTerceroFk, SUM(mc.credito) AS credito, SUM(mc.debito) AS debito')
                ->from('zikmontContabilidadBundle:CtbMovimientos', 'mc')
                ->groupBy('mc.codigoTerceroFk')
                ->where('mc.fecha >= :dateFechaDesde')
                ->andWhere('mc.fecha <= :dateFechaHasta')
                ->andWhere('mc.codigoCuentaFk = :cuenta')
                ->setParameter('dateFechaDesde', $dateFechaDesde)
                ->setParameter('dateFechaHasta', $dateFechaHasta)  
                ->setParameter('cuenta', '13551501')  
                ->getQuery();                                     
        return $objQuery->getResult();
    }     
}