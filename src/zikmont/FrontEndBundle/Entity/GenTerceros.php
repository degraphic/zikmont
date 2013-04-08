<?php

namespace zikmont\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="gen_terceros")
 * @ORM\Entity(repositoryClass="zikmont\FrontEndBundle\Repository\GenTercerosRepository")
 */
class GenTerceros
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_tercero_pk", type="integer")
     */ 
    private $codigoTerceroPk;
    
    /**
     * @ORM\Column(name="nombre_corto_tercero", type="string", length=80, nullable="true")
     */      
    private $nombreCortoTercero;

    /**
     * @ORM\Column(name="nombres", type="string", length=50, nullable="true")
     */
    private $nombres;

     /**
     * @ORM\Column(name="apellido1", type="string", length=50, nullable="true")
     */   
    private $apellido1;

    /**
     * @ORM\Column(name="apellido2", type="string", length=50, nullable="true")
     */
    private $apellido2;

    /**
     * @ORM\Column(name="codigo_lista_precio_fk", type="integer", nullable ="true")
     */    
    private $codigoListaPrecioFk;

    /**
     * @ORM\Column(name="codigo_lista_costo_fk", type="integer", nullable ="true")
     */    
    private $codigoListaCostoFk;    

    /**
     * @ORM\Column(name="codigo_clasificacion_tributaria_fk", type="integer", nullable ="true")
     */    
    private $codigoClasificacionTributariaFk;    
    
    /**
     * @ORM\Column(name="direccion", type="string", length=80, nullable="true")
     */
    private $direccion;    

    /**
     * @ORM\Column(name="telefono", type="string", length=20, nullable="true")
     */
    private $telefono;    

    /**
     * @ORM\Column(name="celular", type="string", length=20, nullable="true")
     */
    private $celular;    
    
    
    /**
     * @ORM\Column(name="fax", type="string", length=20, nullable="true")
     */
    private $fax;    
    
    /**
     * @ORM\Column(name="email", type="string", length=20, nullable="true")
     */
    private $email;    

    /**
     * @ORM\Column(name="retencion_fuente_ventas", type="boolean", nullable="true")
     */    
    private $retencionFuenteVentas;    

    /**
     * @ORM\Column(name="retencion_fuente_ventas_sin_base", type="boolean", nullable="true")
     */    
    private $retencionFuenteVentasSinBase;    
    
    
    /**
     * @ORM\Column(name="autoretenedor", type="boolean", nullable="true")
     */    
    private $autoretenedor ;    

    /**
     * @ORM\ManyToOne(targetEntity="GenClasificacionesTributarias", inversedBy="GenTerceros")
     * @ORM\JoinColumn(name="codigo_clasificacion_tributaria_fk", referencedColumnName="codigo_clasificacion_tributaria_pk")
     */
    protected $clasificacionTributariaRel;    


    /**
     * Set codigoTerceroPk
     *
     * @param integer $codigoTerceroPk
     */
    public function setCodigoTerceroPk($codigoTerceroPk)
    {
        $this->codigoTerceroPk = $codigoTerceroPk;
    }

    /**
     * Get codigoTerceroPk
     *
     * @return integer 
     */
    public function getCodigoTerceroPk()
    {
        return $this->codigoTerceroPk;
    }

    /**
     * Set nombreCortoTercero
     *
     * @param string $nombreCortoTercero
     */
    public function setNombreCortoTercero($nombreCortoTercero)
    {
        $this->nombreCortoTercero = $nombreCortoTercero;
    }

    /**
     * Get nombreCortoTercero
     *
     * @return string 
     */
    public function getNombreCortoTercero()
    {
        return $this->nombreCortoTercero;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellido1
     *
     * @param string $apellido1
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;
    }

    /**
     * Get apellido1
     *
     * @return string 
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;
    }

    /**
     * Get apellido2
     *
     * @return string 
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set codigoListaPrecioFk
     *
     * @param integer $codigoListaPrecioFk
     */
    public function setCodigoListaPrecioFk($codigoListaPrecioFk)
    {
        $this->codigoListaPrecioFk = $codigoListaPrecioFk;
    }

    /**
     * Get codigoListaPrecioFk
     *
     * @return integer 
     */
    public function getCodigoListaPrecioFk()
    {
        return $this->codigoListaPrecioFk;
    }

    /**
     * Set codigoListaCostoFk
     *
     * @param integer $codigoListaCostoFk
     */
    public function setCodigoListaCostoFk($codigoListaCostoFk)
    {
        $this->codigoListaCostoFk = $codigoListaCostoFk;
    }

    /**
     * Get codigoListaCostoFk
     *
     * @return integer 
     */
    public function getCodigoListaCostoFk()
    {
        return $this->codigoListaCostoFk;
    }

    /**
     * Set codigoClasificacionTributariaFk
     *
     * @param integer $codigoClasificacionTributariaFk
     */
    public function setCodigoClasificacionTributariaFk($codigoClasificacionTributariaFk)
    {
        $this->codigoClasificacionTributariaFk = $codigoClasificacionTributariaFk;
    }

    /**
     * Get codigoClasificacionTributariaFk
     *
     * @return integer 
     */
    public function getCodigoClasificacionTributariaFk()
    {
        return $this->codigoClasificacionTributariaFk;
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
     * Set celular
     *
     * @param string $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set fax
     *
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
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
     * Set retencionFuenteVentas
     *
     * @param boolean $retencionFuenteVentas
     */
    public function setRetencionFuenteVentas($retencionFuenteVentas)
    {
        $this->retencionFuenteVentas = $retencionFuenteVentas;
    }

    /**
     * Get retencionFuenteVentas
     *
     * @return boolean 
     */
    public function getRetencionFuenteVentas()
    {
        return $this->retencionFuenteVentas;
    }

    /**
     * Set retencionFuenteVentasSinBase
     *
     * @param boolean $retencionFuenteVentasSinBase
     */
    public function setRetencionFuenteVentasSinBase($retencionFuenteVentasSinBase)
    {
        $this->retencionFuenteVentasSinBase = $retencionFuenteVentasSinBase;
    }

    /**
     * Get retencionFuenteVentasSinBase
     *
     * @return boolean 
     */
    public function getRetencionFuenteVentasSinBase()
    {
        return $this->retencionFuenteVentasSinBase;
    }

    /**
     * Set autoretenedor
     *
     * @param boolean $autoretenedor
     */
    public function setAutoretenedor($autoretenedor)
    {
        $this->autoretenedor = $autoretenedor;
    }

    /**
     * Get autoretenedor
     *
     * @return boolean 
     */
    public function getAutoretenedor()
    {
        return $this->autoretenedor;
    }

    /**
     * Set clasificacionTributariaRel
     *
     * @param zikmont\FrontEndBundle\Entity\GenClasificacionesTributarias $clasificacionTributariaRel
     */
    public function setClasificacionTributariaRel(\zikmont\FrontEndBundle\Entity\GenClasificacionesTributarias $clasificacionTributariaRel)
    {
        $this->clasificacionTributariaRel = $clasificacionTributariaRel;
    }

    /**
     * Get clasificacionTributariaRel
     *
     * @return zikmont\FrontEndBundle\Entity\GenClasificacionesTributarias 
     */
    public function getClasificacionTributariaRel()
    {
        return $this->clasificacionTributariaRel;
    }
}