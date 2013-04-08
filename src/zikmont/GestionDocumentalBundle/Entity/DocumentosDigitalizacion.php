<?php

namespace zikmont\GestionDocumentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\GestionDocumentalBundle\Entity\DocumentosDigitalizacion
 *
 * @ORM\Table(name="gdc_documentos_digitalizacion")
 * @ORM\Entity(repositoryClass="zikmont\GestionDocumentalBundle\Repository\DocumentosDigitalizacionRepository")
 */
class DocumentosDigitalizacion
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_documento_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $codigoDocumentoPk;

    /**
     * @ORM\Column(name="nombre_documento", type="string", length=80, nullable="true")
     */      
    private $nombreDocumento; 
    
    
    /**
     * @ORM\Column(name="fecha_creado", type="date", nullable="true")
     */    
    private $fechaCreado; 
    
    /**
     * @ORM\Column(name="usuario", type="string", length=80, nullable="true")
     */      
    private $nombreUsuario;
    
    /**
     * @ORM\Column(name="inactivo", type="boolean", nullable=true)
     */      
    private $inactivo = 0; 

    /**
     * Get codigoDocumentoPk
     *
     * @return integer 
     */
    public function getCodigoDocumentoPk()
    {
        return $this->codigoDocumentoPk;
    }

    /**
     * Set nombreDocumento
     *
     * @param string $nombreDocumento
     */
    public function setNombreDocumento($nombreDocumento)
    {
        $this->nombreDocumento = $nombreDocumento;
    }

    /**
     * Get nombreDocumento
     *
     * @return string 
     */
    public function getNombreDocumento()
    {
        return $this->nombreDocumento;
    }

    /**
     * Set fechaCreado
     *
     * @param date $fechaCreado
     */
    public function setFechaCreado($fechaCreado)
    {
        $this->fechaCreado = $fechaCreado;
    }

    /**
     * Get fechaCreado
     *
     * @return date 
     */
    public function getFechaCreado()
    {
        return $this->fechaCreado;
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
}