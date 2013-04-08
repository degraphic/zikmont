<?php

namespace zikmont\TransporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="tpt_despachos")
 * @ORM\Entity(repositoryClass="zikmont\TransporteBundle\Repository\TptDespachosRepository")
 */
class TptDespachos
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_despacho_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoDespachoPk;

    /**
     * @ORM\Column(name="fecha", type="datetime", nullable="true")
     */    
    private $fecha;  
    
    /**
     * @ORM\Column(name="codigo_usuario_fk", type="string", length=20, nullable="true")
     */    
    private $codigoUsuarioFk; 

    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable="true")
     */    
    private $comentarios;     
    

    /**
     * Get codigoDespachoPk
     *
     * @return integer 
     */
    public function getCodigoDespachoPk()
    {
        return $this->codigoDespachoPk;
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
}