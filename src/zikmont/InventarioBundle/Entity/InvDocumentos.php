<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_documentos")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvDocumentosRepository")
 */
class InvDocumentos
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_documento_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $codigoDocumentoPk;    

    /**
     * @ORM\Column(name="nombre", type="string", length=80)
     */     
    private $nombre;

    /**
     * @ORM\Column(name="abreviatura", type="string", length=10)
     */     
    private $abreviatura;    
    
    /**
     * @ORM\Column(name="codigo_documento_tipo_fk", type="integer")
     */      
    private $codigoDocumentoTipoFk;

    /**
     * @ORM\Column(name="codigo_documento_subtipo_fk", type="integer", nullable="true")
     */      
    private $codigoDocumentoSubtipoFk;    
    
    /**
     * @ORM\Column(name="codigo_comprobante_fk", type="integer")
     */      
    private $codigoComprobanteFk;    
    
    /**
     * @ORM\Column(name="codigo_comprobante_contable_fk", type="integer", nullable="true")
     */     
    private $codigoComprobanteContableFk;     
    
    /**
     * @ORM\Column(name="columna_lote", type="boolean")
     */          
    private $columnaLote;

    /**
     * @ORM\Column(name="columna_bodega", type="boolean")
     */          
    private $columnaBodega;    

    /**
     * @ORM\Column(name="operacion_inventario", type="smallint")
     */          
    private $operacionInventario;
    
    /**
     * @ORM\Column(name="operacion_comercial", type="smallint")
     * Este campo es para saber el valor de este documento que signo tiene 
     * por ejemplo las facturas son negativas para inventario porque son
     * salidas pero su operacion comercial es positiva
     */          
    private $operacionComercial;    

    /**
     * @ORM\Column(name="factura_pos", type="boolean")
     */          
    private $facturaPOS = 0;    
    
    /**
     * @ORM\Column(name="genera_cartera", type="boolean")
     */          
    private $generaCartera = 0;

    /**
     * @ORM\Column(name="tipo_asiento_cartera", type="smallint", nullable="true")
     * 1 - Debito
     * 2 - Credito
     */          
    private $tipoAsientoCartera;        
    
    /**
     * @ORM\Column(name="genera_tesoreria", type="boolean")
     */          
    private $generaTesoreria = 0;    

    /**
     * @ORM\Column(name="tipo_asiento_tesoreria", type="smallint", nullable="true")
     * 1 - Debito
     * 2 - Credito
     */          
    private $tipoAsientoTesoreria;    
    
    /**
     * @ORM\Column(name="tipo_valor", type="smallint")
     * 0 - Ninguno
     * 1 - Compra
     * 2 - Venta
     */          
    private $tipoValor = 0;     
    
    /**
     * @ORM\Column(name="consecutivo", type="integer")
     */          
    private $consecutivo = 0;      
    
    /**
     * @ORM\Column(name="tipo_cuenta_ingreso", type="smallint", nullable="true")
     * 1 - Debito
     * 2 - Credito
     */          
    private $tipoCuentaIngreso;     

    /**
     * @ORM\Column(name="tipo_cuenta_costo", type="smallint", nullable="true")
     * 1 - Debito
     * 2 - Credito
     */          
    private $tipoCuentaCosto;     
    
    /**
     * @ORM\Column(name="tipo_cuenta_iva", type="smallint", nullable="true")
     * 1 - Debito
     * 2 - Credito
     */          
    private $tipoCuentaIva;    
    
    /**
     * @ORM\Column(name="cuenta_iva", type="string", length=15, nullable="true")
     */    
    private $cuentaIva;     

    /**
     * @ORM\Column(name="tipo_cuenta_retencion_fuente", type="smallint", nullable="true")
     * 1 - Debito
     * 2 - Credito
     */          
    private $tipoCuentaRetencionFuente;    
    
    /**
     * @ORM\Column(name="cuenta_retencion_fuente", type="string", length=15, nullable="true")
     */    
    private $cuentaRetencionFuente;     

    /**
     * @ORM\Column(name="tipo_cuenta_tesoreria", type="smallint", nullable="true")
     * 1 - Debito
     * 2 - Credito
     */          
    private $tipoCuentaTesoreria;    
    
    /**
     * @ORM\Column(name="cuenta_tesoreria", type="string", length=15, nullable="true")
     */    
    private $cuentaTesoreria;     
    
    /**
     * @ORM\Column(name="tipo_cuenta_cartera", type="smallint", nullable="true")
     * 1 - Debito
     * 2 - Credito
     */          
    private $tipoCuentaCartera;    
    
    /**
     * @ORM\Column(name="cuenta_cartera", type="string", length=15, nullable="true")
     */    
    private $cuentaCartera;    

    /**
     * @ORM\Column(name="asignar_consecutivo_impresion", type="boolean")
     */          
    private $asignarConsecutivoImpresion = 0;      

    /**
     * @internal Para saber si se le puede agregar un item por documento control
     * @ORM\Column(name="agregar_item_documento_control", type="boolean")
     */          
    private $agregarItemDocumentoControl = 0;     

    /**
     * @internal especifica si exige el mismo tercero en los documentos contro
     * @ORM\Column(name="exige_tercero_documento_control", type="boolean")
     */          
    private $exigeTerceroDocumentoControl = 0;    
    
    /**
     * @internal Para saber si se le puede agregar un item libre
     * @ORM\Column(name="agregar_item", type="boolean")
     */          
    private $agregarItem = 0;    
    
    /**
     * @internal Para saber si el documento genera costo promedio
     * @ORM\Column(name="genera_costo_promedio", type="boolean")
     */          
    private $generaCostoPromedio = 0;  
    
    
    /**
     * @ORM\ManyToOne(targetEntity="InvDocumentosTipos", inversedBy="InvDocumentos")
     * @ORM\JoinColumn(name="codigo_documento_tipo_fk", referencedColumnName="codigo_documento_tipo_pk")
     */
    protected $documentoTipoRel;           

    /**
     * @ORM\ManyToOne(targetEntity="InvDocumentosSubtipos", inversedBy="InvDocumentos")
     * @ORM\JoinColumn(name="codigo_documento_subtipo_fk", referencedColumnName="codigo_documento_subtipo_pk")
     */
    protected $documentoSubtipoRel;     
    
    /**
     * @ORM\ManyToOne(targetEntity="zikmont\ContabilidadBundle\Entity\CtbComprobantesContables", inversedBy="InvDocumentos")
     * @ORM\JoinColumn(name="codigo_comprobante_contable_fk", referencedColumnName="codigo_comprobante_contable_pk")
     */
    protected $comprobanteContableRel;                  




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
     * Set abreviatura
     *
     * @param string $abreviatura
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    }

    /**
     * Get abreviatura
     *
     * @return string 
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
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
     * Set codigoDocumentoSubtipoFk
     *
     * @param integer $codigoDocumentoSubtipoFk
     */
    public function setCodigoDocumentoSubtipoFk($codigoDocumentoSubtipoFk)
    {
        $this->codigoDocumentoSubtipoFk = $codigoDocumentoSubtipoFk;
    }

    /**
     * Get codigoDocumentoSubtipoFk
     *
     * @return integer 
     */
    public function getCodigoDocumentoSubtipoFk()
    {
        return $this->codigoDocumentoSubtipoFk;
    }

    /**
     * Set codigoComprobanteFk
     *
     * @param integer $codigoComprobanteFk
     */
    public function setCodigoComprobanteFk($codigoComprobanteFk)
    {
        $this->codigoComprobanteFk = $codigoComprobanteFk;
    }

    /**
     * Get codigoComprobanteFk
     *
     * @return integer 
     */
    public function getCodigoComprobanteFk()
    {
        return $this->codigoComprobanteFk;
    }

    /**
     * Set codigoComprobanteContableFk
     *
     * @param integer $codigoComprobanteContableFk
     */
    public function setCodigoComprobanteContableFk($codigoComprobanteContableFk)
    {
        $this->codigoComprobanteContableFk = $codigoComprobanteContableFk;
    }

    /**
     * Get codigoComprobanteContableFk
     *
     * @return integer 
     */
    public function getCodigoComprobanteContableFk()
    {
        return $this->codigoComprobanteContableFk;
    }

    /**
     * Set columnaLote
     *
     * @param boolean $columnaLote
     */
    public function setColumnaLote($columnaLote)
    {
        $this->columnaLote = $columnaLote;
    }

    /**
     * Get columnaLote
     *
     * @return boolean 
     */
    public function getColumnaLote()
    {
        return $this->columnaLote;
    }

    /**
     * Set columnaBodega
     *
     * @param boolean $columnaBodega
     */
    public function setColumnaBodega($columnaBodega)
    {
        $this->columnaBodega = $columnaBodega;
    }

    /**
     * Get columnaBodega
     *
     * @return boolean 
     */
    public function getColumnaBodega()
    {
        return $this->columnaBodega;
    }

    /**
     * Set operacionInventario
     *
     * @param smallint $operacionInventario
     */
    public function setOperacionInventario($operacionInventario)
    {
        $this->operacionInventario = $operacionInventario;
    }

    /**
     * Get operacionInventario
     *
     * @return smallint 
     */
    public function getOperacionInventario()
    {
        return $this->operacionInventario;
    }

    /**
     * Set operacionComercial
     *
     * @param smallint $operacionComercial
     */
    public function setOperacionComercial($operacionComercial)
    {
        $this->operacionComercial = $operacionComercial;
    }

    /**
     * Get operacionComercial
     *
     * @return smallint 
     */
    public function getOperacionComercial()
    {
        return $this->operacionComercial;
    }

    /**
     * Set facturaPOS
     *
     * @param boolean $facturaPOS
     */
    public function setFacturaPOS($facturaPOS)
    {
        $this->facturaPOS = $facturaPOS;
    }

    /**
     * Get facturaPOS
     *
     * @return boolean 
     */
    public function getFacturaPOS()
    {
        return $this->facturaPOS;
    }

    /**
     * Set generaCartera
     *
     * @param boolean $generaCartera
     */
    public function setGeneraCartera($generaCartera)
    {
        $this->generaCartera = $generaCartera;
    }

    /**
     * Get generaCartera
     *
     * @return boolean 
     */
    public function getGeneraCartera()
    {
        return $this->generaCartera;
    }

    /**
     * Set tipoAsientoCartera
     *
     * @param smallint $tipoAsientoCartera
     */
    public function setTipoAsientoCartera($tipoAsientoCartera)
    {
        $this->tipoAsientoCartera = $tipoAsientoCartera;
    }

    /**
     * Get tipoAsientoCartera
     *
     * @return smallint 
     */
    public function getTipoAsientoCartera()
    {
        return $this->tipoAsientoCartera;
    }

    /**
     * Set generaTesoreria
     *
     * @param boolean $generaTesoreria
     */
    public function setGeneraTesoreria($generaTesoreria)
    {
        $this->generaTesoreria = $generaTesoreria;
    }

    /**
     * Get generaTesoreria
     *
     * @return boolean 
     */
    public function getGeneraTesoreria()
    {
        return $this->generaTesoreria;
    }

    /**
     * Set tipoAsientoTesoreria
     *
     * @param smallint $tipoAsientoTesoreria
     */
    public function setTipoAsientoTesoreria($tipoAsientoTesoreria)
    {
        $this->tipoAsientoTesoreria = $tipoAsientoTesoreria;
    }

    /**
     * Get tipoAsientoTesoreria
     *
     * @return smallint 
     */
    public function getTipoAsientoTesoreria()
    {
        return $this->tipoAsientoTesoreria;
    }

    /**
     * Set tipoValor
     *
     * @param smallint $tipoValor
     */
    public function setTipoValor($tipoValor)
    {
        $this->tipoValor = $tipoValor;
    }

    /**
     * Get tipoValor
     *
     * @return smallint 
     */
    public function getTipoValor()
    {
        return $this->tipoValor;
    }

    /**
     * Set consecutivo
     *
     * @param integer $consecutivo
     */
    public function setConsecutivo($consecutivo)
    {
        $this->consecutivo = $consecutivo;
    }

    /**
     * Get consecutivo
     *
     * @return integer 
     */
    public function getConsecutivo()
    {
        return $this->consecutivo;
    }

    /**
     * Set tipoCuentaIngreso
     *
     * @param smallint $tipoCuentaIngreso
     */
    public function setTipoCuentaIngreso($tipoCuentaIngreso)
    {
        $this->tipoCuentaIngreso = $tipoCuentaIngreso;
    }

    /**
     * Get tipoCuentaIngreso
     *
     * @return smallint 
     */
    public function getTipoCuentaIngreso()
    {
        return $this->tipoCuentaIngreso;
    }

    /**
     * Set tipoCuentaCosto
     *
     * @param smallint $tipoCuentaCosto
     */
    public function setTipoCuentaCosto($tipoCuentaCosto)
    {
        $this->tipoCuentaCosto = $tipoCuentaCosto;
    }

    /**
     * Get tipoCuentaCosto
     *
     * @return smallint 
     */
    public function getTipoCuentaCosto()
    {
        return $this->tipoCuentaCosto;
    }

    /**
     * Set tipoCuentaIva
     *
     * @param smallint $tipoCuentaIva
     */
    public function setTipoCuentaIva($tipoCuentaIva)
    {
        $this->tipoCuentaIva = $tipoCuentaIva;
    }

    /**
     * Get tipoCuentaIva
     *
     * @return smallint 
     */
    public function getTipoCuentaIva()
    {
        return $this->tipoCuentaIva;
    }

    /**
     * Set cuentaIva
     *
     * @param string $cuentaIva
     */
    public function setCuentaIva($cuentaIva)
    {
        $this->cuentaIva = $cuentaIva;
    }

    /**
     * Get cuentaIva
     *
     * @return string 
     */
    public function getCuentaIva()
    {
        return $this->cuentaIva;
    }

    /**
     * Set tipoCuentaRetencionFuente
     *
     * @param smallint $tipoCuentaRetencionFuente
     */
    public function setTipoCuentaRetencionFuente($tipoCuentaRetencionFuente)
    {
        $this->tipoCuentaRetencionFuente = $tipoCuentaRetencionFuente;
    }

    /**
     * Get tipoCuentaRetencionFuente
     *
     * @return smallint 
     */
    public function getTipoCuentaRetencionFuente()
    {
        return $this->tipoCuentaRetencionFuente;
    }

    /**
     * Set cuentaRetencionFuente
     *
     * @param string $cuentaRetencionFuente
     */
    public function setCuentaRetencionFuente($cuentaRetencionFuente)
    {
        $this->cuentaRetencionFuente = $cuentaRetencionFuente;
    }

    /**
     * Get cuentaRetencionFuente
     *
     * @return string 
     */
    public function getCuentaRetencionFuente()
    {
        return $this->cuentaRetencionFuente;
    }

    /**
     * Set tipoCuentaTesoreria
     *
     * @param smallint $tipoCuentaTesoreria
     */
    public function setTipoCuentaTesoreria($tipoCuentaTesoreria)
    {
        $this->tipoCuentaTesoreria = $tipoCuentaTesoreria;
    }

    /**
     * Get tipoCuentaTesoreria
     *
     * @return smallint 
     */
    public function getTipoCuentaTesoreria()
    {
        return $this->tipoCuentaTesoreria;
    }

    /**
     * Set cuentaTesoreria
     *
     * @param string $cuentaTesoreria
     */
    public function setCuentaTesoreria($cuentaTesoreria)
    {
        $this->cuentaTesoreria = $cuentaTesoreria;
    }

    /**
     * Get cuentaTesoreria
     *
     * @return string 
     */
    public function getCuentaTesoreria()
    {
        return $this->cuentaTesoreria;
    }

    /**
     * Set tipoCuentaCartera
     *
     * @param smallint $tipoCuentaCartera
     */
    public function setTipoCuentaCartera($tipoCuentaCartera)
    {
        $this->tipoCuentaCartera = $tipoCuentaCartera;
    }

    /**
     * Get tipoCuentaCartera
     *
     * @return smallint 
     */
    public function getTipoCuentaCartera()
    {
        return $this->tipoCuentaCartera;
    }

    /**
     * Set cuentaCartera
     *
     * @param string $cuentaCartera
     */
    public function setCuentaCartera($cuentaCartera)
    {
        $this->cuentaCartera = $cuentaCartera;
    }

    /**
     * Get cuentaCartera
     *
     * @return string 
     */
    public function getCuentaCartera()
    {
        return $this->cuentaCartera;
    }

    /**
     * Set asignarConsecutivoImpresion
     *
     * @param boolean $asignarConsecutivoImpresion
     */
    public function setAsignarConsecutivoImpresion($asignarConsecutivoImpresion)
    {
        $this->asignarConsecutivoImpresion = $asignarConsecutivoImpresion;
    }

    /**
     * Get asignarConsecutivoImpresion
     *
     * @return boolean 
     */
    public function getAsignarConsecutivoImpresion()
    {
        return $this->asignarConsecutivoImpresion;
    }

    /**
     * Set agregarItemDocumentoControl
     *
     * @param boolean $agregarItemDocumentoControl
     */
    public function setAgregarItemDocumentoControl($agregarItemDocumentoControl)
    {
        $this->agregarItemDocumentoControl = $agregarItemDocumentoControl;
    }

    /**
     * Get agregarItemDocumentoControl
     *
     * @return boolean 
     */
    public function getAgregarItemDocumentoControl()
    {
        return $this->agregarItemDocumentoControl;
    }

    /**
     * Set exigeTerceroDocumentoControl
     *
     * @param boolean $exigeTerceroDocumentoControl
     */
    public function setExigeTerceroDocumentoControl($exigeTerceroDocumentoControl)
    {
        $this->exigeTerceroDocumentoControl = $exigeTerceroDocumentoControl;
    }

    /**
     * Get exigeTerceroDocumentoControl
     *
     * @return boolean 
     */
    public function getExigeTerceroDocumentoControl()
    {
        return $this->exigeTerceroDocumentoControl;
    }

    /**
     * Set agregarItem
     *
     * @param boolean $agregarItem
     */
    public function setAgregarItem($agregarItem)
    {
        $this->agregarItem = $agregarItem;
    }

    /**
     * Get agregarItem
     *
     * @return boolean 
     */
    public function getAgregarItem()
    {
        return $this->agregarItem;
    }

    /**
     * Set generaCostoPromedio
     *
     * @param boolean $generaCostoPromedio
     */
    public function setGeneraCostoPromedio($generaCostoPromedio)
    {
        $this->generaCostoPromedio = $generaCostoPromedio;
    }

    /**
     * Get generaCostoPromedio
     *
     * @return boolean 
     */
    public function getGeneraCostoPromedio()
    {
        return $this->generaCostoPromedio;
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
     * Set documentoSubtipoRel
     *
     * @param zikmont\InventarioBundle\Entity\InvDocumentosSubtipos $documentoSubtipoRel
     */
    public function setDocumentoSubtipoRel(\zikmont\InventarioBundle\Entity\InvDocumentosSubtipos $documentoSubtipoRel)
    {
        $this->documentoSubtipoRel = $documentoSubtipoRel;
    }

    /**
     * Get documentoSubtipoRel
     *
     * @return zikmont\InventarioBundle\Entity\InvDocumentosSubtipos 
     */
    public function getDocumentoSubtipoRel()
    {
        return $this->documentoSubtipoRel;
    }

    /**
     * Set comprobanteContableRel
     *
     * @param zikmont\ContabilidadBundle\Entity\CtbComprobantesContables $comprobanteContableRel
     */
    public function setComprobanteContableRel(\zikmont\ContabilidadBundle\Entity\CtbComprobantesContables $comprobanteContableRel)
    {
        $this->comprobanteContableRel = $comprobanteContableRel;
    }

    /**
     * Get comprobanteContableRel
     *
     * @return zikmont\ContabilidadBundle\Entity\CtbComprobantesContables 
     */
    public function getComprobanteContableRel()
    {
        return $this->comprobanteContableRel;
    }
}