<?php

namespace zikmont\GestionCarteraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * carterazk\GCarteraBundle\Entity\RegistroGestion
 */
class RegistroGestion
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $codigo_registro_pk
     */
    private $codigo_registro_pk;

    /**
     * @var datetime $fecha_registro
     */
    private $fecha_registro;

    /**
     * @var string $telefono
     */
    private $telefono;

    /**
     * @var string $contacto
     */
    private $contacto;

    /**
     * @var integer $codigo_concepto_fk
     */
    private $codigo_concepto_fk;

    /**
     * @var string $codigo_usuario
     */
    private $codigo_usuario;

    /**
     * @var string $comentarios
     */
    private $comentarios;


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
     * Set codigo_registro_pk
     *
     * @param integer $codigoRegistroPk
     */
    public function setCodigoRegistroPk($codigoRegistroPk)
    {
        $this->codigo_registro_pk = $codigoRegistroPk;
    }

    /**
     * Get codigo_registro_pk
     *
     * @return integer 
     */
    public function getCodigoRegistroPk()
    {
        return $this->codigo_registro_pk;
    }

    /**
     * Set fecha_registro
     *
     * @param datetime $fechaRegistro
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fecha_registro = $fechaRegistro;
    }

    /**
     * Get fecha_registro
     *
     * @return datetime 
     */
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
    }

    /**
     * Get contacto
     *
     * @return string 
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set codigo_concepto_fk
     *
     * @param integer $codigoConceptoFk
     */
    public function setCodigoConceptoFk($codigoConceptoFk)
    {
        $this->codigo_concepto_fk = $codigoConceptoFk;
    }

    /**
     * Get codigo_concepto_fk
     *
     * @return integer 
     */
    public function getCodigoConceptoFk()
    {
        return $this->codigo_concepto_fk;
    }

    /**
     * Set codigo_usuario
     *
     * @param string $codigoUsuario
     */
    public function setCodigoUsuario($codigoUsuario)
    {
        $this->codigo_usuario = $codigoUsuario;
    }

    /**
     * Get codigo_usuario
     *
     * @return string 
     */
    public function getCodigoUsuario()
    {
        return $this->codigo_usuario;
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