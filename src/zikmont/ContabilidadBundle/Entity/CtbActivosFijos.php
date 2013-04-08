<?php

namespace zikmont\ContabilidadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="ctb_activos_fijos")
 * @ORM\Entity(repositoryClass="zikmont\ContabilidadBundle\Repository\CtbActivosFijosRepository")
 */
class CtbActivosFijos
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_activo_fijo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoActivoFijoPk;
    
    /**
     * @ORM\Column(name="codigo_activo_fijo_tipo_fk", type="integer", nullable="true")
     */     
    private $codigoActivoFijoTipoFk;     
    
    /**
     * @ORM\Column(name="nombre", type="string", length=100, nullable="true")
     */    
    private $nombre;

    /**
     * @ORM\Column(name="ubicacion", type="string", length=60, nullable="true")
     */    
    private $ubicacion;     
    
    /**
     * @ORM\Column(name="fecha_compra", type="date", nullable="true")
     */    
    private $fechaCompra;
    
    /**
     * @ORM\Column(name="costo", type="float")
     */
    private $costo = 0;     
    
    /**
     * @ORM\Column(name="codigo_tercero_compra_fk", type="integer", nullable="true")
     */    
    private $codigoTerceroCompraFk;    
    
    /**
     * @ORM\Column(name="documento_compra", type="string", length=40, nullable="true")
     */    
    private $documentoCompra;      
    
    /**
     * @ORM\Column(name="vida_util", type="integer")
     */    
    private $vidaUtil = 0;    

    /**
     * @ORM\Column(name="vida_util_transcurrida", type="integer")
     */    
    private $vidaUtilTranscurrida = 0;    
    
    /**
     * @ORM\Column(name="tasa_depreciacion", type="integer")
     */    
    private $tasaDepreciacion = 0;    
    
    /**
     * @ORM\Column(name="fecha_venta", type="date", nullable="true")
     */    
    private $fechaVenta;    
    
    /**
     * @ORM\Column(name="valorSalvamento", type="float")
     */
    private $valorSalvamento = 0;    
    
    /**
     * @ORM\Column(name="precio_venta", type="float")
     */
    private $precioVenta = 0;    
    
    /**
     * @ORM\Column(name="marca", type="string", length=80, nullable="true")
     */    
    private $marca;     

    /**
     * @ORM\Column(name="modelo", type="string", length=80, nullable="true")
     */    
    private $modelo;    
    
    /**
     * @ORM\Column(name="serie", type="string", length=80, nullable="true")
     */    
    private $serie; 
    
    /**
     * @ORM\Column(name="placa_activo_fijo", type="string", length=80, nullable="true")
     */    
    private $placaActivoFijo;
    
    /**
     * @ORM\Column(name="numeroPoliza", type="string", length=80, nullable="true")
     */    
    private $numeroPoliza;    
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable="true")
     */    
    private $comentarios; 
    
    /**
     * @ORM\Column(name="estado_depreciable", type="boolean")
     */    
    private $estadoDepreciable = 0; 
    
    /**
     * @ORM\Column(name="estado_improductivo", type="boolean")
     */    
    private $estadoImproductivo = 0; 
    
    /**
     * @ORM\Column(name="estado_en_transito", type="boolean")
     */    
    private $estadoEnTransito = 0; 
    
    /**
     * @ORM\Column(name="estado_vendido", type="boolean")
     */    
    private $estadoVendido = 0; 
    
    /**
     * @ORM\Column(name="estado_depreciado", type="boolean")
     */    
    private $estadoDepreciado = 0; 
    
    /**
     * @ORM\Column(name="estado_consumido", type="boolean")
     */    
    private $estadoConsumido = 0; 
    
    /**
     * @ORM\Column(name="estado_no_depreciable", type="boolean")
     */    
    private $estadoNoDepreciable = 0;         
    
    /**
     * @ORM\ManyToOne(targetEntity="CtbActivosFijosTipos", inversedBy="CtbActivosFijos")
     * @ORM\JoinColumn(name="codigo_activo_fijo_tipo_fk", referencedColumnName="codigo_activo_fijo_tipo_pk")
     */
    protected $ctbActivoFijoTipoRel;     
    


    /**
     * Get codigoActivoFijoPk
     *
     * @return integer 
     */
    public function getCodigoActivoFijoPk()
    {
        return $this->codigoActivoFijoPk;
    }

    /**
     * Set codigoActivoFijoTipoFk
     *
     * @param integer $codigoActivoFijoTipoFk
     */
    public function setCodigoActivoFijoTipoFk($codigoActivoFijoTipoFk)
    {
        $this->codigoActivoFijoTipoFk = $codigoActivoFijoTipoFk;
    }

    /**
     * Get codigoActivoFijoTipoFk
     *
     * @return integer 
     */
    public function getCodigoActivoFijoTipoFk()
    {
        return $this->codigoActivoFijoTipoFk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

    /**
     * Get ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set fechaCompra
     *
     * @param date $fechaCompra
     */
    public function setFechaCompra($fechaCompra)
    {
        $this->fechaCompra = $fechaCompra;
    }

    /**
     * Get fechaCompra
     *
     * @return date 
     */
    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }

    /**
     * Set costo
     *
     * @param float $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * Get costo
     *
     * @return float 
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set codigoTerceroCompraFk
     *
     * @param integer $codigoTerceroCompraFk
     */
    public function setCodigoTerceroCompraFk($codigoTerceroCompraFk)
    {
        $this->codigoTerceroCompraFk = $codigoTerceroCompraFk;
    }

    /**
     * Get codigoTerceroCompraFk
     *
     * @return integer 
     */
    public function getCodigoTerceroCompraFk()
    {
        return $this->codigoTerceroCompraFk;
    }

    /**
     * Set documentoCompra
     *
     * @param string $documentoCompra
     */
    public function setDocumentoCompra($documentoCompra)
    {
        $this->documentoCompra = $documentoCompra;
    }

    /**
     * Get documentoCompra
     *
     * @return string 
     */
    public function getDocumentoCompra()
    {
        return $this->documentoCompra;
    }

    /**
     * Set vidaUtil
     *
     * @param integer $vidaUtil
     */
    public function setVidaUtil($vidaUtil)
    {
        $this->vidaUtil = $vidaUtil;
    }

    /**
     * Get vidaUtil
     *
     * @return integer 
     */
    public function getVidaUtil()
    {
        return $this->vidaUtil;
    }

    /**
     * Set vidaUtilTranscurrida
     *
     * @param integer $vidaUtilTranscurrida
     */
    public function setVidaUtilTranscurrida($vidaUtilTranscurrida)
    {
        $this->vidaUtilTranscurrida = $vidaUtilTranscurrida;
    }

    /**
     * Get vidaUtilTranscurrida
     *
     * @return integer 
     */
    public function getVidaUtilTranscurrida()
    {
        return $this->vidaUtilTranscurrida;
    }

    /**
     * Set tasaDepreciacion
     *
     * @param integer $tasaDepreciacion
     */
    public function setTasaDepreciacion($tasaDepreciacion)
    {
        $this->tasaDepreciacion = $tasaDepreciacion;
    }

    /**
     * Get tasaDepreciacion
     *
     * @return integer 
     */
    public function getTasaDepreciacion()
    {
        return $this->tasaDepreciacion;
    }

    /**
     * Set fechaVenta
     *
     * @param date $fechaVenta
     */
    public function setFechaVenta($fechaVenta)
    {
        $this->fechaVenta = $fechaVenta;
    }

    /**
     * Get fechaVenta
     *
     * @return date 
     */
    public function getFechaVenta()
    {
        return $this->fechaVenta;
    }

    /**
     * Set valorSalvamento
     *
     * @param float $valorSalvamento
     */
    public function setValorSalvamento($valorSalvamento)
    {
        $this->valorSalvamento = $valorSalvamento;
    }

    /**
     * Get valorSalvamento
     *
     * @return float 
     */
    public function getValorSalvamento()
    {
        return $this->valorSalvamento;
    }

    /**
     * Set precioVenta
     *
     * @param float $precioVenta
     */
    public function setPrecioVenta($precioVenta)
    {
        $this->precioVenta = $precioVenta;
    }

    /**
     * Get precioVenta
     *
     * @return float 
     */
    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }

    /**
     * Set marca
     *
     * @param string $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set serie
     *
     * @param string $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * Get serie
     *
     * @return string 
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set placaActivoFijo
     *
     * @param string $placaActivoFijo
     */
    public function setPlacaActivoFijo($placaActivoFijo)
    {
        $this->placaActivoFijo = $placaActivoFijo;
    }

    /**
     * Get placaActivoFijo
     *
     * @return string 
     */
    public function getPlacaActivoFijo()
    {
        return $this->placaActivoFijo;
    }

    /**
     * Set numeroPoliza
     *
     * @param string $numeroPoliza
     */
    public function setNumeroPoliza($numeroPoliza)
    {
        $this->numeroPoliza = $numeroPoliza;
    }

    /**
     * Get numeroPoliza
     *
     * @return string 
     */
    public function getNumeroPoliza()
    {
        return $this->numeroPoliza;
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
     * Set estadoDepreciable
     *
     * @param boolean $estadoDepreciable
     */
    public function setEstadoDepreciable($estadoDepreciable)
    {
        $this->estadoDepreciable = $estadoDepreciable;
    }

    /**
     * Get estadoDepreciable
     *
     * @return boolean 
     */
    public function getEstadoDepreciable()
    {
        return $this->estadoDepreciable;
    }

    /**
     * Set estadoImproductivo
     *
     * @param boolean $estadoImproductivo
     */
    public function setEstadoImproductivo($estadoImproductivo)
    {
        $this->estadoImproductivo = $estadoImproductivo;
    }

    /**
     * Get estadoImproductivo
     *
     * @return boolean 
     */
    public function getEstadoImproductivo()
    {
        return $this->estadoImproductivo;
    }

    /**
     * Set estadoEnTransito
     *
     * @param boolean $estadoEnTransito
     */
    public function setEstadoEnTransito($estadoEnTransito)
    {
        $this->estadoEnTransito = $estadoEnTransito;
    }

    /**
     * Get estadoEnTransito
     *
     * @return boolean 
     */
    public function getEstadoEnTransito()
    {
        return $this->estadoEnTransito;
    }

    /**
     * Set estadoVendido
     *
     * @param boolean $estadoVendido
     */
    public function setEstadoVendido($estadoVendido)
    {
        $this->estadoVendido = $estadoVendido;
    }

    /**
     * Get estadoVendido
     *
     * @return boolean 
     */
    public function getEstadoVendido()
    {
        return $this->estadoVendido;
    }

    /**
     * Set estadoDepreciado
     *
     * @param boolean $estadoDepreciado
     */
    public function setEstadoDepreciado($estadoDepreciado)
    {
        $this->estadoDepreciado = $estadoDepreciado;
    }

    /**
     * Get estadoDepreciado
     *
     * @return boolean 
     */
    public function getEstadoDepreciado()
    {
        return $this->estadoDepreciado;
    }

    /**
     * Set estadoConsumido
     *
     * @param boolean $estadoConsumido
     */
    public function setEstadoConsumido($estadoConsumido)
    {
        $this->estadoConsumido = $estadoConsumido;
    }

    /**
     * Get estadoConsumido
     *
     * @return boolean 
     */
    public function getEstadoConsumido()
    {
        return $this->estadoConsumido;
    }

    /**
     * Set estadoNoDepreciable
     *
     * @param boolean $estadoNoDepreciable
     */
    public function setEstadoNoDepreciable($estadoNoDepreciable)
    {
        $this->estadoNoDepreciable = $estadoNoDepreciable;
    }

    /**
     * Get estadoNoDepreciable
     *
     * @return boolean 
     */
    public function getEstadoNoDepreciable()
    {
        return $this->estadoNoDepreciable;
    }

    /**
     * Set terceroRel
     *
     * @param zikmont\FrontEndBundle\Entity\GenTerceros $terceroRel
     */
    public function setTerceroRel(\zikmont\FrontEndBundle\Entity\GenTerceros $terceroRel)
    {
        $this->terceroRel = $terceroRel;
    }

    /**
     * Get terceroRel
     *
     * @return zikmont\FrontEndBundle\Entity\GenTerceros 
     */
    public function getTerceroRel()
    {
        return $this->terceroRel;
    }

    /**
     * Set ctbActivoFijoTipoRel
     *
     * @param zikmont\ContabilidadBundle\Entity\CtbActivosFijosTipos $ctbActivoFijoTipoRel
     */
    public function setCtbActivoFijoTipoRel(\zikmont\ContabilidadBundle\Entity\CtbActivosFijosTipos $ctbActivoFijoTipoRel)
    {
        $this->ctbActivoFijoTipoRel = $ctbActivoFijoTipoRel;
    }

    /**
     * Get ctbActivoFijoTipoRel
     *
     * @return zikmont\ContabilidadBundle\Entity\CtbActivosFijosTipos 
     */
    public function getCtbActivoFijoTipoRel()
    {
        return $this->ctbActivoFijoTipoRel;
    }
}