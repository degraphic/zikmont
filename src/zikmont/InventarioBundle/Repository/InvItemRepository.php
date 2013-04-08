<?php

namespace zikmont\InventarioBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ItemRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InvItemRepository extends EntityRepository {

    /**
     * Busca los productos que coincida con la descripcion enviada con el parametro
     * @param string $strDescripcion La descripcion del producto a buscar
     * @return query el resultado de la busqueda. 
     */
    public function BuscarDescripcionItem($strDescripcion) {
        try {
            $em = $this->getEntityManager();
            $query = $em->createQueryBuilder()
                    ->select('item')
                    ->from('zikmontInventarioBundle:InvItem', 'item')
                    ->where($em->createQueryBuilder()->expr()->like('item.descripcion', $em->createQueryBuilder()->expr()->literal('%' . $strDescripcion . '%')))
                    ->orWhere($em->createQueryBuilder()->expr()->like('item.codigoItemPk', $em->createQueryBuilder()->expr()->literal('%' . $strDescripcion . '%')))
                    ->getQuery();
            $arResultado = $query->getResult();
            return $arResultado;
        } catch (Exception $e) {
            return $e;
        }
    }

     /**
     * Busca los productos que coincida con el codigo de barras enviado como parametro
     * @param string $strDescripcion La descripcion del producto a buscar
     * @return query el resultado de la busqueda. 
     */
    public function BuscarCodigoBarras($strCodigoBarras) {
        try {
            $em = $this->getEntityManager();
            $query = $em->createQueryBuilder()
                    ->select('item')
                    ->from('zikmontFrontEndBundle:Item', 'item')
                    ->where($em->createQueryBuilder()->expr()->like('item.codigoBarras', $em->createQueryBuilder()->expr()->literal('%' . $strCodigoBarras . '%')))
                    ->getQuery();
            $arResultado = $query->getResult();
            return $arResultado;
        } catch (Exception $e) {
            return $e;
        }    
    }
    
    public function ReiniciarExistencias() {
        $em = $this->getEntityManager();
        $dql = "UPDATE zikmontInventarioBundle:InvItem l SET l.cantidadExistencia = 0";
        $query = $em->createQuery($dql);
        $arItems = $query->getResult();
        return $arItems;
    }    
    
     /**
     * Devuelve la operacion para un movimiento de detalle segun el item y el documento
     * @param integer $intOperacionDocumento operacion del documento
     * @param integer $intItemServicio item de servicio
     * @return integer Operacion de inventario. 
     */
    public function DevOperacionInventario($intOperacionDocumento, $intItemServicio) {
        if($intOperacionDocumento != 0) {
            if($intItemServicio == 1)                                         
                return 0;
            else
                return $intOperacionDocumento;
        }            
    }    
    
    public function MoverCantidades($intItem, $intCantidad) {
        $em = $this->getEntityManager();
        $arItem = new \zikmont\InventarioBundle\Entity\InvItem();
        $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->find($intItem);
        $arItem->setCantidadExistencia($arItem->getCantidadExistencia() + $intCantidad);
        $arItem->setCantidadDisponible($arItem->getCantidadDisponible() + $intCantidad);    
        $em->persist($arItem);
        $em->flush();        
    }    

}