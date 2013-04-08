<?php

namespace zikmont\PresupuestosCivilesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="pcv_movimientos")
 * @ORM\Entity(repositoryClass="zikmont\PresupuestosCivilesBundle\Repository\PcvMovimientosRepository")
 */
class PcvMovimientos
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_movimiento_civil_presupuesto_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoMovimientoCivilPresupuestoPk;
    
    /**
     * @ORM\Column(name="fecha", type="datetime", nullable="true")
     */    
    private $fecha; 
    
    /**
     * @ORM\Column(name="nombre_presupuesto", type="string", length=50, nullable="true")
     */    
    private $nombrePresupuesto;      

    /**
     * @ORM\Column(name="codigo_tercero_fk", type="integer", nullable="true")
     * @Assert\NotBlank
     */    
    private $codigoTerceroFk;
    
    /**
     * @ORM\Column(name="codigo_usuario_fk", type="string", length=20, nullable="true")
     */    
    private $codigoUsuarioFk; 

    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable="true")
     */    
    private $comentarios;     
    
    /**
     * @ORM\Column(name="estado_autorizado", type="boolean")
     */    
    private $estadoAutorizado = 0;    

    /**
     * @ORM\Column(name="estado_impreso", type="boolean")
     */    
    private $estadoImpreso = 0;    
    
    /**
     * @ORM\Column(name="estado_cerrado", type="boolean")
     */    
    private $estadoCerrado = 0;    
    
    /**
     * @ORM\Column(name="estado_anulado", type="boolean")
     */    
    private $estadoAnulado = 0;     
    


    /**
     * Get codigoMovimientoCivilPresupuestoPk
     *
     * @return integer 
     */
    public function getCodigoMovimientoCivilPresupuestoPk()
    {
        return $this->codigoMovimientoCivilPresupuestoPk;
    }

    /**
     * Set fecha
     *
     * @param datetime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get fecha
     *
     * @return datetime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set nombrePresupuesto
     *
     * @param string $nombrePresupuesto
     */
    public function setNombrePresupuesto($nombrePresupuesto)
    {
        $this->nombrePresupuesto = $nombrePresupuesto;
    }

    /**
     * Get nombrePresupuesto
     *
     * @return string 
     */
    public function getNombrePresupuesto()
    {
        return $this->nombrePresupuesto;
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
     * Set codigoUsuarioFk
     *
     * @param string $codigoUsuarioFk
     */
    public function setCodigoUsuarioFk($codigoUsuarioFk)
    {
        $this->codigoUsuarioFk = $codigoUsuarioFk;
    }

    /**
     * Get codigoUsuarioFk
     *
     * @return string 
     */
    public function getCodigoUsuarioFk()
    {
        return $this->codigoUsuarioFk;
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
     * Set estadoAutorizado
     *
     * @param boolean $estadoAutorizado
     */
    public function setEstadoAutorizado($estadoAutorizado)
    {
        $this->estadoAutorizado = $estadoAutorizado;
    }

    /**
     * Get estadoAutorizado
     *
     * @return boolean 
     */
    public function getEstadoAutorizado()
    {
        return $this->estadoAutorizado;
    }

    /**
     * Set estadoImpreso
     *
     * @param boolean $estadoImpreso
     */
    public function setEstadoImpreso($estadoImpreso)
    {
        $this->estadoImpreso = $estadoImpreso;
    }

    /**
     * Get estadoImpreso
     *
     * @return boolean 
     */
    public function getEstadoImpreso()
    {
        return $this->estadoImpreso;
    }

    /**
     * Set estadoCerrado
     *
     * @param boolean $estadoCerrado
     */
    public function setEstadoCerrado($estadoCerrado)
    {
        $this->estadoCerrado = $estadoCerrado;
    }

    /**
     * Get estadoCerrado
     *
     * @return boolean 
     */
    public function getEstadoCerrado()
    {
        return $this->estadoCerrado;
    }

    /**
     * Set estadoAnulado
     *
     * @param boolean $estadoAnulado
     */
    public function setEstadoAnulado($estadoAnulado)
    {
        $this->estadoAnulado = $estadoAnulado;
    }

    /**
     * Get estadoAnulado
     *
     * @return boolean 
     */
    public function getEstadoAnulado()
    {
        return $this->estadoAnulado;
    }
}