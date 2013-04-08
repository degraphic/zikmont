<?php

namespace zikmont\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gen_clasificaciones_tributarias")
 * @ORM\Entity(repositoryClass="zikmont\FrontEndBundle\Repository\GenClasificacionesTributariasRepository")
 */
class GenClasificacionesTributarias
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_clasificacion_tributaria_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoClasificacionTributariaPk;

    /**
     * @ORM\Column(name="nombre_clasificacion_tributaria", type="string", length=50, nullable="true")
     */
    private $nombreClasificacionTributaria;

    /**
     * @ORM\Column(name="retencion_iva_ventas", type="boolean")
     */    
    private $retencionIvaVentas = 0;    
    
    /**
     * Get codigoClasificacionTributariaPk
     *
     * @return integer 
     */
    public function getCodigoClasificacionTributariaPk()
    {
        return $this->codigoClasificacionTributariaPk;
    }

    /**
     * Set nombreClasificacionTributaria
     *
     * @param string $nombreClasificacionTributaria
     */
    public function setNombreClasificacionTributaria($nombreClasificacionTributaria)
    {
        $this->nombreClasificacionTributaria = $nombreClasificacionTributaria;
    }

    /**
     * Get nombreClasificacionTributaria
     *
     * @return string 
     */
    public function getNombreClasificacionTributaria()
    {
        return $this->nombreClasificacionTributaria;
    }

    /**
     * Set retencionIvaVentas
     *
     * @param boolean $retencionIvaVentas
     */
    public function setRetencionIvaVentas($retencionIvaVentas)
    {
        $this->retencionIvaVentas = $retencionIvaVentas;
    }

    /**
     * Get retencionIvaVentas
     *
     * @return boolean 
     */
    public function getRetencionIvaVentas()
    {
        return $this->retencionIvaVentas;
    }
}