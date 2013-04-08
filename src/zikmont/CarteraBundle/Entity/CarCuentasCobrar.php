<?php

namespace zikmont\CarteraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="car_cuentas_cobrar")
 * @ORM\Entity(repositoryClass="zikmont\CarteraBundle\Repository\CarCuentasCobrarRepository")
 */
class CarCuentasCobrar
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_cuenta_cobrar_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoCuentaCobrarPk;        

    /**
     * @ORM\Column(name="fecha", type="date")
     */    
    private $fecha;     
    
    /**
     * @ORM\Column(name="codigo_movimiento_fk", type="integer")
     */     
    private $codigoMovimientoFk;
    
    /**
     * @ORM\Column(name="codigo_tercero_fk", type="integer")
     */    
    private $codigoTerceroFk;        
    
    /**
     * @ORM\Column(name="condicion", type="integer")
     */    
    private $condicion = 0;
    
    /**
     * @ORM\Column(name="valor_original", type="float")
     */    
    private $valorOriginal = 0;    
    
    /**
     * @ORM\Column(name="saldo", type="float")
     */    
    private $saldo = 0;        
    
    /**
     * @ORM\Column(name="debitos", type="float")
     */    
    private $debitos = 0;
    
    /**
     * @ORM\Column(name="creditos", type="float")
     */    
    private $creditos = 0;              
    


    /**
     * Get codigoCuentaCobrarPk
     *
     * @return integer 
     */
    public function getCodigoCuentaCobrarPk()
    {
        return $this->codigoCuentaCobrarPk;
    }

    /**
     * Set fecha
     *
     * @param date $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get fecha
     *
     * @return date 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set codigoMovimientoFk
     *
     * @param integer $codigoMovimientoFk
     */
    public function setCodigoMovimientoFk($codigoMovimientoFk)
    {
        $this->codigoMovimientoFk = $codigoMovimientoFk;
    }

    /**
     * Get codigoMovimientoFk
     *
     * @return integer 
     */
    public function getCodigoMovimientoFk()
    {
        return $this->codigoMovimientoFk;
    }

    /**
     * Set codigoTerceroFk
     *
     * @param integer $codigoTerceroFk
     */
    public function setCodigoTerceroFk($codigoTerceroFk)
    {
        $this->codigoTerceroFk = $codigoTerceroFk;
    }

    /**
     * Get codigoTerceroFk
     *
     * @return integer 
     */
    public function getCodigoTerceroFk()
    {
        return $this->codigoTerceroFk;
    }

    /**
     * Set condicion
     *
     * @param integer $condicion
     */
    public function setCondicion($condicion)
    {
        $this->condicion = $condicion;
    }

    /**
     * Get condicion
     *
     * @return integer 
     */
    public function getCondicion()
    {
        return $this->condicion;
    }

    /**
     * Set valorOriginal
     *
     * @param float $valorOriginal
     */
    public function setValorOriginal($valorOriginal)
    {
        $this->valorOriginal = $valorOriginal;
    }

    /**
     * Get valorOriginal
     *
     * @return float 
     */
    public function getValorOriginal()
    {
        return $this->valorOriginal;
    }

    /**
     * Set saldo
     *
     * @param float $saldo
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    /**
     * Get saldo
     *
     * @return float 
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set debitos
     *
     * @param float $debitos
     */
    public function setDebitos($debitos)
    {
        $this->debitos = $debitos;
    }

    /**
     * Get debitos
     *
     * @return float 
     */
    public function getDebitos()
    {
        return $this->debitos;
    }

    /**
     * Set creditos
     *
     * @param float $creditos
     */
    public function setCreditos($creditos)
    {
        $this->creditos = $creditos;
    }

    /**
     * Get creditos
     *
     * @return float 
     */
    public function getCreditos()
    {
        return $this->creditos;
    }
}