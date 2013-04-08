<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_listas_precios_detalles")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvListasPreciosDetallesRepository")
 */
class InvListasPreciosDetalles
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_lista_precios_detalle_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoListaPreciosDetallePk;

    /**
     * @ORM\Column(name="codigo_lista_precios_fk", type="integer")
     */     
    private $codigoListaPreciosFk;     
    
    /**
     * @ORM\Column(name="codigo_item_fk", type="integer", nullable="true")
     */     
    private $codigoItemFk;    
    
    /**
     * @ORM\Column(name="precio", type="float")
     */    
    private $precio = 0;      
    
    /**
     * @ORM\Column(name="estado_inactiva", type="boolean")
     */    
    private $estadoInactiva = 0;            
    
    /**
     * @ORM\ManyToOne(targetEntity="InvListasPrecios", inversedBy="InvListasPreciosDetalles")
     * @ORM\JoinColumn(name="codigo_lista_precios_fk", referencedColumnName="codigo_lista_precios_pk")
     */
    protected $listaPrecioRel;    
    


    /**
     * Get codigoListaPreciosDetallePk
     *
     * @return integer 
     */
    public function getCodigoListaPreciosDetallePk()
    {
        return $this->codigoListaPreciosDetallePk;
    }

    /**
     * Set codigoListaPreciosFk
     *
     * @param integer $codigoListaPreciosFk
     */
    public function setCodigoListaPreciosFk($codigoListaPreciosFk)
    {
        $this->codigoListaPreciosFk = $codigoListaPreciosFk;
    }

    /**
     * Get codigoListaPreciosFk
     *
     * @return integer 
     */
    public function getCodigoListaPreciosFk()
    {
        return $this->codigoListaPreciosFk;
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
     * Set precio
     *
     * @param float $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
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
     * Set listaPrecioRel
     *
     * @param zikmont\InventarioBundle\Entity\InvListasPrecios $listaPrecioRel
     */
    public function setListaPrecioRel(\zikmont\InventarioBundle\Entity\InvListasPrecios $listaPrecioRel)
    {
        $this->listaPrecioRel = $listaPrecioRel;
    }

    /**
     * Get listaPrecioRel
     *
     * @return zikmont\InventarioBundle\Entity\InvListasPrecios 
     */
    public function getListaPrecioRel()
    {
        return $this->listaPrecioRel;
    }
}