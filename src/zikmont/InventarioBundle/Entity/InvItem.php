<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_item")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvItemRepository")
 */
class InvItem
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_item_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoItemPk;    
    
    /**
     * @ORM\Column(name="codigo_marca_fk", type="integer")
     */    
    private $codigoMarcaFK;
    
    /**
     * @ORM\Column(name="descripcion", type="string", length=150, nullable="true")
     */    
    private $descripcion;
    
    /**
     * @ORM\Column(name="costo_predeterminado", type="float", nullable="true")
     */
    private $costoPredeterminado = 0;

    /**
     * @ORM\Column(name="costo_promedio", type="float")
     */
    private $costoPromedio = 0;    
    
    /**
     * @ORM\Column(name="precio_predeterminado", type="float", nullable="true")
     */
    private $precioPredeterminado = 0;

    /**
     * @ORM\Column(name="codigo_ean", type="string", length=80, nullable="true")
     */    
    private $codigoEAN;    
    
    /**
     * @ORM\Column(name="codigo_barras", type="string", length=80, nullable="true")
     */    
    private $codigoBarras;     
    
    /**
     * @ORM\Column(name="cuenta_ingreso", type="string", length=15, nullable="true")
     */    
    private $cuentaIngreso; 
    
    /**
     * @ORM\Column(name="cuenta_dovolucion_ventas", type="string", length=15, nullable="true")
     */    
    private $cuentaDevolucionVentas;     
    
    /**
     * @ORM\Column(name="cuenta_compras", type="string", length=15, nullable="true")
     */    
    private $cuentaCompras;        
    
    /**
     * @ORM\Column(name="cuenta_devolucion_compras", type="string", length=15, nullable="true")
     */    
    private $cuentaDevolucionCompras;     
    
    /**
     * @ORM\Column(name="cuenta_costo", type="string", length=15, nullable="true")
     */    
    private $cuentaCosto;      
        
    /**
     * @ORM\Column(name="cuenta_inventario", type="string", length=15, nullable="true")
     */    
    private $cuentaInventario;  

    /**
     * @ORM\Column(name="porcentaje_iva", type="integer")
     */    
    private $porcentajeIva = 0;    

    /**
     * @ORM\Column(name="cantidad_existencia", type="integer")
     */    
    private $cantidadExistencia = 0;        
    
    /**
     * @ORM\Column(name="cantidad_remisionada", type="integer")
     */    
    private $cantidadRemisionada = 0;        

    /**
     * @ORM\Column(name="cantidad_reservada", type="integer")
     */    
    private $cantidadReservada = 0;    
    
    /**
     * @ORM\Column(name="cantidad_disponible", type="integer")
     */    
    private $cantidadDisponible = 0;        

    /**
     * @ORM\Column(name="permitir_inventario_negativo", type="boolean")
     */    
    private $permitirInventarioNegativo = 1; 
    
    /**
     * @ORM\Column(name="codigo_unidad_venta_fk", type="integer",nullable="true")
     */    
    private $codigoUnidadVentaFk;    
    
    /**
     * @ORM\Column(name="factor_venta", type="integer")
     */    
    private $factorVenta;    
    
    /**
     * @ORM\Column(name="codigo_unidad_compra_fk", type="integer",nullable="true")
     */    
    private $codigoUnidadCompraFk;    
    
    /**
     * @ORM\Column(name="factor_compra", type="integer")
     */    
    private $factorCompra;    
    
    /**
     * @ORM\Column(name="item_servicio", type="boolean")
     */    
    private $itemServicio = 0;     
    


    /**
     * Get codigoItemPk
     *
     * @return integer 
     */
    public function getCodigoItemPk()
    {
        return $this->codigoItemPk;
    }

    /**
     * Set codigoMarcaFK
     *
     * @param integer $codigoMarcaFK
     */
    public function setCodigoMarcaFK($codigoMarcaFK)
    {
        $this->codigoMarcaFK = $codigoMarcaFK;
    }

    /**
     * Get codigoMarcaFK
     *
     * @return integer 
     */
    public function getCodigoMarcaFK()
    {
        return $this->codigoMarcaFK;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set costoPredeterminado
     *
     * @param float $costoPredeterminado
     */
    public function setCostoPredeterminado($costoPredeterminado)
    {
        $this->costoPredeterminado = $costoPredeterminado;
    }

    /**
     * Get costoPredeterminado
     *
     * @return float 
     */
    public function getCostoPredeterminado()
    {
        return $this->costoPredeterminado;
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
     * Set precioPredeterminado
     *
     * @param float $precioPredeterminado
     */
    public function setPrecioPredeterminado($precioPredeterminado)
    {
        $this->precioPredeterminado = $precioPredeterminado;
    }

    /**
     * Get precioPredeterminado
     *
     * @return float 
     */
    public function getPrecioPredeterminado()
    {
        return $this->precioPredeterminado;
    }

    /**
     * Set codigoEAN
     *
     * @param string $codigoEAN
     */
    public function setCodigoEAN($codigoEAN)
    {
        $this->codigoEAN = $codigoEAN;
    }

    /**
     * Get codigoEAN
     *
     * @return string 
     */
    public function getCodigoEAN()
    {
        return $this->codigoEAN;
    }

    /**
     * Set codigoBarras
     *
     * @param string $codigoBarras
     */
    public function setCodigoBarras($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;
    }

    /**
     * Get codigoBarras
     *
     * @return string 
     */
    public function getCodigoBarras()
    {
        return $this->codigoBarras;
    }

    /**
     * Set cuentaIngreso
     *
     * @param string $cuentaIngreso
     */
    public function setCuentaIngreso($cuentaIngreso)
    {
        $this->cuentaIngreso = $cuentaIngreso;
    }

    /**
     * Get cuentaIngreso
     *
     * @return string 
     */
    public function getCuentaIngreso()
    {
        return $this->cuentaIngreso;
    }

    /**
     * Set cuentaDevolucionVentas
     *
     * @param string $cuentaDevolucionVentas
     */
    public function setCuentaDevolucionVentas($cuentaDevolucionVentas)
    {
        $this->cuentaDevolucionVentas = $cuentaDevolucionVentas;
    }

    /**
     * Get cuentaDevolucionVentas
     *
     * @return string 
     */
    public function getCuentaDevolucionVentas()
    {
        return $this->cuentaDevolucionVentas;
    }

    /**
     * Set cuentaCompras
     *
     * @param string $cuentaCompras
     */
    public function setCuentaCompras($cuentaCompras)
    {
        $this->cuentaCompras = $cuentaCompras;
    }

    /**
     * Get cuentaCompras
     *
     * @return string 
     */
    public function getCuentaCompras()
    {
        return $this->cuentaCompras;
    }

    /**
     * Set cuentaDevolucionCompras
     *
     * @param string $cuentaDevolucionCompras
     */
    public function setCuentaDevolucionCompras($cuentaDevolucionCompras)
    {
        $this->cuentaDevolucionCompras = $cuentaDevolucionCompras;
    }

    /**
     * Get cuentaDevolucionCompras
     *
     * @return string 
     */
    public function getCuentaDevolucionCompras()
    {
        return $this->cuentaDevolucionCompras;
    }

    /**
     * Set cuentaCosto
     *
     * @param string $cuentaCosto
     */
    public function setCuentaCosto($cuentaCosto)
    {
        $this->cuentaCosto = $cuentaCosto;
    }

    /**
     * Get cuentaCosto
     *
     * @return string 
     */
    public function getCuentaCosto()
    {
        return $this->cuentaCosto;
    }

    /**
     * Set cuentaInventario
     *
     * @param string $cuentaInventario
     */
    public function setCuentaInventario($cuentaInventario)
    {
        $this->cuentaInventario = $cuentaInventario;
    }

    /**
     * Get cuentaInventario
     *
     * @return string 
     */
    public function getCuentaInventario()
    {
        return $this->cuentaInventario;
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
     * Set cantidadReservada
     *
     * @param integer $cantidadReservada
     */
    public function setCantidadReservada($cantidadReservada)
    {
        $this->cantidadReservada = $cantidadReservada;
    }

    /**
     * Get cantidadReservada
     *
     * @return integer 
     */
    public function getCantidadReservada()
    {
        return $this->cantidadReservada;
    }

    /**
     * Set cantidadDisponible
     *
     * @param integer $cantidadDisponible
     */
    public function setCantidadDisponible($cantidadDisponible)
    {
        $this->cantidadDisponible = $cantidadDisponible;
    }

    /**
     * Get cantidadDisponible
     *
     * @return integer 
     */
    public function getCantidadDisponible()
    {
        return $this->cantidadDisponible;
    }

    /**
     * Set permitirInventarioNegativo
     *
     * @param boolean $permitirInventarioNegativo
     */
    public function setPermitirInventarioNegativo($permitirInventarioNegativo)
    {
        $this->permitirInventarioNegativo = $permitirInventarioNegativo;
    }

    /**
     * Get permitirInventarioNegativo
     *
     * @return boolean 
     */
    public function getPermitirInventarioNegativo()
    {
        return $this->permitirInventarioNegativo;
    }

    /**
     * Set codigoUnidadVentaFk
     *
     * @param integer $codigoUnidadVentaFk
     */
    public function setCodigoUnidadVentaFk($codigoUnidadVentaFk)
    {
        $this->codigoUnidadVentaFk = $codigoUnidadVentaFk;
    }

    /**
     * Get codigoUnidadVentaFk
     *
     * @return integer 
     */
    public function getCodigoUnidadVentaFk()
    {
        return $this->codigoUnidadVentaFk;
    }

    /**
     * Set factorVenta
     *
     * @param integer $factorVenta
     */
    public function setFactorVenta($factorVenta)
    {
        $this->factorVenta = $factorVenta;
    }

    /**
     * Get factorVenta
     *
     * @return integer 
     */
    public function getFactorVenta()
    {
        return $this->factorVenta;
    }

    /**
     * Set codigoUnidadCompraFk
     *
     * @param integer $codigoUnidadCompraFk
     */
    public function setCodigoUnidadCompraFk($codigoUnidadCompraFk)
    {
        $this->codigoUnidadCompraFk = $codigoUnidadCompraFk;
    }

    /**
     * Get codigoUnidadCompraFk
     *
     * @return integer 
     */
    public function getCodigoUnidadCompraFk()
    {
        return $this->codigoUnidadCompraFk;
    }

    /**
     * Set factorCompra
     *
     * @param integer $factorCompra
     */
    public function setFactorCompra($factorCompra)
    {
        $this->factorCompra = $factorCompra;
    }

    /**
     * Get factorCompra
     *
     * @return integer 
     */
    public function getFactorCompra()
    {
        return $this->factorCompra;
    }

    /**
     * Set itemServicio
     *
     * @param boolean $itemServicio
     */
    public function setItemServicio($itemServicio)
    {
        $this->itemServicio = $itemServicio;
    }

    /**
     * Get itemServicio
     *
     * @return boolean 
     */
    public function getItemServicio()
    {
        return $this->itemServicio;
    }
}