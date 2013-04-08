<?php

namespace zikmont\GestionDocumentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\GestionDocumentalBundle\Entity\ConfiguracionDirectoriosocumentos
 *
 * @ORM\Table(name="gdc_configuracion_documentos_directorios")
 * @ORM\Entity
 */
class ConfiguracionDirectoriosDocumentos
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_configuracion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $codigoDocumentoPk;
    
    /**
     * @ORM\Column(name="ruta_documentos", type="string", length=80, nullable="true")
     */      
    private $rutaDirectorioDocumentos;
    
    
    /**
     * @ORM\Column(name="ruta_documentos_operativos", type="string", length=80, nullable="true")
     */      
    private $rutaDirectorioDocumentosOperativos;
    
    
    /**
     * @ORM\Column(name="ruta_documentos_terceros", type="string", length=80, nullable="true")
     */      
    private $rutaDirectorioDocumentosTerceros;
    
    /**
     * @ORM\Column(name="ruta_documentos_productos", type="string", length=80, nullable="true")
     */      
    private $rutaDirectorioDocumentosProductos;
    
    /**
     * @ORM\Column(name="ruta_documentos_contables", type="string", length=80, nullable="true")
     */      
    private $rutaDirectorioDocumentosContables;
    
    /**
     * @ORM\Column(name="codigo_consecutivo_archivo", type="integer")
     */ 
    private $codigoConsecutivoArchivo;

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
     * Set rutaDirectorioDocumentos
     *
     * @param string $rutaDirectorioDocumentos
     */
    public function setRutaDirectorioDocumentos($rutaDirectorioDocumentos)
    {
        $this->rutaDirectorioDocumentos = $rutaDirectorioDocumentos;
    }

    /**
     * Get rutaDirectorioDocumentos
     *
     * @return string 
     */
    public function getRutaDirectorioDocumentos()
    {
        return $this->rutaDirectorioDocumentos;
    }

    /**
     * Set rutaDirectorioDocumentosOperativos
     *
     * @param string $rutaDirectorioDocumentosOperativos
     */
    public function setRutaDirectorioDocumentosOperativos($rutaDirectorioDocumentosOperativos)
    {
        $this->rutaDirectorioDocumentosOperativos = $rutaDirectorioDocumentosOperativos;
    }

    /**
     * Get rutaDirectorioDocumentosOperativos
     *
     * @return string 
     */
    public function getRutaDirectorioDocumentosOperativos()
    {
        return $this->rutaDirectorioDocumentosOperativos;
    }

    /**
     * Set rutaDirectorioDocumentosTerceros
     *
     * @param string $rutaDirectorioDocumentosTerceros
     */
    public function setRutaDirectorioDocumentosTerceros($rutaDirectorioDocumentosTerceros)
    {
        $this->rutaDirectorioDocumentosTerceros = $rutaDirectorioDocumentosTerceros;
    }

    /**
     * Get rutaDirectorioDocumentosTerceros
     *
     * @return string 
     */
    public function getRutaDirectorioDocumentosTerceros()
    {
        return $this->rutaDirectorioDocumentosTerceros;
    }

    /**
     * Set rutaDirectorioDocumentosProductos
     *
     * @param string $rutaDirectorioDocumentosProductos
     */
    public function setRutaDirectorioDocumentosProductos($rutaDirectorioDocumentosProductos)
    {
        $this->rutaDirectorioDocumentosProductos = $rutaDirectorioDocumentosProductos;
    }

    /**
     * Get rutaDirectorioDocumentosProductos
     *
     * @return string 
     */
    public function getRutaDirectorioDocumentosProductos()
    {
        return $this->rutaDirectorioDocumentosProductos;
    }

    /**
     * Set rutaDirectorioDocumentosContables
     *
     * @param string $rutaDirectorioDocumentosContables
     */
    public function setRutaDirectorioDocumentosContables($rutaDirectorioDocumentosContables)
    {
        $this->rutaDirectorioDocumentosContables = $rutaDirectorioDocumentosContables;
    }

    /**
     * Get rutaDirectorioDocumentosContables
     *
     * @return string 
     */
    public function getRutaDirectorioDocumentosContables()
    {
        return $this->rutaDirectorioDocumentosContables;
    }

    /**
     * Set codigoConsecutivoArchivo
     *
     * @param integer $codigoConsecutivoArchivo
     */
    public function setCodigoConsecutivoArchivo($codigoConsecutivoArchivo)
    {
        $this->codigoConsecutivoArchivo = $codigoConsecutivoArchivo;
    }

    /**
     * Get codigoConsecutivoArchivo
     *
     * @return integer 
     */
    public function getCodigoConsecutivoArchivo()
    {
        return $this->codigoConsecutivoArchivo;
    }
}