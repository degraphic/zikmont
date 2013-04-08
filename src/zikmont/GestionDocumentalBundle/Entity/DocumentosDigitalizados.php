<?php

namespace zikmont\GestionDocumentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\GestionDocumentalBundle\Entity\DocumentosDigitalizados
 *
 * @ORM\Table(name="gdc_documentos_digitalizados")
 * @ORM\Entity(repositoryClass="zikmont\GestionDocumentalBundle\Repository\DocumentosDigitalizacionRepository")
 */
class DocumentosDigitalizados {

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_carga_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCargaPk;

    /**
     * @ORM\Column(name="nombre_usuario", type="string", length=20, nullable=true)
     */
    private $nombreUsuario;

    /**
     * @ORM\Column(name="fecha_digitalizacion", type="date", nullable=false)
     */
    private $fechaDigitalizacion;

    /**
     * @ORM\Column(name="codigo_documento_fk", type="integer",  nullable=false)
     */
    private $codigoDocumentoFk;

    /**
     * @ORM\Column(name="codigo_archivo", type="integer", nullable=true)
     */
    private $codigoArchivo;

    /**
     * @ORM\Column(name="codigo_directorio", type="integer", nullable=true)
     */
    private $codigoDirectorio;

    /**
     * @ORM\Column(name="numero_documento", type="integer",  nullable=true)
     */
    private $numeroDocumento;

    /**
     * @ORM\Column(name="fecha_documento", type="date", nullable=true)
     */
    private $fechaDocumento;

    /**
     * @ORM\Column(name="numero_radicado", type="integer",  nullable=true)
     */
    private $numeroRadicado;

    /**
     * @ORM\Column(name="documento_recibido", type="boolean", nullable=true)
     */
    private $documentoRecibido = 0;

    /**
     * @ORM\Column(name="documento_enviado", type="boolean", nullable=true)
     */
    private $documentoEnviado = 0;

    /**
     * @ORM\Column(name="documento_interno", type="boolean", nullable=true)
     */
    private $documentoInterno = 0;

    /**
     * @ORM\Column(name="remitente_documento", type="string", length=300, nullable=true)
     */
    private $remitenteDocumento;

    /**
     * @ORM\Column(name="destinatario_documento", type="string", length=300, nullable=true)
     */
    private $destinatarioDocumento;

    /**
     * @ORM\Column(name="nombre_contacto", type="string", length=300, nullable=true)
     */
    private $nombreContacto;

    /**
     * @ORM\Column(name="cargo_contacto", type="string", length=300, nullable=true)
     */
    private $cargoContacto;

    /**
     * @ORM\Column(name="codigo_tipo_archivo_fk", type="integer",  nullable=false)
     */
    private $codigoTipoArchivoFk;

    /**
     * @ORM\Column(name="codigo_disposicion_final_fk", type="integer",  nullable=false)
     */
    private $codigoDisposicionFinalFk;

    /**
     * @ORM\Column(name="codigo_unidad_documental_fk", type="integer",  nullable=false)
     */
    private $codigoUnidadDocumentalFk;

    /**
     * @ORM\Column(name="comentarios", type="string", length=400, nullable=true)
     */
    private $comentarios;


