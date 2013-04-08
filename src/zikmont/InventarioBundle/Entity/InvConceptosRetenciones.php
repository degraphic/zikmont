<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="inv_conceptos_retenciones")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvConceptosRetencionesRepository")
 */
class InvConceptosRetenciones
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_concepto_retencion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoConceptoRetencionPk;
        
    /**
     * @ORM\Column(name="nombre_concepto_retencion", type="string", length=40, nullable="true")
     */      
    private $nombreConceptoRetencion; 

    /**
     * @ORM\Column(name="porcenaje_concepto_retencion", type="float")
     */    
    private $porcentajeConceptoRetencion = 0;    
    
    /**
     * @ORM\Column(name="referencia", type="string", length=40, nullable="true")
     */      
    private $referencia;     
    
    /**
     * @ORM\Column(name="cuentaContable", type="string", length=40, nullable="true")
     */      
    private $cuentaContable;  
    
    
   
    

    /**
     * Get codigoConceptoRetencionPk
     *
     * @return integer 
     */
    public function getCodigoConceptoRetencionPk()
    {
        return $this->codigoConceptoRetencionPk;
    }

    /**
     * Set nombreConceptoRetencion
     *
     * @param string $nombreConceptoRetencion
     */
    public function setNombreConceptoRetencion($nombreConceptoRetencion)
    {
        $this->nombreConceptoRetencion = $nombreConceptoRetencion;
    }

    /**
     * Get nombreConceptoRetencion
     *
     * @return string 
     */
    public function getNombreConceptoRetencion()
    {
        return $this->nombreConceptoRetencion;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }

    /**
     * Get referencia
     *
     * @return string 
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set cuentaContable
     *
     * @param string $cuentaContable
     */
    public function setCuentaContable($cuentaContable)
    {
        $this->cuentaContable = $cuentaContable;
    }

    /**
     * Get cuentaContable
     *
     * @return string 
     */
    public function getCuentaContable()
    {
        return $this->cuentaContable;
    }

    /**
     * Set porcentajeConceptoRetencion
     *
     * @param float $porcentajeConceptoRetencion
     */
    public function setPorcentajeConceptoRetencion($porcentajeConceptoRetencion)
    {
        $this->porcentajeConceptoRetencion = $porcentajeConceptoRetencion;
    }

    /**
     * Get porcentajeConceptoRetencion
     *
     * @return float 
     */
    public function getPorcentajeConceptoRetencion()
    {
        return $this->porcentajeConceptoRetencion;
    }
}