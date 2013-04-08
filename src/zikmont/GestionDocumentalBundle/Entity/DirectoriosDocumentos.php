<?php

namespace zikmont\GestionDocumentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\GestionDocumentalBundle\Entity\DirectoriosDocumentos
 *
 * @ORM\Table(name="gdc_directorios_documentos")
 * @ORM\Entity(repositoryClass="zikmont\GestionDocumentalBundle\Repository\DirectoriosDocumentosRepository")
 */
class DirectoriosDocumentos
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_directorio_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $codigoDirectorioPk;

    /**
     * @ORM\Column(name="nombre_directorio", type="string", length=80, nullable="true")
     */      
    private $nombreDirectorio;
    
    /**
     * @ORM\Column(name="fecha_creacion_directorio", type="datetime")
     */      
    private $fechaCreacionDirectorio;
    
    /**
     * @ORM\Column(name="codigo_directorio_padre_fk", type="integer", nullable="true")
     */     
    private $codigoDirectorioPadreFk;
    
    /**
     * @ORM\Column(name="nombre_usuario", type="string", length=20, nullable="true")
     */      
    private $nombreUsuario;
    
    /**
     * @ORM\Column(name="inactivo", type="boolean", nullable="true")
     */      
    private $inactivo = 0;
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=80, nullable="true")
     */      
    private $comentarios;

    /**
     * Get codigoDirectorioPk
     *
     * @return integer 
     */
    public function getCodigoDirectorioPk()
    {
        return $this->codigoDirectorioPk;
    }

    /**
     * Set nombreDirectorio
     *
     * @param string $nombreDirectorio
     */
    public function setNombreDirectorio($nombreDirectorio)
    {
        $this->nombreDirectorio = $nombreDirectorio;
    }

    /**
     * Get nombreDirectorio
     *
     * @return string 
     */
    public function getNombreDirectorio()
    {
        return $this->nombreDirectorio;
    }

    /**
     * Set fechaCreacionDirectorio
     *
     * @param datetime $fechaCreacionDirectorio
     */
    public function setFechaCreacionDirectorio($fechaCreacionDirectorio)
    {
        $this->fechaCreacionDirectorio = $fechaCreacionDirectorio;
    }

    /**
     * Get fechaCreacionDirectorio
     *
     * @return datetime 
     */
    public function getFechaCreacionDirectorio()
    {
        return $this->fechaCreacionDirectorio;
    }

    /**
     * Set codigoDirectorioPadreFk
     *
     * @param integer $codigoDirectorioPadreFk
     */
    public function setCodigoDirectorioPadreFk($codigoDirectorioPadreFk)
    {
        $this->codigoDirectorioPadreFk = $codigoDirectorioPadreFk;
    }

    /**
     * Get codigoDirectorioPadreFk
     *
     * @return integer 
     */
    public function getCodigoDirectorioPadreFk()
    {
        return $this->codigoDirectorioPadreFk;
    }

    /**
     * Set nombreUsuario
     *
     * @param string $nombreUsuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * Get nombreUsuario
     *
     * @return string 
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set inactivo
     *
     * @param boolean $inactivo
     */
    public function setInactivo($inactivo)
    {
        $this->inactivo = $inactivo;
    }

    /**
     * Get inactivo
     *
     * @return boolean 
     */
    public function getInactivo()
    {
        return $this->inactivo;
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