    /**
     * Get codigoCargaPk
     *
     * @return integer 
     */
    public function getCodigoCargaPk()
    {
        return $this->codigoCargaPk;
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
     * Set fechaDigitalizacion
     *
     * @param date $fechaDigitalizacion
     */
    public function setFechaDigitalizacion($fechaDigitalizacion)
    {
        $this->fechaDigitalizacion = $fechaDigitalizacion;
    }

    /**
     * Get fechaDigitalizacion
     *
     * @return date 
     */
    public function getFechaDigitalizacion()
    {
        return $this->fechaDigitalizacion;
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
     * Set numeroDocumento
     *
     * @param integer $numeroDocumento
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }

    /**
     * Get numeroDocumento
     *
     * @return integer 
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * Set fechaDocumento
     *
     * @param date $fechaDocumento
     */
    public function setFechaDocumento($fechaDocumento)
    {
        $this->fechaDocumento = $fechaDocumento;
    }

    /**
     * Get fechaDocumento
     *
     * @return date 
     */
    public function getFechaDocumento()
    {
        return $this->fechaDocumento;
    }

    /**
     * Set numeroRadicado
     *
     * @param integer $numeroRadicado
     */
    public function setNumeroRadicado($numeroRadicado)
    {
        $this->numeroRadicado = $numeroRadicado;
    }

    /**
     * Get numeroRadicado
     *
     * @return integer 
     */
    public function getNumeroRadicado()
    {
        return $this->numeroRadicado;
    }

    /**
     * Set documentoRecibido
     *
     * @param boolean $documentoRecibido
     */
    public function setDocumentoRecibido($documentoRecibido)
    {
        $this->documentoRecibido = $documentoRecibido;
    }

    /**
     * Get documentoRecibido
     *
     * @return boolean 
     */
    public function getDocumentoRecibido()
    {
        return $this->documentoRecibido;
    }

    /**
     * Set documentoEnviado
     *
     * @param boolean $documentoEnviado
     */
    public function setDocumentoEnviado($documentoEnviado)
    {
        $this->documentoEnviado = $documentoEnviado;
    }

    /**
     * Get documentoEnviado
     *
     * @return boolean 
     */
    public function getDocumentoEnviado()
    {
        return $this->documentoEnviado;
    }

    /**
     * Set documentoInterno
     *
     * @param boolean $documentoInterno
     */
    public function setDocumentoInterno($documentoInterno)
    {
        $this->documentoInterno = $documentoInterno;
    }

    /**
     * Get documentoInterno
     *
     * @return boolean 
     */
    public function getDocumentoInterno()
    {
        return $this->documentoInterno;
    }

    /**
     * Set remitenteDocumento
     *
     * @param string $remitenteDocumento
     */
    public function setRemitenteDocumento($remitenteDocumento)
    {
        $this->remitenteDocumento = $remitenteDocumento;
    }

    /**
     * Get remitenteDocumento
     *
     * @return string 
     */
    public function getRemitenteDocumento()
    {
        return $this->remitenteDocumento;
    }

    /**
     * Set destinatarioDocumento
     *
     * @param string $destinatarioDocumento
     */
    public function setDestinatarioDocumento($destinatarioDocumento)
    {
        $this->destinatarioDocumento = $destinatarioDocumento;
    }

    /**
     * Get destinatarioDocumento
     *
     * @return string 
     */
    public function getDestinatarioDocumento()
    {
        return $this->destinatarioDocumento;
    }

    /**
     * Set nombreContacto
     *
     * @param string $nombreContacto
     */
    public function setNombreContacto($nombreContacto)
    {
        $this->nombreContacto = $nombreContacto;
    }

    /**
     * Get nombreContacto
     *
     * @return string 
     */
    public function getNombreContacto()
    {
        return $this->nombreContacto;
    }

    /**
     * Set cargoContacto
     *
     * @param string $cargoContacto
     */
    public function setCargoContacto($cargoContacto)
    {
        $this->cargoContacto = $cargoContacto;
    }

    /**
     * Get cargoContacto
     *
     * @return string 
     */
    public function getCargoContacto()
    {
        return $this->cargoContacto;
    }

    /**
     * Set codigoTipoArchivoFk
     *
     * @param integer $codigoTipoArchivoFk
     */
    public function setCodigoTipoArchivoFk($codigoTipoArchivoFk)
    {
        $this->codigoTipoArchivoFk = $codigoTipoArchivoFk;
    }

    /**
     * Get codigoTipoArchivoFk
     *
     * @return integer 
     */
    public function getCodigoTipoArchivoFk()
    {
        return $this->codigoTipoArchivoFk;
    }

    /**
     * Set codigoDisposicionFinalFk
     *
     * @param integer $codigoDisposicionFinalFk
     */
    public function setCodigoDisposicionFinalFk($codigoDisposicionFinalFk)
    {
        $this->codigoDisposicionFinalFk = $codigoDisposicionFinalFk;
    }

    /**
     * Get codigoDisposicionFinalFk
     *
     * @return integer 
     */
    public function getCodigoDisposicionFinalFk()
    {
        return $this->codigoDisposicionFinalFk;
    }

    /**
     * Set codigoUnidadDocumentalFk
     *
     * @param integer $codigoUnidadDocumentalFk
     */
    public function setCodigoUnidadDocumentalFk($codigoUnidadDocumentalFk)
    {
        $this->codigoUnidadDocumentalFk = $codigoUnidadDocumentalFk;
    }

    /**
     * Get codigoUnidadDocumentalFk
     *
     * @return integer 
     */
    public function getCodigoUnidadDocumentalFk()
    {
        return $this->codigoUnidadDocumentalFk;
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