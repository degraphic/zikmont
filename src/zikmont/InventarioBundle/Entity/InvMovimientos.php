<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="inv_movimientos")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvMovimientosRepository")
 */
class InvMovimientos
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_movimiento_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoMovimientoPk;
    
    /**
     * @ORM\Column(name="codigo_documento_tipo_fk", type="integer", nullable="true")
     */    
    private $codigoDocumentoTipoFk;
    
    /**
     * @ORM\Column(name="codigo_documento_fk", type="integer", nullable="true")
     */    
    private $codigoDocumentoFk;             
    
    /**
     * @ORM\Column(name="numero_movimiento", type="integer", nullable="true")
     */    
    private $numeroMovimiento;
    
    /**
     * @ORM\Column(name="fecha", type="datetime", nullable="true")
     */    
    private $fecha;    
    
    /**
     * @ORM\Column(name="codigo_tercero_fk", type="integer", nullable="true")
     * @Assert\NotBlank
     */    
    private $codigoTerceroFk;

    /**
     * @ORM\Column(name="codigo_empresa_fk", type="integer", nullable="true")
     */    
    private $codigoEmpresaFk;

    /**
     * @ORM\Column(name="soporte", type="string", length=50, nullable="true")
     */    
    private $soporte;     
    
    /**
     * @ORM\Column(name="valor_total_iva", type="float", nullable="true")
     */    
    private $valorTotalIva;
    
    /**
     * @ORM\Column(name="subtotal", type="float")
     */
    private $subTotal = 0;
    
    /**
     * @ORM\Column(name="valor_total_descuento", type="float")
     */
    private $valorTotalDescuento = 0;
    
    /**
     * @ORM\Column(name="total", type="float")
     */
    private $total = 0;

    /**
     * @ORM\Column(name="valor_retencion_fuente", type="float")
     */
    private $valorRetencionFuente = 0;    

    /**
     * @ORM\Column(name="valor_retencion_iva_ventas", type="float")
     */
    private $valorRetencionIvaVentas = 0;     
    
    /**
     * @ORM\Column(name="valor_otras_retenciones", type="float")
     */
    private $valorOtrasRetenciones = 0;    
    
    /**
     * @ORM\Column(name="valor_total_costo", type="float")
     */
    private $valorTotalCosto = 0;     
    
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
     * @ORM\Column(name="estado_contabilizado", type="boolean")
     */    
    private $estadoContabilizado = 0;    
    
    /**
     * @ORM\Column(name="cierre_caja", type="boolean")
     */    
    private $cierreCaja = 0;     
    
    /**
     * @ORM\ManyToOne(targetEntity="InvDocumentos", inversedBy="InvMovimientos")
     * @ORM\JoinColumn(name="codigo_documento_fk", referencedColumnName="codigo_documento_pk")
     */
    protected $documentoRel;               

    /**
     * @ORM\ManyToOne(targetEntity="InvDocumentosTipos", inversedBy="InvMovimientos")
     * @ORM\JoinColumn(name="codigo_documento_tipo_fk", referencedColumnName="codigo_documento_tipo_pk")
     */
    protected $documentoTipoRel;      
    
    /**
     * @ORM\ManyToOne(targetEntity="zikmont\FrontEndBundle\Entity\GenTerceros", inversedBy="InvMovimientos")
     * @ORM\JoinColumn(name="codigo_tercero_fk", referencedColumnName="codigo_tercero_pk")
     */
    protected $terceroRel;    



    /**
     * Get codigoMovimientoPk
     *
     * @return integer 
     */
    public function getCodigoMovimientoPk()
    {
        return $this->codigoMovimientoPk;
    }

    /**
     * Set codigoDocumentoTipoFk
     *
     * @param integer $codigoDocumentoTipoFk
     */
    public function setCodigoDocumentoTipoFk($codigoDocumentoTipoFk)
    {
        $this->codigoDocumentoTipoFk = $codigoDocumentoTipoFk;
    }

    /**
     * Get codigoDocumentoTipoFk
     *
     * @return integer 
     */
    public function getCodigoDocumentoTipoFk()
    {
        return $this->codigoDocumentoTipoFk;
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
     * Set numeroMovimiento
     *
     * @param integer $numeroMovimiento
     */
    public function setNumeroMovimiento($numeroMovimiento)
    {
        $this->numeroMovimiento = $numeroMovimiento;
    }

    /**
     * Get numeroMovimiento
     *
     * @return integer 
     */
    public function getNumeroMovimiento()
    {
        return $this->numeroMovimiento;
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
     * Set codigoEmpresaFk
     *
     * @param integer $codigoEmpresaFk
     */
    public function setCodigoEmpresaFk($codigoEmpresaFk)
    {
        $this->codigoEmpresaFk = $codigoEmpresaFk;
    }

    /**
     * Get codigoEmpresaFk
     *
     * @return integer 
     */
    public function getCodigoEmpresaFk()
    {
        return $this->codigoEmpresaFk;
    }

    /**
     * Set soporte
     *
     * @param string $soporte
     */
    public function setSoporte($soporte)
    {
        $this->soporte = $soporte;
    }

    /**
     * Get soporte
     *
     * @return string 
     */
    public function getSoporte()
    {
        return $this->soporte;
    }

    /**
     * Set valorTotalIva
     *
     * @param float $valorTotalIva
     */
    public function setValorTotalIva($valorTotalIva)
    {
        $this->valorTotalIva = $valorTotalIva;
    }

    /**
     * Get valorTotalIva
     *
     * @return float 
     */
    public function getValorTotalIva()
    {
        return $this->valorTotalIva;
    }

    /**
     * Set subTotal
     *
     * @param float $subTotal
     */
    public function setSubTotal($subTotal)
    {
        $this->subTotal = $subTotal;
    }

    /**
     * Get subTotal
     *
     * @return float 
     */
    public function getSubTotal()
    {
        return $this->subTotal;
    }

    /**
     * Set valorTotalDescuento
     *
     * @param float $valorTotalDescuento
     */
    public function setValorTotalDescuento($valorTotalDescuento)
    {
        $this->valorTotalDescuento = $valorTotalDescuento;
    }

    /**
     * Get valorTotalDescuento
     *
     * @return float 
     */
    public function getValorTotalDescuento()
    {
        return $this->valorTotalDescuento;
    }

    /**
     * Set total
     *
     * @param float $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set valorRetencionFuente
     *
     * @param float $valorRetencionFuente
     */
    public function setValorRetencionFuente($valorRetencionFuente)
    {
        $this->valorRetencionFuente = $valorRetencionFuente;
    }

    /**
     * Get valorRetencionFuente
     *
     * @return float 
     */
    public function getValorRetencionFuente()
    {
        return $this->valorRetencionFuente;
    }

    /**
     * Set valorRetencionIvaVentas
     *
     * @param float $valorRetencionIvaVentas
     */
    public function setValorRetencionIvaVentas($valorRetencionIvaVentas)
    {
        $this->valorRetencionIvaVentas = $valorRetencionIvaVentas;
    }

    /**
     * Get valorRetencionIvaVentas
     *
     * @return float 
     */
    public function getValorRetencionIvaVentas()
    {
        return $this->valorRetencionIvaVentas;
    }

    /**
     * Set valorOtrasRetenciones
     *
     * @param float $valorOtrasRetenciones
     */
    public function setValorOtrasRetenciones($valorOtrasRetenciones)
    {
        $this->valorOtrasRetenciones = $valorOtrasRetenciones;
    }

    /**
     * Get valorOtrasRetenciones
     *
     * @return float 
     */
    public function getValorOtrasRetenciones()
    {
        return $this->valorOtrasRetenciones;
    }

    /**
     * Set valorTotalCosto
     *
     * @param float $valorTotalCosto
     */
    public function setValorTotalCosto($valorTotalCosto)
    {
        $this->valorTotalCosto = $valorTotalCosto;
    }

    /**
     * Get valorTotalCosto
     *
     * @return float 
     */
    public function getValorTotalCosto()
    {
        return $this->valorTotalCosto;
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

    /**
     * Set estadoContabilizado
     *
     * @param boolean $estadoContabilizado
     */
    public function setEstadoContabilizado($estadoContabilizado)
    {
        $this->estadoContabilizado = $estadoContabilizado;
    }

    /**
     * Get estadoContabilizado
     *
     * @return boolean 
     */
    public function getEstadoContabilizado()
    {
        return $this->estadoContabilizado;
    }

    /**
     * Set cierreCaja
     *
     * @param boolean $cierreCaja
     */
    public function setCierreCaja($cierreCaja)
    {
        $this->cierreCaja = $cierreCaja;
    }

    /**
     * Get cierreCaja
     *
     * @return boolean 
     */
    public function getCierreCaja()
    {
        return $this->cierreCaja;
    }

    /**
     * Set documentoRel
     *
     * @param zikmont\InventarioBundle\Entity\InvDocumentos $documentoRel
     */
    public function setDocumentoRel(\zikmont\InventarioBundle\Entity\InvDocumentos $documentoRel)
    {
        $this->documentoRel = $documentoRel;
    }

    /**
     * Get documentoRel
     *
     * @return zikmont\InventarioBundle\Entity\InvDocumentos 
     */
    public function getDocumentoRel()
    {
        return $this->documentoRel;
    }

    /**
     * Set documentoTipoRel
     *
     * @param zikmont\InventarioBundle\Entity\InvDocumentosTipos $documentoTipoRel
     */
    public function setDocumentoTipoRel(\zikmont\InventarioBundle\Entity\InvDocumentosTipos $documentoTipoRel)
    {
        $this->documentoTipoRel = $documentoTipoRel;
    }

    /**
     * Get documentoTipoRel
     *
     * @return zikmont\InventarioBundle\Entity\InvDocumentosTipos 
     */
    public function getDocumentoTipoRel()
    {
        return $this->documentoTipoRel;
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
}