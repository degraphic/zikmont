<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_subgrupos")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvSubGruposRepository")
 */
class InvSubGrupos
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_subgrupo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoSubGrupoPk;

    /**
     * @ORM\Column(name="nombre_subgrupo", type="string", length=255)
     */
    private $nombreSubGrupo;

    /**
     * @ORM\Column(name="codigo_grupo_fk", type="integer", length=255)
     */
    private $codigoGrupoFk;

   

    /**
     * Get codigoSubGrupoPk
     *
     * @return integer 
     */
    public function getCodigoSubGrupoPk()
    {
        return $this->codigoSubGrupoPk;
    }

    /**
     * Set nombreSubGrupo
     *
     * @param string $nombreSubGrupo
     */
    public function setNombreSubGrupo($nombreSubGrupo)
    {
        $this->nombreSubGrupo = $nombreSubGrupo;
    }

    /**
     * Get nombreSubGrupo
     *
     * @return string 
     */
    public function getNombreSubGrupo()
    {
        return $this->nombreSubGrupo;
    }

    /**
     * Set codigoGrupoFk
     *
     * @param integer $codigoGrupoFk
     */
    public function setCodigoGrupoFk($codigoGrupoFk)
    {
        $this->codigoGrupoFk = $codigoGrupoFk;
    }

    /**
     * Get codigoGrupoFk
     *
     * @return integer 
     */
    public function getCodigoGrupoFk()
    {
        return $this->codigoGrupoFk;
    }
}