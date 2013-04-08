<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_movimientos_detalles")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvMovimientosDetallesRepository")
 */
class InvMovimientosDetalles
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_detalle_movimiento_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoDetalleMovimientoPk;
    
    /**
     * @ORM\Column(name="codigo_movimiento_fk", type="integer", nullable="true")
     */     
    private $codigoMovimientoFk;    
    
    /**
     * @ORM\Column(name="codigo_item_fk", type="integer", nullable="true")
     */     
    private $codigoItemFk;    

    /**
     * @ORM\Column(name="codigo_bodega_fk", type="smallint", nullable="true")
     */     
    private $codigoBodegaFk;
    
    /**
     * @ORM\Column(name="lote_fk", type="string", length=40, nullable="true")
     */      
    private $loteFk;
    
    /**
     * @ORM\Column(name="fecha_vencimiento", type="date", nullable="true")
     */      
    private $fechaVencimiento;
    
    /**
     * @ORM\Column(name="cantidad", type="integer")
     */        
    private $cantidad = 0;

    /**
     * @ORM\Column(name="cantidad_operada", type="integer")
     */        
    private $cantidadOperada = 0;    

    /**
     * @ORM\Column(name="cantidad_afectada", type="integer")
     */        
    private $cantidadAfectada = 0;      
    
    /**
     * @ORM\Column(name="costo", type="float")
     */    
    private $costo = 0;

    /**
     * @ORM\Column(name="costo_promedio", type="float")
     */    
    private $costoPromedio = 0;    
    
    /**
     * @ORM\Column(name="precio", type="float")
     */    
    private $precio = 0;

    /**
     * @ORM\Column(name="subtotal", type="float")
     */    
    private $subTotal = 0;

    /**
     * @ORM\Column(name="porcentaje_iva", type="integer")
     */    
    private $porcentajeIva = 0;
    
    /**
     * @ORM\Column(name="valor_total_iva", type="float")
     */    
    private $valorTotalIva = 0;

    /**
     * @ORM\Column(name="porcenaje_descuento", type="float")
     */    
    private $porcentajeDescuento = 0;

    /**
     * @ORM\Column(name="valor_total_descuento", type="float")
     */    
    private $valorTotalDescuento = 0;

    /**
     * @ORM\Column(name="total", type="float")
     */    
    private $total = 0;

    /**
     * @ORM\Column(name="operacion_inventario", type="bigint")
     */    
    private $operacionInventario = 0;

    /**
     * @ORM\Column(name="operacion_comercial", type="bigint")
     */    
    private $operacionComercial = 0;
    
    /**
     * @ORM\Column(name="estado_autorizado", type="boolean")
     */    
    private $estadoAutorizado = 0;

    /**
     * @ORM\Column(name="estado_anulado", type="boolean")
     */    
    private $estadoAnulado = 0;    

    /**
     * @ORM\Column(name="estado_cerrado", type="boolean")
     */    
    private $estadoCerrado = 0;    
    
    /**
     * @ORM\Column(name="codigo_detalle_movimiento_enlace", type="integer", nullable="true")     
     */        
    private $codigoDetalleMovimientoEnlace;    
    
    /**
     * @ORM\ManyToOne(targetEntity="InvItem", inversedBy="InvMovimientosDetalles")
     * @ORM\JoinColumn(name="codigo_item_fk", referencedColumnName="codigo_item_pk")
     */
    protected $itemRel;     
    
    /**
     * @ORM\ManyToOne(targetEntity="InvMovimientos", inversedBy="InvMovimientosDetalles")
     * @ORM\JoinColumn(name="codigo_movimiento_fk", referencedColumnName="codigo_movimiento_pk")
     */
    protected $movimientoRel;  
    



    /**
     * Get codigoDetalleMovimientoPk
     *
     * @return integer 
     */
    public function getCodigoDetalleMovimientoPk()
    {
        return $this->codigoDetalleMovimientoPk;
    }

    /**
     * Set codigoMovimientoFk
     *
     * @param integer $codigoMovimientoFk
     */
    public function setCodigoMovimientoFk($codigoMovimientoFk)
    {
        $this->codigoMovimientoFk = $codigoMovimientoFk;
    }

    /**
     * Get codigoMovimientoFk
     *
     * @return integer 
     */
    public function getCodigoMovimientoFk()
    {
        return $this->codigoMovimientoFk;
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
     * Set codigoBodegaFk
     *
     * @param smallint $codigoBodegaFk
     */
    public function setCodigoBodegaFk($codigoBodegaFk)
    {
        $this->codigoBodegaFk = $codigoBodegaFk;
    }

    /**
     * Get codigoBodegaFk
     *
     * @return smallint 
     */
    public function getCodigoBodegaFk()
    {
        return $this->codigoBodegaFk;
    }

    /**
     * Set loteFk
     *
     * @param string $loteFk
     */
    public function setLoteFk($loteFk)
    {
        $this->loteFk = $loteFk;
    }

    /**
     * Get loteFk
     *
     * @return string 
     */
    public function getLoteFk()
    {
        return $this->loteFk;
    }

    /**
     * Set fechaVencimiento
     *
     * @param date $fechaVencimiento
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    /**
     * Get fechaVencimiento
     *
     * @return date 
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set cantidadOperada
     *
     * @param integer $cantidadOperada
     */
    public function setCantidadOperada($cantidadOperada)
    {
        $this->cantidadOperada = $cantidadOperada;
    }

    /**
     * Get cantidadOperada
     *
     * @return integer 
     */
    public function getCantidadOperada()
    {
        return $this->cantidadOperada;
    }

    /**
     * Set cantidadAfectada
     *
     * @param integer $cantidadAfectada
     */
    public function setCantidadAfectada($cantidadAfectada)
    {
        $this->cantidadAfectada = $cantidadAfectada;
    }

    /**
     * Get cantidadAfectada
     *
     * @return integer 
     */
    public function getCantidadAfectada()
    {
        return $this->cantidadAfectada;
    }

    /**
     * Set costo
     *
     * @param float $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * Get costo
     *
     * @return float 
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set costoPromedio
     *
     * @param float $costoPromedio
     */
    public function setCostoPromedio($costoPromedio)
    {
        $this->costoPromedio = $costoPromedio;
    }

    /**
     * Get costoPromedio
     *
     * @return float 
     */
    public function getCostoPromedio()
    {
        return $this->costoPromedio;
    }

    /**
     * Set precio
     *
     * @param float $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set subTotal
     *
     * @param float $subTotal
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;
    }

    /**
     * Get subTotal
     *
     * @return float 
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Set porcentajeIva
     *
     * @param integer $porcentajeIva
     */
    public function setPorcentajeIva($porcentajeIva)
    {
        $this->porcentajeIva = $porcentajeIva;
    }

    /**
     * Get porcentajeIva
     *
     * @return integer 
     */
    public function getPorcentajeIva()
    {
        return $this->porcentajeIva;
    }

    /**
     * Set valorTotalIva
     *
     * @param float $valorTotalIva
     */
    public function setValorTotalIva($valorTotalIva)
    {
        $this->valorTotalIva = $valorTotalIva;
    }

    /**
     * Get valorTotalIva
     *
     * @return float 
     */
    public function getValorTotalIva()
    {
        return $this->valorTotalIva;
    }

    /**
     * Set porcentajeDescuento
     *
     * @param float $porcentajeDescuento
     */
    public function setPorcentajeDescuento($porcentajeDescuento)
    {
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    /**
     * Get porcentajeDescuento
     *
     * @return float 
     */
    public function getPorcentajeDescuento()
    {
        return $this->porcentajeDescuento;
    }

    /**
     * Set valorTotalDescuento
     *
     * @param float $valorTotalDescuento
     */
    public function setValorTotalDescuento($valorTotalDescuento)
    {
        $this->valorTotalDescuento = $valorTotalDescuento;
    }

    /**
     * Get valorTotalDescuento
     *
     * @return float 
     */
    public function getValorTotalDescuento()
    {
        return $this->valorTotalDescuento;
    }

    /**
     * Set total
     *
     * @param float $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set operacionInventario
     *
     * @param bigint $operacionInventario
     */
    public function setOperacionInventario($operacionInventario)
    {
        $this->operacionInventario = $operacionInventario;
    }

    /**
     * Get operacionInventario
     *
     * @return bigint 
     */
    public function getOperacionInventario()
    {
        return $this->operacionInventario;
    }

    /**
     * Set operacionComercial
     *
     * @param bigint $operacionComercial
     */
    public function setOperacionComercial($operacionComercial)
    {
        $this->operacionComercial = $operacionComercial;
    }

    /**
     * Get operacionComercial
     *
     * @return bigint 
     */
    public function getOperacionComercial()
    {
        return $this->operacionComercial;
    }

    /**
     * Set estadoAutorizado
     *
     * @param boolean $estadoAutorizado
     */
    public function setEstadoAutorizado($estadoAutorizado)
    {
        $this->estadoAutorizado = $estadoAutorizado;
    }

    /**
     * Get estadoAutorizado
     *
     * @return boolean 
     */
    public function getEstadoAutorizado()
    {
        return $this->estadoAutorizado;
    }

    /**
     * Set estadoAnulado
     *
     * @param boolean $estadoAnulado
     */
    public function setEstadoAnulado($estadoAnulado)
    {
        $this->estadoAnulado = $estadoAnulado;
    }

    /**
     * Get estadoAnulado
     *
     * @return boolean 
     */
    public function getEstadoAnulado()
    {
        return $this->estadoAnulado;
    }

    /**
     * Set estadoCerrado
     *
     * @param boolean $estadoCerrado
     */
    public function setEstadoCerrado($estadoCerrado)
    {
        $this->estadoCerrado = $estadoCerrado;
    }

    /**
     * Get estadoCerrado
     *
     * @return boolean 
     */
    public function getEstadoCerrado()
    {
        return $this->estadoCerrado;
    }

    /**
     * Set codigoDetalleMovimientoEnlace
     *
     * @param integer $codigoDetalleMovimientoEnlace
     */
    public function setCodigoDetalleMovimientoEnlace($codigoDetalleMovimientoEnlace)
    {
        $this->codigoDetalleMovimientoEnlace = $codigoDetalleMovimientoEnlace;
    }

    /**
     * Get codigoDetalleMovimientoEnlace
     *
     * @return integer 
     */
    public function getCodigoDetalleMovimientoEnlace()
    {
        return $this->codigoDetalleMovimientoEnlace;
    }

    /**
     * Set itemRel
     *
     * @param zikmont\InventarioBundle\Entity\InvItem $itemRel
     */
    public function setItemRel(\zikmont\InventarioBundle\Entity\InvItem $itemRel)
    {
        $this->itemRel = $itemRel;
    }

    /**
     * Get itemRel
     *
     * @return zikmont\InventarioBundle\Entity\InvItem 
     */
    public function getItemRel()
    {
        return $this->itemRel;
    }

    /**
     * Set movimientoRel
     *
     * @param zikmont\InventarioBundle\Entity\InvMovimientos $movimientoRel
     */
    public function setMovimientoRel(\zikmont\InventarioBundle\Entity\InvMovimientos $movimientoRel)
    {
        $this->movimientoRel = $movimientoRel;
    }

    /**
     * Get movimientoRel
     *
     * @return zikmont\InventarioBundle\Entity\InvMovimientos 
     */
    public function getMovimientoRel()
    {
        return $this->movimientoRel;
    }
}