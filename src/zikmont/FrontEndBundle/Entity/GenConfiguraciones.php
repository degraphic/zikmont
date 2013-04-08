<?php

namespace zikmont\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gen_configuraciones")
 * @ORM\Entity(repositoryClass="zikmont\FrontEndBundle\Repository\GenConfiguracionesRepository")
 */
class GenConfiguraciones
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_configuracion_pk", type="smallint")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoConfiguracionPk;    
    
    /**
     * @ORM\Column(name="base_retencion_fuente", type="float")
     */
    private $baseRetencionFuente = 0; 

    /**
     * @ORM\Column(name="porcentaje_retencion_fuente", type="float")
     */
    private $porcentajeRetencionFuente = 0;     
    
    /**
     * @ORM\Column(name="base_retencion_iva_ventas", type="float")
     */
    private $baseRetencionIvaVentas = 0;     

    /**
     * @ORM\Column(name="porcentaje_retencion_iva_ventas", type="float")
     */
    private $porcentajeRetencionIvaVentas = 0;     
    
    /**
     * @ORM\Column(name="fecha_ultimo_cierre", type="date", nullable="true")
     */    
    private $fechaUltimoCierre;     

    /**
     * @ORM\Column(name="nit_ventas_mostrador", type="integer")
     */
    private $nitVentasMostrador = 0;         


    /**
     * Get codigoConfiguracionPk
     *
     * @return smallint 
     */
    public function getCodigoConfiguracionPk()
    {
        return $this->codigoConfiguracionPk;
    }

    /**
     * Set baseRetencionFuente
     *
     * @param float $baseRetencionFuente
     */
    public function setBaseRetencionFuente($baseRetencionFuente)
    {
        $this->baseRetencionFuente = $baseRetencionFuente;
    }

    /**
     * Get baseRetencionFuente
     *
     * @return float 
     */
    public function getBaseRetencionFuente()
    {
        return $this->baseRetencionFuente;
    }

    /**
     * Set porcentajeRetencionFuente
     *
     * @param float $porcentajeRetencionFuente
     */
    public function setPorcentajeRetencionFuente($porcentajeRetencionFuente)
    {
        $this->porcentajeRetencionFuente = $porcentajeRetencionFuente;
    }

    /**
     * Get porcentajeRetencionFuente
     *
     * @return float 
     */
    public function getPorcentajeRetencionFuente()
    {
        return $this->porcentajeRetencionFuente;
    }

    /**
     * Set baseRetencionIvaVentas
     *
     * @param float $baseRetencionIvaVentas
     */
    public function setBaseRetencionIvaVentas($baseRetencionIvaVentas)
    {
        $this->baseRetencionIvaVentas = $baseRetencionIvaVentas;
    }

    /**
     * Get baseRetencionIvaVentas
     *
     * @return float 
     */
    public function getBaseRetencionIvaVentas()
    {
        return $this->baseRetencionIvaVentas;
    }

    /**
     * Set porcentajeRetencionIvaVentas
     *
     * @param float $porcentajeRetencionIvaVentas
     */
    public function setPorcentajeRetencionIvaVentas($porcentajeRetencionIvaVentas)
    {
        $this->porcentajeRetencionIvaVentas = $porcentajeRetencionIvaVentas;
    }

    /**
     * Get porcentajeRetencionIvaVentas
     *
     * @return float 
     */
    public function getPorcentajeRetencionIvaVentas()
    {
        return $this->porcentajeRetencionIvaVentas;
    }

    /**
     * Set fechaUltimoCierre
     *
     * @param date $fechaUltimoCierre
     */
    public function setFechaUltimoCierre($fechaUltimoCierre)
    {
        $this->fechaUltimoCierre = $fechaUltimoCierre;
    }

    /**
     * Get fechaUltimoCierre
     *
     * @return date 
     */
    public function getFechaUltimoCierre()
    {
        return $this->fechaUltimoCierre;
    }

    /**
     * Set nitVentasMostrador
     *
     * @param integer $nitVentasMostrador
     */
    public function setNitVentasMostrador($nitVentasMostrador)
    {
        $this->nitVentasMostrador = $nitVentasMostrador;
    }

    /**
     * Get nitVentasMostrador
     *
     * @return integer 
     */
    public function getNitVentasMostrador()
    {
        return $this->nitVentasMostrador;
    }
}