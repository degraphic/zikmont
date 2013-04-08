<?php

namespace zikmont\PresupuestosCivilesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pcv_movimientos_detalles")
 * @ORM\Entity(repositoryClass="zikmont\PresupuestosCivilesBundle\Repository\PcvMovimientosDetallesRepository")
 */
class PcvMovimientosDetalles
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_movimiento_civil_presupuesto_detalle_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoMovimientoCivilPresupuestoDetallePk;
    
    /**
     * @ORM\Column(name="codigo_movimiento_civil_presupuesto_fk", type="integer", nullable="true")
     */     
    private $codigoMovimientoCivilPresupuestoFk;       

    /**
     * @ORM\Column(name="codigo_movimiento_civil_presupuesto_item_fk", type="integer", nullable="true")
     */     
    private $codigoMovimientoCivilPresupuestoItemFk;     
    
    /**
     * @ORM\Column(name="cantidad", type="integer")
     */        
    private $cantidad = 0;   
    

    /**
     * Get codigoMovimientoCivilPresupuestoDetallePk
     *
     * @return integer 
     */
    public function getCodigoMovimientoCivilPresupuestoDetallePk()
    {
        return $this->codigoMovimientoCivilPresupuestoDetallePk;
    }

    /**
     * Set codigoMovimientoCivilPresupuestoFk
     *
     * @param integer $codigoMovimientoCivilPresupuestoFk
     */
    public function setCodigoMovimientoCivilPresupuestoFk($codigoMovimientoCivilPresupuestoFk)
    {
        $this->codigoMovimientoCivilPresupuestoFk = $codigoMovimientoCivilPresupuestoFk;
    }

    /**
     * Get codigoMovimientoCivilPresupuestoFk
     *
     * @return integer 
     */
    public function getCodigoMovimientoCivilPresupuestoFk()
    {
        return $this->codigoMovimientoCivilPresupuestoFk;
    }

    /**
     * Set codigoMovimientoCivilPresupuestoItemFk
     *
     * @param integer $codigoMovimientoCivilPresupuestoItemFk
     */
    public function setCodigoMovimientoCivilPresupuestoItemFk($codigoMovimientoCivilPresupuestoItemFk)
    {
        $this->codigoMovimientoCivilPresupuestoItemFk = $codigoMovimientoCivilPresupuestoItemFk;
    }

    /**
     * Get codigoMovimientoCivilPresupuestoItemFk
     *
     * @return integer 
     */
    public function getCodigoMovimientoCivilPresupuestoItemFk()
    {
        return $this->codigoMovimientoCivilPresupuestoItemFk;
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
}