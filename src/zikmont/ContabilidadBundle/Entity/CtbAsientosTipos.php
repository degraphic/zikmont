<?php

namespace zikmont\ContabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ctb_asientos_tipos")
 * @ORM\Entity(repositoryClass="zikmont\ContabilidadBundle\Repository\CtbAsientosTiposRepository")
 */
class CtbAsientosTipos
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_asiento_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoAsientoTipoPk;

    /**
     * @ORM\Column(name="nombre_asiento_tipo", type="string", length=80, nullable="true")
     */    
    private $nombreAsientoTipo;      
    
    /**
     * @ORM\Column(name="cuenta", type="string", length=15, nullable="true")
     */    
    private $cuenta; 
    
    /**
     * @ORM\Column(name="enlaza_cuentas_pagar", type="boolean")
     */    
    private $enlazaCuentasPagar = 0;    
    
    /**
     * @ORM\Column(name="enlaza_cuentas_cobrar", type="boolean")
     */    
    private $enlazaCuentasCobrar = 0;        



    /**
     * Get codigoAsientoTipoPk
     *
     * @return integer 
     */
    public function getCodigoAsientoTipoPk()
    {
        return $this->codigoAsientoTipoPk;
    }

    /**
     * Set nombreAsientoTipo
     *
     * @param string $nombreAsientoTipo
     */
    public function setNombreAsientoTipo($nombreAsientoTipo)
    {
        $this->nombreAsientoTipo = $nombreAsientoTipo;
    }

    /**
     * Get nombreAsientoTipo
     *
     * @return string 
     */
    public function getNombreAsientoTipo()
    {
        return $this->nombreAsientoTipo;
    }

    /**
     * Set cuenta
     *
     * @param string $cuenta
     */
    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
    }

    /**
     * Get cuenta
     *
     * @return string 
     */
    public function getCuenta()
    {
        return $this->cuenta;
    }

    /**
     * Set enlazaCuentasPagar
     *
     * @param boolean $enlazaCuentasPagar
     */
    public function setEnlazaCuentasPagar($enlazaCuentasPagar)
    {
        $this->enlazaCuentasPagar = $enlazaCuentasPagar;
    }

    /**
     * Get enlazaCuentasPagar
     *
     * @return boolean 
     */
    public function getEnlazaCuentasPagar()
    {
        return $this->enlazaCuentasPagar;
    }

    /**
     * Set enlazaCuentasCobrar
     *
     * @param boolean $enlazaCuentasCobrar
     */
    public function setEnlazaCuentasCobrar($enlazaCuentasCobrar)
    {
        $this->enlazaCuentasCobrar = $enlazaCuentasCobrar;
    }

    /**
     * Get enlazaCuentasCobrar
     *
     * @return boolean 
     */
    public function getEnlazaCuentasCobrar()
    {
        return $this->enlazaCuentasCobrar;
    }
}