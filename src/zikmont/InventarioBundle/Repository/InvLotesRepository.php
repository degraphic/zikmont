<?php

namespace zikmont\InventarioBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LotesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InvLotesRepository extends EntityRepository {

    /**
     * Mueve el intentario de lotes
     * @param integer $intItem Codigo del item a mover
     * @param integer $intBodega Codigo de la bodega
     * @param string $strLote Lote para la afectacion de inventario
     * @param integer $intOperacion Operacion de entrada o salida 1 o -1
     * @param integer $intCantidad Cantidad en que se afectara el inventario de ese lote 
     * @param string $strFechaVencimiento Fecha de vencimiento para el caso que se deba crear por defecto nulo
     * */
    public function MoverInventario($intItem, $intBodega, $strLote, $intOperacion, $intCantidad, $strFechaVencimiento = NULL) {
        $em = $this->getEntityManager();
        $arLote = new \zikmont\InventarioBundle\Entity\InvLotes();
        $arLote = $em->getRepository('zikmontInventarioBundle:InvLotes')->findBy(array('codigoItemFk' => $intItem, 'codigoBodegaFk' => $intBodega, 'loteFk' => $strLote));
        //Si no existe el lote se crea
        if (count($arLote) <= 0)
            $em->getRepository('zikmontInventarioBundle:InvLotes')->CrearLote($intItem, $intBodega, $strLote, $strFechaVencimiento);

        $arLote = $em->getRepository('zikmontInventarioBundle:InvLotes')->find(array('codigoItemFk' => $intItem, 'codigoBodegaFk' => $intBodega, 'loteFk' => $strLote));
        $arLote->setExistencia($arLote->getExistencia() + ($intCantidad * $intOperacion));
        $em->persist($arLote);
        $em->flush();
        $em->getRepository('zikmontInventarioBundle:InvItem')->MoverCantidades($arLote->getCodigoItemFk(), $intCantidad * $intOperacion);
    }

    /**
     * Funcion para crear los lotes
     * @param integer $intItem Codigo del item a mover
     * @param integer $intBodega Codigo de la bodega
     * @param string $strLote Lote para la afectacion de inventario          
     * @param string $strFechaVencimiento Fecha de vencimiento para el caso que se deba crear por defecto nulo
     */
    public function CrearLote($intItem, $intBodega, $strLote, $strFechaVencimiento) {
        $em = $this->getEntityManager();
        $arItem = new \zikmont\InventarioBundle\Entity\InvItem();
        $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->find($intItem);
        $arLoteNuevo = new \zikmont\InventarioBundle\Entity\InvLotes();
        $arLoteNuevo->setItemRel($arItem);
        $arLoteNuevo->setCodigoItemFk($arItem->getCodigoItemPk());
        $arLoteNuevo->setCodigoBodegaFk($intBodega);
        $arLoteNuevo->setLoteFk($strLote);
        $arLoteNuevo->setFechaVencimiento($strFechaVencimiento);
        $em->persist($arLoteNuevo);
        $em->flush();
    }

    /**
     * Valida si hay existencias suficientes para sacar del lote
     * @param integer $intItem Codigo del item a mover
     * @param integer $intBodega Codigo de la bodega
     * @param string $strLote Lote para la afectacion de inventario     
     * @param integer $intCantidad Cantidad en que se afectara el inventario de ese lote 
     * @return boolean 
     */
    public function ValidarExistencia($intItem, $intBodega, $strLote, $intCantidad) {
        $em = $this->getEntityManager();
        $arLote = new \zikmont\InventarioBundle\Entity\InvLotes();        
        $arLote = $em->getRepository('zikmontInventarioBundle:InvLotes')->find(array('codigoItemFk' => $intItem, 'codigoBodegaFk' => $intBodega, 'loteFk' => $strLote));
        if(count($arLote) > 0) {
            if($arLote->getItemRel()->getPermitirInventarioNegativo() == 1)
                return true;        
            if (($arLote->getExistencia() - $intCantidad) < 0)
                return false;            
            else
                return true;
        }
        else
            return false;                    
    }

    /*
     * Establece los lotes a cero para regenerar kardex
     */

    public function ReiniciarValoresLotes() {
        $em = $this->getEntityManager();
        $dql = "UPDATE zikmontInventarioBundle:InvLotes l SET l.existencia = 0";
        $query = $em->createQuery($dql);
        $arLotes = $query->getResult();
        return $arLotes;
    }

    /**
     * Devuelve los lotes con existencias mayores a cero
     * @param integer $codigoItem Codigo del item para extraer los lotes
     */
    public function DevLotesExistenciaTodos() {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('lotes')
                ->from('zikmontInventarioBundle:InvLotes', 'lotes')
                ->where('lotes.existencia > 0')                
                ->getQuery();
        $arResultado = $query->getResult();
        return $arResultado;
    }    
    
    /**
     * Devuelve los lotes con existencias mayores a cero
     * @param integer $codigoItem Codigo del item para extraer los lotes
     */
    public function DevLotesExistencia($codigoItem) {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('lotes.existencia, lotes.loteFk, lotes.fechaVencimiento, lotes.codigoBodegaFk, lotes.cantidadRemisionada, lotes.cantidadReservada, lotes.cantidadDisponible')
                ->from('zikmontInventarioBundle:InvLotes', 'lotes')
                ->where('lotes.existencia > 0 AND lotes.codigoItemFk = :item')
                ->setParameter('item', $codigoItem)
                ->getQuery();
        $arResultado = $query->getResult();
        return $arResultado;
    }

     /**
     * Devuelve los lotes con existencias filtro
     * @param integer $codigoItem Codigo del item para extraer los lotes
     */
    public function DevLotesExistenciaFiltro($intCodigoItem = NULL) {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('lotes.existencia, lotes.loteFk, lotes.fechaVencimiento, lotes.codigoBodegaFk, lotes.codigoItemFk, item.descripcion')
                ->from('zikmontInventarioBundle:InvLotes', 'lotes')
                ->leftJoin('lotes.itemRel', 'item')
                ->where('lotes.existencia > 0')
                ->orderBy('lotes.codigoItemFk')
                ->getQuery();
        
        if ($intCodigoItem != Null && $intCodigoItem != "")
            $query->andWhere('lotes.codigoItemFk = ' . $intCodigoItem);
        $arLotes = new \zikmont\InventarioBundle\Entity\InvLotes();
        $arLotes = $query->getResult();
        return $arLotes;
    }
    
    /**
     * Establece las existencias de los items despues de una regeneracion     
     */
    public function EstablecerExistenciaItems() {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('lot.codigoItemFk, SUM(lot.existencia) AS existencia')
                ->from('zikmontInventarioBundle:InvLotes', 'lot')
                ->where('lot.existencia > 0')
                ->groupBy('lot.codigoItemFk')
                ->getQuery();
        $arLotes = new \zikmont\InventarioBundle\Entity\InvLotes();
        $arLotes = $query->getResult();
        $arItem = new \zikmont\InventarioBundle\Entity\InvItem();
        foreach ($arLotes AS $arLotes) {
            $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->find($arLotes['codigoItemFk']);
            $arItem->setCantidadExistencia($arLotes['existencia']);
            $em->persist($arItem);
            $em->flush();
        }
    }

}