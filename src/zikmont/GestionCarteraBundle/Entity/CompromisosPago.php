<?php

namespace zikmont\GestionCarteraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * carterazk\GCarteraBundle\Entity\CompromisosPago
 */
class CompromisosPago
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $codigo_compromiso_pk
     */
    private $codigo_compromiso_pk;

    /**
     * @var datetime $fecha_compromiso
     */
    private $fecha_compromiso;

    /**
     * @var date $fecha_pago_compromiso
     */
    private $fecha_pago_compromiso;

    /**
     * @var float $valor
     */
    private $valor;

    /**
     * @var string $comentarios
     */
    private $comentarios;

    /**
     * @var boolean $incumplido
     */
    private $incumplido;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codigo_compromiso_pk
     *
     * @param integer $codigoCompromisoPk
     */
    public function setCodigoCompromisoPk($codigoCompromisoPk)
    {
        $this->codigo_compromiso_pk = $codigoCompromisoPk;
    }

    /**
     * Get codigo_compromiso_pk
     *
     * @return integer 
     */
    public function getCodigoCompromisoPk()
    {
        return $this->codigo_compromiso_pk;
    }

    /**
     * Set fecha_compromiso
     *
     * @param datetime $fechaCompromiso
     */
    public function setFechaCompromiso($fechaCompromiso)
    {
        $this->fecha_compromiso = $fechaCompromiso;
    }

    /**
     * Get fecha_compromiso
     *
     * @return datetime 
     */
    public function getFechaCompromiso()
    {
        return $this->fecha_compromiso;
    }

    /**
     * Set fecha_pago_compromiso
     *
     * @param date $fechaPagoCompromiso
     */
    public function setFechaPagoCompromiso($fechaPagoCompromiso)
    {
        $this->fecha_pago_compromiso = $fechaPagoCompromiso;
    }

    /**
     * Get fecha_pago_compromiso
     *
     * @return date 
     */
    public function getFechaPagoCompromiso()
    {
        return $this->fecha_pago_compromiso;
    }

    /**
     * Set valor
     *
     * @param float $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
    }

    /**
     * Get comentarios
     *
     * @return string 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set incumplido
     *
     * @param boolean $incumplido
     */
    public function setIncumplido($incumplido)
    {
        $this->incumplido = $incumplido;
    }

    /**
     * Get incumplido
     *
     * @return boolean 
     */
    public function getIncumplido()
    {
        return $this->incumplido;
    }
}