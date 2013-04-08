<?php

namespace zikmont\FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\FrontEndBundle\Entity\Empresas
 *
 * @ORM\Table(name="gen_empresas")
 * @ORM\Entity(repositoryClass="zikmont\FrontEndBundle\Repository\GenEmpresasRepository")
 */
class GenEmpresas
{
    /**
     * @var integer $nit
     * @ORM\Id
     * @ORM\Column(name="codigo_empresa_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoEmpresaPk;

    /**
     * @var string $nit
     *
     * @ORM\Column(name="nit", type="string", length=20)
     */
    private $nit;
    
    /**
     * @ORM\Column(name="digito_verificacion", type="string", length=1)
     */
    private $digito_verificacion;    
    
    /**
     * @var string $nombre_empresa
     *
     * @ORM\Column(name="nombre_empresa", type="string", length=255)
     */
    private $nombreEmpresa;

    /**
     * @var string $direccion
     *
     * @ORM\Column(name="direccion", type="string", length=150)
     */
    private $direccion;

    /**
     * @var string $telefono
     *
     * @ORM\Column(name="telefono", type="string", length=100)
     */
    private $telefono;

    /**
     * @var string $fax
     *
     * @ORM\Column(name="fax", type="string", length=100)
     */
    private $fax;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=150)
     */
    private $email;

    /**
     * @var string $resolucion_dian
     *
     * @ORM\Column(name="resolucion_dian", type="string", length=255)
     */
    private $resolucionDian;

    /**
     * @var date $factura_desde
     *
     * @ORM\Column(name="factura_desde", type="string")
     */
    private $facturaDesde;

    /**
     * @var string $factura_hasta
     *
     * @ORM\Column(name="factura_hasta", type="string")
     */
    private $facturaHasta;

    /**
     * @var string $tipo_regimen
     *
     * @ORM\Column(name="tipo_regimen", type="string", length=50)
     */
    private $tipoRegimen;

    /**
     * @var string $comentario_tipo_regimen
     *
     * @ORM\Column(name="comentario_tipo_regimen", type="string", length=300)
     */
    private $comentarioTipoRegimen;



    /**
     * Set codigoEmpresaPk
     *
     * @param integer $codigoEmpresaPk
     */
    public function setCodigoEmpresaPk($codigoEmpresaPk)
    {
        $this->codigoEmpresaPk = $codigoEmpresaPk;
    }

    /**
     * Get codigoEmpresaPk
     *
     * @return integer 
     */
    public function getCodigoEmpresaPk()
    {
        return $this->codigoEmpresaPk;
    }

    /**
     * Set nit
     *
     * @param string $nit
     */
    public function setNit($nit)
    {
        $this->nit = $nit;
    }

    /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set digito_verificacion
     *
     * @param string $digitoVerificacion
     */
    public function setDigitoVerificacion($digitoVerificacion)
    {
        $this->digito_verificacion = $digitoVerificacion;
    }

    /**
     * Get digito_verificacion
     *
     * @return string 
     */
    public function getDigitoVerificacion()
    {
        return $this->digito_verificacion;
    }

    /**
     * Set nombreEmpresa
     *
     * @param string $nombreEmpresa
     */
    public function setNombreEmpresa($nombreEmpresa)
    {
        $this->nombreEmpresa = $nombreEmpresa;
    }

    /**
     * Get nombreEmpresa
     *
     * @return string 
     */
    public function getNombreEmpresa()
    {
        return $this->nombreEmpresa;
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
     * Set resolucionDian
     *
     * @param string $resolucionDian
     */
    public function setResolucionDian($resolucionDian)
    {
        $this->resolucionDian = $resolucionDian;
    }

    /**
     * Get resolucionDian
     *
     * @return string 
     */
    public function getResolucionDian()
    {
        return $this->resolucionDian;
    }

    /**
     * Set facturaDesde
     *
     * @param string $facturaDesde
     */
    public function setFacturaDesde($facturaDesde)
    {
        $this->facturaDesde = $facturaDesde;
    }

    /**
     * Get facturaDesde
     *
     * @return string 
     */
    public function getFacturaDesde()
    {
        return $this->facturaDesde;
    }

    /**
     * Set facturaHasta
     *
     * @param string $facturaHasta
     */
    public function setFacturaHasta($facturaHasta)
    {
        $this->facturaHasta = $facturaHasta;
    }

    /**
     * Get facturaHasta
     *
     * @return string 
     */
    public function getFacturaHasta()
    {
        return $this->facturaHasta;
    }

    /**
     * Set tipoRegimen
     *
     * @param string $tipoRegimen
     */
    public function setTipoRegimen($tipoRegimen)
    {
        $this->tipoRegimen = $tipoRegimen;
    }

    /**
     * Get tipoRegimen
     *
     * @return string 
     */
    public function getTipoRegimen()
    {
        return $this->tipoRegimen;
    }

    /**
     * Set comentarioTipoRegimen
     *
     * @param string $comentarioTipoRegimen
     */
    public function setComentarioTipoRegimen($comentarioTipoRegimen)
    {
        $this->comentarioTipoRegimen = $comentarioTipoRegimen;
    }

    /**
     * Get comentarioTipoRegimen
     *
     * @return string 
     */
    public function getComentarioTipoRegimen()
    {
        return $this->comentarioTipoRegimen;
    }
}