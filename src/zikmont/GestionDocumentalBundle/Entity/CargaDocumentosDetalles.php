<?php

namespace zikmont\GestionDocumentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\GestionDocumentalBundle\Entity\CargaDocumentosDetalles
 *
 * @ORM\Table(name="gdc_carga_documentos_detalles")
 * @ORM\Entity
 */
class CargaDocumentosDetalles
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_carga_detalle_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $codigoCargaDetallePk;
    
    /**
     * @ORM\Column(name="codigo_carga_fk", type="integer")
     */      
    private $codigoCargaFk;
    
    /**
     * @ORM\Column(name="titulo_documento", type="string", length=100, nullable="true")
     */      
    private $tituloDocumento;
    
    /**
     * @ORM\Column(name="fecha_carga", type="date")
     */      
    private $fechaCarga;
    
    /**
     * @ORM\Column(name="codigo_documento_fk", type="integer")
     */      
    private $codigoDocumentoFk;
    
    /**
     * @ORM\Column(name="fisico", type="boolean")
     */      
    private $fisico;
    
    /**
     * @ORM\Column(name="digital", type="boolean")
     */      
    private $digital;
    
    /**
     * @ORM\Column(name="extension", type="string" , length=80)
     */      
    private $extension;
    
    /**
     * @ORM\Column(name="codigo_archivo", type="integer")
     */      
    private $codigoArchivo;
    
    /**
     * @ORM\Column(name="codigo_directorio", type="integer")
     */      
    private $codigoDirectorio;
    
    /**
     * @ORM\Column(name="version", type="float")
     */      
    private $version;
    
    /**
     * @ORM\Column(name="usuario", type="string", length=20, nullable="true")
     */      
    private $usuario;
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=150, nullable="true")
     */      
    private $comentarios;
    
    /**
     * @ORM\ManyToOne(targetEntity="CargaDocumentos", inversedBy="CagaDocumentosDetalles")
     * @ORM\JoinColumn(name="codigo_carga_fk", referencedColumnName="codigo_carga_pk")
     */
    protected $cargaRel;     
    
    /**
     * @ORM\ManyToOne(targetEntity="DocumentosDigitalizacion", inversedBy="CagaDocumentosDetalles")
     * @ORM\JoinColumn(name="codigo_documento_fk", referencedColumnName="codigo_documento_pk")
     */
    protected $documentosRel;     

    

    /**
     * Get codigoCargaDetallePk
     *
     * @return integer 
     */
    public function getCodigoCargaDetallePk()
    {
        return $this->codigoCargaDetallePk;
    }

    /**
     * Set codigoCargaFk
     *
     * @param integer $codigoCargaFk
     */
    public function setCodigoCargaFk($codigoCargaFk)
    {
        $this->codigoCargaFk = $codigoCargaFk;
    }

    /**
     * Get codigoCargaFk
     *
     * @return integer 
     */
    public function getCodigoCargaFk()
    {
        return $this->codigoCargaFk;
    }

    /**
     * Set tituloDocumento
     *
     * @param string $tituloDocumento
     */
    public function setTituloDocumento($tituloDocumento)
    {
        $this->tituloDocumento = $tituloDocumento;
    }

    /**
     * Get tituloDocumento
     *
     * @return string 
     */
    public function getTituloDocumento()
    {
        return $this->tituloDocumento;
    }

    /**
     * Set fechaCarga
     *
     * @param date $fechaCarga
     */
    public function setFechaCarga($fechaCarga)
    {
        $this->fechaCarga = $fechaCarga;
    }

    /**
     * Get fechaCarga
     *
     * @return date 
     */
    public function getFechaCarga()
    {
        return $this->fechaCarga;
    }

    /**
     * Set codigoDocumentoFk
     *
     * @param integer $codigoDocumentoFk
     */
    public function setCodigoDocumentoFk($codigoDocumentoFk)
    {
        $this->codigoDocumentoFk = $codigoDocumentoFk;
    }

    /**
     * Get codigoDocumentoFk
     *
     * @return integer 
     */
    public function getCodigoDocumentoFk()
    {
        return $this->codigoDocumentoFk;
    }

    /**
     * Set fisico
     *
     * @param boolean $fisico
     */
    public function setFisico($fisico)
    {
        $this->fisico = $fisico;
    }

    /**
     * Get fisico
     *
     * @return boolean 
     */
    public function getFisico()
    {
        return $this->fisico;
    }

    /**
     * Set digital
     *
     * @param boolean $digital
     */
    public function setDigital($digital)
    {
        $this->digital = $digital;
    }

    /**
     * Get digital
     *
     * @return boolean 
     */
    public function getDigital()
    {
        return $this->digital;
    }

    /**
     * Set extension
     *
     * @param string $extension
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }

    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set codigoArchivo
     *
     * @param integer $codigoArchivo
     */
    public function setCodigoArchivo($codigoArchivo)
    {
        $this->codigoArchivo = $codigoArchivo;
    }

    /**
     * Get codigoArchivo
     *
     * @return integer 
     */
    public function getCodigoArchivo()
    {
        return $this->codigoArchivo;
    }

    /**
     * Set codigoDirectorio
     *
     * @param integer $codigoDirectorio
     */
    public function setCodigoDirectorio($codigoDirectorio)
    {
        $this->codigoDirectorio = $codigoDirectorio;
    }

    /**
     * Get codigoDirectorio
     *
     * @return integer 
     */
    public function getCodigoDirectorio()
    {
        return $this->codigoDirectorio;
    }

    /**
     * Set version
     *
     * @param float $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Get version
     *
     * @return float 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
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
     * Set cargaRel
     *
     * @param zikmont\GestionDocumentalBundle\Entity\CargaDocumentos $cargaRel
     */
    public function setCargaRel(\zikmont\GestionDocumentalBundle\Entity\CargaDocumentos $cargaRel)
    {
        $this->cargaRel = $cargaRel;
    }

    /**
     * Get cargaRel
     *
     * @return zikmont\GestionDocumentalBundle\Entity\CargaDocumentos 
     */
    public function getCargaRel()
    {
        return $this->cargaRel;
    }

    /**
     * Set documentosRel
     *
     * @param zikmont\GestionDocumentalBundle\Entity\DocumentosDigitalizacion $documentosRel
     */
    public function setDocumentosRel(\zikmont\GestionDocumentalBundle\Entity\DocumentosDigitalizacion $documentosRel)
    {
        $this->documentosRel = $documentosRel;
    }

    /**
     * Get documentosRel
     *
     * @return zikmont\GestionDocumentalBundle\Entity\DocumentosDigitalizacion 
     */
    public function getDocumentosRel()
    {
        return $this->documentosRel;
    }
}