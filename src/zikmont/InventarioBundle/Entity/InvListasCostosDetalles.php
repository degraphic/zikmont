<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_listas_costos_detalles")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvListasCostosDetallesRepository")
 */
class InvListasCostosDetalles
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_lista_costos_detalle_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoListaCostosDetallePk;

    /**
     * @ORM\Column(name="codigo_lista_costos_fk", type="integer")     
     */        
    private $codigoListaCostosFk;    
    
    /**
     * @ORM\Column(name="codigo_item_fk", type="integer", nullable="true")
     */     
    private $codigoItemFk;    
    
    /**
     * @ORM\Column(name="costo", type="float")
     */    
    private $costo = 0;    
    
    /**
     * @ORM\Column(name="factor", type="integer")
     */    
    private $factor = 0;
    
    /**
     * @ORM\Column(name="costo_umm", type="float")
     */    
    private $costoUMM = 0;    

    /**
     * @ORM\Column(name="estado_inactiva", type="boolean")
     */    
    private $estadoInactiva = 0;     
           
    /**
     * @ORM\ManyToOne(targetEntity="InvListasCostos", inversedBy="InvListasCostosDetalles")
     * @ORM\JoinColumn(name="codigo_lista_costos_fk", referencedColumnName="codigo_lista_costos_pk")
     */
    protected $listaCostosRel;    



    /**
     * Get codigoListaCostosDetallePk
     *
     * @return integer 
     */
    public function getCodigoListaCostosDetallePk()
    {
        return $this->codigoListaCostosDetallePk;
    }

    /**
     * Set codigoListaCostosFk
     *
     * @param integer $codigoListaCostosFk
     */
    public function setCodigoListaCostosFk($codigoListaCostosFk)
    {
        $this->codigoListaCostosFk = $codigoListaCostosFk;
    }

    /**
     * Get codigoListaCostosFk
     *
     * @return integer 
     */
    public function getCodigoListaCostosFk()
    {
        return $this->codigoListaCostosFk;
    }

    /**
     * Set codigoItemFk
     *
     * @param integer $codigoItemFk
     */
    public function setCodigoItemFk($codigoItemFk)
    {
        $this->codigoItemFk = $codigoItemFk;
    }

    /**
     * Get codigoItemFk
     *
     * @return integer 
     */
    public function getCodigoItemFk()
    {
        return $this->codigoItemFk;
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
     * Set factor
     *
     * @param integer $factor
     */
    public function setFactor($factor)
    {
        $this->factor = $factor;
    }

    /**
     * Get factor
     *
     * @return integer 
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * Set costoUMM
     *
     * @param float $costoUMM
     */
    public function setCostoUMM($costoUMM)
    {
        $this->costoUMM = $costoUMM;
    }

    /**
     * Get costoUMM
     *
     * @return float 
     */
    public function getCostoUMM()
    {
        return $this->costoUMM;
    }

    /**
     * Set estadoInactiva
     *
     * @param boolean $estadoInactiva
     */
    public function setEstadoInactiva($estadoInactiva)
    {
        $this->estadoInactiva = $estadoInactiva;
    }

    /**
     * Get estadoInactiva
     *
     * @return boolean 
     */
    public function getEstadoInactiva()
    {
        return $this->estadoInactiva;
    }

    /**
     * Set listaCostosRel
     *
     * @param zikmont\InventarioBundle\Entity\InvListasCostos $listaCostosRel
     */
    public function setListaCostosRel(\zikmont\InventarioBundle\Entity\InvListasCostos $listaCostosRel)
    {
        $this->listaCostosRel = $listaCostosRel;
    }

    /**
     * Get listaCostosRel
     *
     * @return zikmont\InventarioBundle\Entity\InvListasCostos 
     */
    public function getListaCostosRel()
    {
        return $this->listaCostosRel;
    }
}