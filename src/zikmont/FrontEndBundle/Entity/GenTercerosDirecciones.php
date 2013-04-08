<?php

namespace zikmont\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gen_terceros_direcciones")
 * @ORM\Entity(repositoryClass="zikmont\FrontEndBundle\Repository\GenTercerosDireccionesRepository")
 */
class GenTercerosDirecciones
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_direccion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoDireccionPk;
    
    /**
     * @ORM\Column(name="nombre_direccion", type="string", length=255)
     */
    private $nombreDireccion;

    /**
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @ORM\Column(name="codigo_tercero_fk", type="integer", length=255)
     */
    private $codigoTerceroFk;

    /**
     * @ORM\Column(name="contacto", type="string", length=255)
     */
    private $contacto;

    /**
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="GenTerceros", inversedBy="GenTercerosDirecciones")
     * @ORM\JoinColumn(name="codigo_tercero_fk", referencedColumnName="codigo_tercero_pk")
     */
    protected $tercerosRel;     

    /**
     * Get codigoDireccionPk
     *
     * @return integer 
     */
    public function getCodigoDireccionPk()
    {
        return $this->codigoDireccionPk;
    }

    /**
     * Set nombreDireccion
     *
     * @param string $nombreDireccion
     */
    public function setNombreDireccion($nombreDireccion)
    {
        $this->nombreDireccion = $nombreDireccion;
    }

    /**
     * Get nombreDireccion
     *
     * @return string 
     */
    public function getNombreDireccion()
    {
        return $this->nombreDireccion;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
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
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tercerosRel
     *
     * @param zikmont\FrontEndBundle\Entity\GenTerceros $tercerosRel
     */
    public function setTercerosRel(\zikmont\FrontEndBundle\Entity\GenTerceros $tercerosRel)
    {
        $this->tercerosRel = $tercerosRel;
    }

    /**
     * Get tercerosRel
     *
     * @return zikmont\FrontEndBundle\Entity\GenTerceros 
     */
    public function getTercerosRel()
    {
        return $this->tercerosRel;
    }
}