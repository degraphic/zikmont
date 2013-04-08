<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_grupos")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvGruposRepository")
 */
class InvGrupos
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_grupo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoGrupoPk;

    /**
     * @ORM\Column(name="nombre_grupo", type="string", length=255)
     */
    private $nombreGrupo;

    /**
     * @ORM\Column(name="codigo_linea_fk", type="integer", length=255)
     */
    private $codigoLineaFk;

   

    /**
     * Get codigoGrupoPk
     *
     * @return integer 
     */
    public function getCodigoGrupoPk()
    {
        return $this->codigoGrupoPk;
    }

    /**
     * Set nombreGrupo
     *
     * @param string $nombreGrupo
     */
    public function setNombreGrupo($nombreGrupo)
    {
        $this->nombreGrupo = $nombreGrupo;
    }

    /**
     * Get nombreGrupo
     *
     * @return string 
     */
    public function getNombreGrupo()
    {
        return $this->nombreGrupo;
    }

    /**
     * Set codigoLineaFk
     *
     * @param integer $codigoLineaFk
     */
    public function setCodigoLineaFk($codigoLineaFk)
    {
        $this->codigoLineaFk = $codigoLineaFk;
    }

    /**
     * Get codigoLineaFk
     *
     * @return integer 
     */
    public function getCodigoLineaFk()
    {
        return $this->codigoLineaFk;
    }
}