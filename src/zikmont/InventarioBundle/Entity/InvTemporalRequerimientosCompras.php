<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_temporal_requerimientos_compras")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvTemporalRequerimientosComprasRepository")
 */
class InvTemporalRequerimientosCompras
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_temporal_requerimiento_compras_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoTemporalRequerimientoComprasPk;
    
    /**
     * @ORM\Column(name="codigo_item_fk", type="integer", nullable="true")
     */     
    private $codigoItemFk;     
    
    /**
     * @ORM\Column(name="fecha", type="datetime", nullable="true")
     */    
    private $fecha;     
    
    /**
     * @ORM\Column(name="cantidad_existencia", type="integer")
     */    
    private $cantidadExistencia = 0;

    /**
     * @ORM\Column(name="cantidad_remisionada", type="integer")
     */    
    private $cantidadRemisionada = 0;    
    
    /**
     * @ORM\Column(name="cantidad_reserva", type="integer")
     */    
    private $cantidadReserva = 0;    
    
    /**
     * @ORM\Column(name="cantidad_orden_compra", type="integer")
     */    
    private $cantidadOrdenCompra = 0;    
    
    /**
     * @ORM\Column(name="cantidad_pedidos", type="integer")
     */    
    private $cantidadPedidos = 0;    

    /**
     * @ORM\Column(name="cantidad_comprar", type="integer")
     */    
    private $cantidadComprar = 0;    
      

    /**
     * Get codigoTemporalRequerimientoComprasPk
     *
     * @return integer 
     */
    public function getCodigoTemporalRequerimientoComprasPk()
    {
        return $this->codigoTemporalRequerimientoComprasPk;
    }

    /**
     * Set codigoItemFk
     *
     * @param integer $codigoItemFk
     */
    public function setCodigoItemFk($codigoItemFk)
    {
        $this->codigoItemFk = $codigoItemFk;
    }

    /**
     * Get codigoItemFk
     *
     * @return integer 
     */
    public function getCodigoItemFk()
    {
        return $this->codigoItemFk;
    }

    /**
     * Set cantidadExistencia
     *
     * @param integer $cantidadExistencia
     */
    public function setCantidadExistencia($cantidadExistencia)
    {
        $this->cantidadExistencia = $cantidadExistencia;
    }

    /**
     * Get cantidadExistencia
     *
     * @return integer 
     */
    public function getCantidadExistencia()
    {
        return $this->cantidadExistencia;
    }

    /**
     * Set cantidadRemisionada
     *
     * @param integer $cantidadRemisionada
     */
    public function setCantidadRemisionada($cantidadRemisionada)
    {
        $this->cantidadRemisionada = $cantidadRemisionada;
    }

    /**
     * Get cantidadRemisionada
     *
     * @return integer 
     */
    public function getCantidadRemisionada()
    {
        return $this->cantidadRemisionada;
    }

    /**
     * Set cantidadReserva
     *
     * @param integer $cantidadReserva
     */
    public function setCantidadReserva($cantidadReserva)
    {
        $this->cantidadReserva = $cantidadReserva;
    }

    /**
     * Get cantidadReserva
     *
     * @return integer 
     */
    public function getCantidadReserva()
    {
        return $this->cantidadReserva;
    }

    /**
     * Set cantidadOrdenCompra
     *
     * @param integer $cantidadOrdenCompra
     */
    public function setCantidadOrdenCompra($cantidadOrdenCompra)
    {
        $this->cantidadOrdenCompra = $cantidadOrdenCompra;
    }

    /**
     * Get cantidadOrdenCompra
     *
     * @return integer 
     */
    public function getCantidadOrdenCompra()
    {
        return $this->cantidadOrdenCompra;
    }

    /**
     * Set cantidadPedidos
     *
     * @param integer $cantidadPedidos
     */
    public function setCantidadPedidos($cantidadPedidos)
    {
        $this->cantidadPedidos = $cantidadPedidos;
    }

    /**
     * Get cantidadPedidos
     *
     * @return integer 
     */
    public function getCantidadPedidos()
    {
        return $this->cantidadPedidos;
    }

    /**
     * Set cantidadComprar
     *
     * @param integer $cantidadComprar
     */
    public function setCantidadComprar($cantidadComprar)
    {
        $this->cantidadComprar = $cantidadComprar;
    }

    /**
     * Get cantidadComprar
     *
     * @return integer 
     */
    public function getCantidadComprar()
    {
        return $this->cantidadComprar;
    }

    /**
     * Set itemRel
     *
     * @param zikmont\FrontEndBundle\Entity\Item $itemRel
     */
    public function setItemRel(\zikmont\FrontEndBundle\Entity\Item $itemRel)
    {
        $this->itemRel = $itemRel;
    }

    /**
     * Get itemRel
     *
     * @return zikmont\FrontEndBundle\Entity\Item 
     */
    public function getItemRel()
    {
        return $this->itemRel;
    }

    /**
     * Set fecha
     *
     * @param datetime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get fecha
     *
     * @return datetime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
}