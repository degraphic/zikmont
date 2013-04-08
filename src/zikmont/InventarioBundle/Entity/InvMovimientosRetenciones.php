<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="inv_movimientos_retenciones")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvMovimientosRetencionesRepository")
 */
class InvMovimientosRetenciones
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_movimiento_retencion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoMovimientoRetencionPk;
    
    /**
     * @ORM\Column(name="codigo_movimiento_fk", type="integer", nullable="true")
     */     
    private $codigoMovimientoFk; 

    /**
     * @ORM\Column(name="codigo_concepto_retencion_fk", type="integer", nullable="true")
     */     
    private $codigoConceptoRetencionFk;     
    
    /**
     * @ORM\Column(name="base_retencion", type="float")
     */    
    private $baseRetencion = 0;    
    
    /**
     * @ORM\Column(name="porcentaje_retencion", type="float")
     */    
    private $porcentajeRetencion = 0;      
    
    /**
     * @ORM\Column(name="valor_total_retencion", type="float")
     */    
    private $valorTotalRetencion = 0;    
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=40, nullable="true")
     */      
    private $comentarios;            
     
    

    /**
     * Get codigoMovimientoRetencionPk
     *
     * @return integer 
     */
    public function getCodigoMovimientoRetencionPk()
    {
        return $this->codigoMovimientoRetencionPk;
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
     * Set codigoConceptoRetencionFk
     *
     * @param integer $codigoConceptoRetencionFk
     */
    public function setCodigoConceptoRetencionFk($codigoConceptoRetencionFk)
    {
        $this->codigoConceptoRetencionFk = $codigoConceptoRetencionFk;
    }

    /**
     * Get codigoConceptoRetencionFk
     *
     * @return integer 
     */
    public function getCodigoConceptoRetencionFk()
    {
        return $this->codigoConceptoRetencionFk;
    }

    /**
     * Set baseRetencion
     *
     * @param float $baseRetencion
     */
    public function setBaseRetencion($baseRetencion)
    {
        $this->baseRetencion = $baseRetencion;
    }

    /**
     * Get baseRetencion
     *
     * @return float 
     */
    public function getBaseRetencion()
    {
        return $this->baseRetencion;
    }

    /**
     * Set valorTotalRetencion
     *
     * @param float $valorTotalRetencion
     */
    public function setValorTotalRetencion($valorTotalRetencion)
    {
        $this->valorTotalRetencion = $valorTotalRetencion;
    }

    /**
     * Get valorTotalRetencion
     *
     * @return float 
     */
    public function getValorTotalRetencion()
    {
        return $this->valorTotalRetencion;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
    }

    /**
     * Get comentarios
     *
     * @return string 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set movimientoRel
     *
     * @param zikmont\FrontEndBundle\Entity\Movimientos $movimientoRel
     */
    public function setMovimientoRel(\zikmont\FrontEndBundle\Entity\Movimientos $movimientoRel)
    {
        $this->movimientoRel = $movimientoRel;
    }

    /**
     * Get movimientoRel
     *
     * @return zikmont\FrontEndBundle\Entity\Movimientos 
     */
    public function getMovimientoRel()
    {
        return $this->movimientoRel;
    }

    /**
     * Set conceptoRetencionRel
     *
     * @param zikmont\FrontEndBundle\Entity\ConceptosRetenciones $conceptoRetencionRel
     */
    public function setConceptoRetencionRel(\zikmont\FrontEndBundle\Entity\ConceptosRetenciones $conceptoRetencionRel)
    {
        $this->conceptoRetencionRel = $conceptoRetencionRel;
    }

    /**
     * Get conceptoRetencionRel
     *
     * @return zikmont\FrontEndBundle\Entity\ConceptosRetenciones 
     */
    public function getConceptoRetencionRel()
    {
        return $this->conceptoRetencionRel;
    }

    /**
     * Set porcentajeRetencion
     *
     * @param float $porcentajeRetencion
     */
    public function setPorcentajeRetencion($porcentajeRetencion)
    {
        $this->porcentajeRetencion = $porcentajeRetencion;
    }

    /**
     * Get porcentajeRetencion
     *
     * @return float 
     */
    public function getPorcentajeRetencion()
    {
        return $this->porcentajeRetencion;
    }
}