<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_lineas")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvLineasRepository")
 */
class InvLineas
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_linea_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoLineaPk;

    /**
     * @ORM\Column(name="nombre_linea", type="string", length=255)
     */
    private $nombreLinea;

   

    /**
     * Get codigoLineaPk
     *
     * @return integer 
     */
    public function getCodigoLineaPk()
    {
        return $this->codigoLineaPk;
    }

    /**
     * Set nombreLinea
     *
     * @param string $nombreLinea
     */
    public function setNombreLinea($nombreLinea)
    {
        $this->nombreLinea = $nombreLinea;
    }

    /**
     * Get nombreLinea
     *
     * @return string 
     */
    public function getNombreLinea()
    {
        return $this->nombreLinea;
    }
}