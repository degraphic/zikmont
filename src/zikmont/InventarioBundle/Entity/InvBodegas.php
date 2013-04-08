<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


class Bodegas
{
    /**
     * @var string $nombreBodega
     */
    private $nombreBodega;

    /**
     * @var smallint $codigoBodegaPk
     */
    private $codigoBodegaPk;


    /**
     * Set nombreBodega
     *
     * @param string $nombreBodega
     */
    public function setNombreBodega($nombreBodega)
    {
        $this->nombreBodega = $nombreBodega;
    }

    /**
     * Get nombreBodega
     *
     * @return string 
     */
    public function getNombreBodega()
    {
        return $this->nombreBodega;
    }

    /**
     * Get codigoBodegaPk
     *
     * @return smallint 
     */
    public function getCodigoBodegaPk()
    {
        return $this->codigoBodegaPk;
    }
}