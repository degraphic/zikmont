<?php

namespace zikmont\ContabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ctb_cuentas_contables")
 * @ORM\Entity(repositoryClass="zikmont\ContabilidadBundle\Repository\CtbCuentasContablesRepository")
 */
class CtbCuentasContables
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_cuenta_pk", type="string", length=20)
     */        
    private $codigoCuentaPk;
    
    /**
     * @ORM\Column(name="nombre_cuenta", type="string", length=60)
     */     
    private $nombreCuenta;     
    
    /**
     * @ORM\Column(name="codigo_cuenta_padre_fk", type="integer", nullable="false")
     */ 
    private $codigo_cuenta_padre_fk;    

    
    /**
     * @ORM\Column(name="permite_movimientos", type="boolean")
     */    
    private $permiteMovimientos = 0;      

    /**
     * @ORM\Column(name="exige_nit", type="boolean")
     */    
    private $exigeNit = 0;    
    
    /**
     * @ORM\Column(name="exige_centro_costos", type="boolean")
     */    
    private $exigeCentroCostos = 0;     
    


    /**
     * Set codigoCuentaPk
     *
     * @param string $codigoCuentaPk
     */
    public function setCodigoCuentaPk($codigoCuentaPk)
    {
        $this->codigoCuentaPk = $codigoCuentaPk;
    }

    /**
     * Get codigoCuentaPk
     *
     * @return string 
     */
    public function getCodigoCuentaPk()
    {
        return $this->codigoCuentaPk;
    }

    /**
     * Set nombreCuenta
     *
     * @param string $nombreCuenta
     */
    public function setNombreCuenta($nombreCuenta)
    {
        $this->nombreCuenta = $nombreCuenta;
    }

    /**
     * Get nombreCuenta
     *
     * @return string 
     */
    public function getNombreCuenta()
    {
        return $this->nombreCuenta;
    }

    /**
     * Set codigo_cuenta_padre_fk
     *
     * @param integer $codigoCuentaPadreFk
     */
    public function setCodigoCuentaPadreFk($codigoCuentaPadreFk)
    {
        $this->codigo_cuenta_padre_fk = $codigoCuentaPadreFk;
    }

    /**
     * Get codigo_cuenta_padre_fk
     *
     * @return integer 
     */
    public function getCodigoCuentaPadreFk()
    {
        return $this->codigo_cuenta_padre_fk;
    }

    /**
     * Set permiteMovimientos
     *
     * @param boolean $permiteMovimientos
     */
    public function setPermiteMovimientos($permiteMovimientos)
    {
        $this->permiteMovimientos = $permiteMovimientos;
    }

    /**
     * Get permiteMovimientos
     *
     * @return boolean 
     */
    public function getPermiteMovimientos()
    {
        return $this->permiteMovimientos;
    }

    /**
     * Set exigeNit
     *
     * @param boolean $exigeNit
     */
    public function setExigeNit($exigeNit)
    {
        $this->exigeNit = $exigeNit;
    }

    /**
     * Get exigeNit
     *
     * @return boolean 
     */
    public function getExigeNit()
    {
        return $this->exigeNit;
    }

    /**
     * Set exigeCentroCostos
     *
     * @param boolean $exigeCentroCostos
     */
    public function setExigeCentroCostos($exigeCentroCostos)
    {
        $this->exigeCentroCostos = $exigeCentroCostos;
    }

    /**
     * Get exigeCentroCostos
     *
     * @return boolean 
     */
    public function getExigeCentroCostos()
    {
        return $this->exigeCentroCostos;
    }
}