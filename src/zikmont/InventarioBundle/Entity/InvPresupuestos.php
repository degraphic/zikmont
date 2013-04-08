<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="inv_presupuestos")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvPresupuestosRepository")
 */
class InvPresupuestos
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_presupuesto_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoPresupuestoPk;

    /**
     * @ORM\Column(name="annio", type="integer")
     */
    private $annio;

    /**
     * @ORM\Column(name="mes", type="integer")
     */
    private $mes;    
    

    /**
     * Get codigoPresupuestoPk
     *
     * @return integer 
     */
    public function getCodigoPresupuestoPk()
    {
        return $this->codigoPresupuestoPk;
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
}