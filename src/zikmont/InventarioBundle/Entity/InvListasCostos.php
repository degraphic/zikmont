<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_listas_costos")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvListasCostosRepository")
 */
class InvListasCostos
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_lista_costos_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoListaCostosPk;
    
    /**
     * @ORM\Column(name="nombre", type="string", length=150, nullable="true")
     */    
    private $nombre;    
    
    /**
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable="true")
     */    
    private $fechaCreacion; 
    
    /**
     * @ORM\Column(name="vigente_hasta", type="date", nullable="true")
     */    
    private $vigenteHasta;    

    /**
     * @ORM\Column(name="estado_inactiva", type="boolean")
     */    
    private $estadoInactiva = 0;    
    

    /**
     * Get codigoListaCostosPk
     *
     * @return integer 
     */
    public function getCodigoListaCostosPk()
    {
        return $this->codigoListaCostosPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fechaCreacion
     *
     * @param datetime $fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * Get fechaCreacion
     *
     * @return datetime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set vigenteHasta
     *
     * @param date $vigenteHasta
     */
    public function setVigenteHasta($vigenteHasta)
    {
        $this->vigenteHasta = $vigenteHasta;
    }

    /**
     * Get vigenteHasta
     *
     * @return date 
     */
    public function getVigenteHasta()
    {
        return $this->vigenteHasta;
    }

    /**
     * Set estadoInactiva
     *
     * @param boolean $estadoInactiva
     */
    public function setEstadoInactiva($estadoInactiva)
    {
        $this->estadoInactiva = $estadoInactiva;
    }

    /**
     * Get estadoInactiva
     *
     * @return boolean 
     */
    public function getEstadoInactiva()
    {
        return $this->estadoInactiva;
    }
}