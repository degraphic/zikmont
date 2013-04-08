<?php

namespace zikmont\ContabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ctb_comprobantes_contables")
 * @ORM\Entity(repositoryClass="zikmont\ContabilidadBundle\Repository\CtbComprobantesContablesRepository")
 */
class CtbComprobantesContables
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_comprobante_contable_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoComprobanteContablePk;
    
    /**
     * @ORM\Column(name="nombre_comprobante_contable", type="string", length=100, nullable="true")
     */    
    private $nombreComprobanteContable;      
    


    /**
     * Get codigoComprobanteContablePk
     *
     * @return integer 
     */
    public function getCodigoComprobanteContablePk()
    {
        return $this->codigoComprobanteContablePk;
    }

    /**
     * Set nombreComprobanteContable
     *
     * @param string $nombreComprobanteContable
     */
    public function setNombreComprobanteContable($nombreComprobanteContable)
    {
        $this->nombreComprobanteContable = $nombreComprobanteContable;
    }

    /**
     * Get nombreComprobanteContable
     *
     * @return string 
     */
    public function getNombreComprobanteContable()
    {
        return $this->nombreComprobanteContable;
    }
}