<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\FrontEndBundle\Entity\UnidadesMedida
 *
 * @ORM\Table(name="inv_unidades_medida")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvUnidadesMedidaRepository")
 */
class InvUnidadesMedida
{
    /**
     * @var integer $codigo_unidad_pk
     * @ORM\Id
     * @ORM\Column(name="codigo_unidad_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoUnidadPk;

    /**
     * @var string $nombre_unidad
     *
     * @ORM\Column(name="nombre_unidad", type="string", length=50)
     */
    private $nombreUnidad;

    /**
     * Get codigoUnidadPk
     *
     * @return integer 
     */
    public function getCodigoUnidadPk()
    {
        return $this->codigoUnidadPk;
    }

    /**
     * Set nombreUnidad
     *
     * @param string $nombreUnidad
     */
    public function setNombreUnidad($nombreUnidad)
    {
        $this->nombreUnidad = $nombreUnidad;
    }

    /**
     * Get nombreUnidad
     *
     * @return string 
     */
    public function getNombreUnidad()
    {
        return $this->nombreUnidad;
    }
}