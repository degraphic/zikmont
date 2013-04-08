<?php

namespace zikmont\TransporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="tpt_guias")
 * @ORM\Entity(repositoryClass="zikmont\TransporteBundle\Repository\TptGuiasRepository")
 */
class TptGuias
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_guia_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoGuiaPk;

    /**
     * @ORM\Column(name="fecha", type="datetime", nullable="true")
     */    
    private $fecha;  
    
    /**
     * @ORM\Column(name="codigo_tercero_fk", type="integer", nullable="true")
     */    
    private $codigoTerceroFk;    
    
    /**
     * @ORM\Column(name="codigo_despacho_fk", type="integer", nullable="true")
     */    
    private $codigoDespachoFk;       

    /**
     * @ORM\Column(name="codigo_usuario_fk", type="string", length=20, nullable="true")
     */    
    private $codigoUsuarioFk; 

    /**
     * @ORM\Column(name="documento_cliente", type="string", length=60, nullable="true")
     */    
    private $documentoCliente;     
    
    /**
     * @ORM\Column(name="unidades", type="integer")
     */
    private $unidades = 0;

    /**
     * @ORM\Column(name="kilos_reales", type="integer")
     */
    private $kilosReales = 0;    

    /**
     * @ORM\Column(name="kilos_volumen", type="integer")
     */
    private $kilosVolumen = 0;
    
    /**
     * @ORM\Column(name="kilos_facturados", type="integer")
     */
    private $kilosFacturados = 0;        

    /**
     * @ORM\Column(name="valor_declarado", type="float")
     */
    private $valorDeclarado = 0;    

    /**
     * @ORM\Column(name="valor_flete", type="float")
     */
    private $valorFlete = 0;        

    /**
     * @ORM\Column(name="valor_manejo", type="float")
     */
    private $valorManejo = 0;    
    
    /**
     * @ORM\Column(name="valor_cobro_terceros", type="float")
     */
    private $valorCobroTerceros = 0;    
    
    /**
     * @ORM\Column(name="estado_impreso", type="boolean")
     */    
    private $estadoImpreso = 0;     
    
    /**
     * @ORM\Column(name="estado_despachada", type="boolean")
     */    
    private $estadoDespachada = 0;    
    
    /**
     * @ORM\Column(name="estado_entregada", type="boolean")
     */    
    private $estadoEntregada = 0;     
    
    /**
     * @ORM\Column(name="estado_Descargada", type="boolean")
     */    
    private $estadoDescargada = 0;     
    
    /**
     * @ORM\Column(name="estado_facturada", type="boolean")
     */    
    private $estadoFacturada = 0;     
    
    /**
     * @ORM\Column(name="estado_anulada", type="boolean")
     */    
    private $estadoAnulada = 0;     
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=200, nullable="true")
     */    
    private $comentarios;              

    /**
     * @ORM\ManyToOne(targetEntity="TptDespachos", inversedBy="TptGuias")
     * @ORM\JoinColumn(name="codigo_despacho_fk", referencedColumnName="codigo_despacho_pk")
     */
    protected $despachoRel;




    /**
     * Get codigoGuiaPk
     *
     * @return integer 
     */
    public function getCodigoGuiaPk()
    {
        return $this->codigoGuiaPk;
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
     * Set codigoDespachoFk
     *
     * @param integer $codigoDespachoFk
     */
    public function setCodigoDespachoFk($codigoDespachoFk)
    {
        $this->codigoDespachoFk = $codigoDespachoFk;
    }

    /**
     * Get codigoDespachoFk
     *
     * @return integer 
     */
    public function getCodigoDespachoFk()
    {
        return $this->codigoDespachoFk;
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
     * Set documentoCliente
     *
     * @param string $documentoCliente
     */
    public function setDocumentoCliente($documentoCliente)
    {
        $this->documentoCliente = $documentoCliente;
    }

    /**
     * Get documentoCliente
     *
     * @return string 
     */
    public function getDocumentoCliente()
    {
        return $this->documentoCliente;
    }

    /**
     * Set unidades
     *
     * @param integer $unidades
     */
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;
    }

    /**
     * Get unidades
     *
     * @return integer 
     */
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * Set kilosReales
     *
     * @param integer $kilosReales
     */
    public function setKilosReales($kilosReales)
    {
        $this->kilosReales = $kilosReales;
    }

    /**
     * Get kilosReales
     *
     * @return integer 
     */
    public function getKilosReales()
    {
        return $this->kilosReales;
    }

    /**
     * Set kilosVolumen
     *
     * @param integer $kilosVolumen
     */
    public function setKilosVolumen($kilosVolumen)
    {
        $this->kilosVolumen = $kilosVolumen;
    }

    /**
     * Get kilosVolumen
     *
     * @return integer 
     */
    public function getKilosVolumen()
    {
        return $this->kilosVolumen;
    }

    /**
     * Set kilosFacturados
     *
     * @param integer $kilosFacturados
     */
    public function setKilosFacturados($kilosFacturados)
    {
        $this->kilosFacturados = $kilosFacturados;
    }

    /**
     * Get kilosFacturados
     *
     * @return integer 
     */
    public function getKilosFacturados()
    {
        return $this->kilosFacturados;
    }

    /**
     * Set valorDeclarado
     *
     * @param float $valorDeclarado
     */
    public function setValorDeclarado($valorDeclarado)
    {
        $this->valorDeclarado = $valorDeclarado;
    }

    /**
     * Get valorDeclarado
     *
     * @return float 
     */
    public function getValorDeclarado()
    {
        return $this->valorDeclarado;
    }

    /**
     * Set valorFlete
     *
     * @param float $valorFlete
     */
    public function setValorFlete($valorFlete)
    {
        $this->valorFlete = $valorFlete;
    }

    /**
     * Get valorFlete
     *
     * @return float 
     */
    public function getValorFlete()
    {
        return $this->valorFlete;
    }

    /**
     * Set valorManejo
     *
     * @param float $valorManejo
     */
    public function setValorManejo($valorManejo)
    {
        $this->valorManejo = $valorManejo;
    }

    /**
     * Get valorManejo
     *
     * @return float 
     */
    public function getValorManejo()
    {
        return $this->valorManejo;
    }

    /**
     * Set valorCobroTerceros
     *
     * @param float $valorCobroTerceros
     */
    public function setValorCobroTerceros($valorCobroTerceros)
    {
        $this->valorCobroTerceros = $valorCobroTerceros;
    }

    /**
     * Get valorCobroTerceros
     *
     * @return float 
     */
    public function getValorCobroTerceros()
    {
        return $this->valorCobroTerceros;
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
     * Set estadoDespachada
     *
     * @param boolean $estadoDespachada
     */
    public function setEstadoDespachada($estadoDespachada)
    {
        $this->estadoDespachada = $estadoDespachada;
    }

    /**
     * Get estadoDespachada
     *
     * @return boolean 
     */
    public function getEstadoDespachada()
    {
        return $this->estadoDespachada;
    }

    /**
     * Set estadoEntregada
     *
     * @param boolean $estadoEntregada
     */
    public function setEstadoEntregada($estadoEntregada)
    {
        $this->estadoEntregada = $estadoEntregada;
    }

    /**
     * Get estadoEntregada
     *
     * @return boolean 
     */
    public function getEstadoEntregada()
    {
        return $this->estadoEntregada;
    }

    /**
     * Set estadoDescargada
     *
     * @param boolean $estadoDescargada
     */
    public function setEstadoDescargada($estadoDescargada)
    {
        $this->estadoDescargada = $estadoDescargada;
    }

    /**
     * Get estadoDescargada
     *
     * @return boolean 
     */
    public function getEstadoDescargada()
    {
        return $this->estadoDescargada;
    }

    /**
     * Set estadoFacturada
     *
     * @param boolean $estadoFacturada
     */
    public function setEstadoFacturada($estadoFacturada)
    {
        $this->estadoFacturada = $estadoFacturada;
    }

    /**
     * Get estadoFacturada
     *
     * @return boolean 
     */
    public function getEstadoFacturada()
    {
        return $this->estadoFacturada;
    }

    /**
     * Set estadoAnulada
     *
     * @param boolean $estadoAnulada
     */
    public function setEstadoAnulada($estadoAnulada)
    {
        $this->estadoAnulada = $estadoAnulada;
    }

    /**
     * Get estadoAnulada
     *
     * @return boolean 
     */
    public function getEstadoAnulada()
    {
        return $this->estadoAnulada;
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
     * Set despachoRel
     *
     * @param zikmont\TransporteBundle\Entity\Despachos $despachoRel
     */
    public function setDespachoRel(\zikmont\TransporteBundle\Entity\Despachos $despachoRel)
    {
        $this->despachoRel = $despachoRel;
    }

    /**
     * Get despachoRel
     *
     * @return zikmont\TransporteBundle\Entity\Despachos 
     */
    public function getDespachoRel()
    {
        return $this->despachoRel;
    }
}