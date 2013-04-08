<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_cierres_mes")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvCierresMesRepository")
 */
class InvCierresMes
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_cierre_mes_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCierreMesPk;
    
    /**
     * @ORM\Column(name="annio", type="integer")
     */
    private $annio;

    /**
     * @ORM\Column(name="mes", type="integer")
     */
    private $mes;

    /**
     * @ORM\Column(name="fecha_inicio", type="datetime", nullable="true")
     */    
    private $fechaInicio;      

    /**
     * @ORM\Column(name="fecha_fin", type="datetime", nullable="true")
     */    
    private $fechaFin;    
    
    /**
     * @ORM\Column(name="total_ventas", type="float")
     */
    private $totalVentas = 0;    
    
    /**
     * @ORM\Column(name="total_compras", type="float")
     */
    private $totalCompras = 0;    
    
    /**
     * @ORM\Column(name="estado_cerrado", type="boolean")
     */    
    private $estadoCerrado = 0;     
    

    /**
     * Get codigoCierreMesPk
     *
     * @return integer 
     */
    public function getCodigoCierreMesPk()
    {
        return $this->codigoCierreMesPk;
    }

    /**
     * Set annio
     *
     * @param integer $annio
     */
    public function setAnnio($annio)
    {
        $this->annio = $annio;
    }

    /**
     * Get annio
     *
     * @return integer 
     */
    public function getAnnio()
    {
        return $this->annio;
    }

    /**
     * Set mes
     *
     * @param integer $mes
     */
    public function setMes($mes)
    {
        $this->mes = $mes;
    }

    /**
     * Get mes
     *
     * @return integer 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set fechaInicio
     *
     * @param datetime $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * Get fechaInicio
     *
     * @return datetime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param datetime $fechaFin
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }

    /**
     * Get fechaFin
     *
     * @return datetime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set totalVentas
     *
     * @param float $totalVentas
     */
    public function setTotalVentas($totalVentas)
    {
        $this->totalVentas = $totalVentas;
    }

    /**
     * Get totalVentas
     *
     * @return float 
     */
    public function getTotalVentas()
    {
        return $this->totalVentas;
    }

    /**
     * Set totalCompras
     *
     * @param float $totalCompras
     */
    public function setTotalCompras($totalCompras)
    {
        $this->totalCompras = $totalCompras;
    }

    /**
     * Get totalCompras
     *
     * @return float 
     */
    public function getTotalCompras()
    {
        return $this->totalCompras;
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
}