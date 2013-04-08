<?php

namespace zikmont\PresupuestosCivilesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pcv_items")
 * @ORM\Entity(repositoryClass="zikmont\PresupuestosCivilesBundle\Repository\PcvItemsRepository")
 */
class PcvItems
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_movimiento_civil_presupuesto_item_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoMovimientoCivilPresupuestoItemPk;        
    
    /**
     * @ORM\Column(name="descripcion", type="string", length=150, nullable="true")
     */    
    private $descripcion;
    
    /**
     * @ORM\Column(name="codigo_unidad_medida_fk", type="integer",nullable="true")
     */    
    private $codigoUnidadMedidaFk;     
        
    

    /**
     * Get codigoMovimientoCivilPresupuestoItemPk
     *
     * @return integer 
     */
    public function getCodigoMovimientoCivilPresupuestoItemPk()
    {
        return $this->codigoMovimientoCivilPresupuestoItemPk;
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
     * Set unidadMedidaRel
     *
     * @param zikmont\FrontEndBundle\Entity\UnidadesMedida $unidadMedidaRel
     */
    public function setUnidadMedidaRel(\zikmont\FrontEndBundle\Entity\UnidadesMedida $unidadMedidaRel)
    {
        $this->unidadMedidaRel = $unidadMedidaRel;
    }

    /**
     * Get unidadMedidaRel
     *
     * @return zikmont\FrontEndBundle\Entity\UnidadesMedida 
     */
    public function getUnidadMedidaRel()
    {
        return $this->unidadMedidaRel;
    }

    /**
     * Set codigoUnidadMedidaFk
     *
     * @param integer $codigoUnidadMedidaFk
     */
    public function setCodigoUnidadMedidaFk($codigoUnidadMedidaFk)
    {
        $this->codigoUnidadMedidaFk = $codigoUnidadMedidaFk;
    }

    /**
     * Get codigoUnidadMedidaFk
     *
     * @return integer 
     */
    public function getCodigoUnidadMedidaFk()
    {
        return $this->codigoUnidadMedidaFk;
    }
}