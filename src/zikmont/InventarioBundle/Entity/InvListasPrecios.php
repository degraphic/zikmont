<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_listas_precios")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvListasPreciosRepository")
 */
class InvListasPrecios
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_lista_precios_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoListaPreciosPk; 

    /**
     * @ORM\Column(name="nombre", type="string", length=80, nullable="true")
     */    
    private $nombre;    

    /**
     * @ORM\Column(name="estado_inactiva", type="boolean")
     */    
    private $estadoInactiva = 0;  
    
    
    /**
     * Get codigoListaPrecioPk
     *
     * @return integer 
     */
    public function getCodigoListaPrecioPk()
    {
        return $this->codigoListaPrecioPk;
    }

    /**
     * Set nombreListaPrecios
     *
     * @param string $nombreListaPrecios
     */
    public function setNombreListaPrecios($nombreListaPrecios)
    {
        $this->nombreListaPrecios = $nombreListaPrecios;
    }

    /**
     * Get nombreListaPrecios
     *
     * @return string 
     */
    public function getNombreListaPrecios()
    {
        return $this->nombreListaPrecios;
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

    /**
     * Get codigoListaPreciosPk
     *
     * @return integer 
     */
    public function getCodigoListaPreciosPk()
    {
        return $this->codigoListaPreciosPk;
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
}