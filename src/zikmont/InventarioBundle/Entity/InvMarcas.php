<?php

namespace zikmont\InventarioBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_marcas")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvMarcasRepository")
 */
class InvMarcas
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_marca_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoMarcaPk;

    /**
     * @ORM\Column(name="nombre_marca", type="string", length=255)
     * @Assert\NotNull()(message="Debe escribir un nombre de marca")
     * @Assert\MaxLength(255)
     */
    private $nombreMarca;

    /**
     * Set codigoMarcaPk
     *
     * @param integer $codigoMarcaPk
     */
    public function setCodigoMarcaPk($codigoMarcaPk)
    {
        $this->codigoMarcaPk = $codigoMarcaPk;
    }

    /**
     * Get codigoMarcaPk
     *
     * @return integer 
     */
    public function getCodigoMarcaPk()
    {
        return $this->codigoMarcaPk;
    }

    /**
     * Set NmMarca
     *
     * @param string $nmMarca
     */
    public function setNmMarca($nmMarca)
    {
        $this->NmMarca = $nmMarca;
    }

    /**
     * Get NmMarca
     *
     * @return string 
     */
    public function getNmMarca()
    {
        return $this->NmMarca;
    }

    /**
     * Set nombreMarca
     *
     * @param string $nombreMarca
     */
    public function setNombreMarca($nombreMarca)
    {
        $this->nombreMarca = $nombreMarca;
    }

    /**
     * Get nombreMarca
     *
     * @return string 
     */
    public function getNombreMarca()
    {
        return $this->nombreMarca;
    }
}