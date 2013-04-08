<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_lotes")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvLotesRepository")
 */
class InvLotes
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_item_fk", type="integer")
     */     
    private $codigoItemFk;     
    
    /**
     * @ORM\Id
     * @ORM\Column(name="lote_fk", type="string", length=40)
     */      
    private $loteFk;
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_bodega_fk", type="smallint")
     */     
    private $codigoBodegaFk;
    
    /**
     * @ORM\Column(name="existencia", type="integer")
     */            
    private $existencia = 0;

    /**
     * @ORM\Column(name="cantidad_remisionada", type="integer")
     */            
    private $cantidadRemisionada = 0;    

    /**
     * @ORM\Column(name="cantidad_reservada", type="integer")
     */            
    private $cantidadReservada = 0;        
    
    /**
     * @ORM\Column(name="cantidad_disponible", type="integer")
     */            
    private $cantidadDisponible = 0;        
    
    /**
     * @ORM\Column(name="fecha_vencimiento", type="date")
     */            
    private $fechaVencimiento;    

    /**
     * @ORM\ManyToOne(targetEntity="InvItem", inversedBy="InvLotes")
     * @ORM\JoinColumn(name="codigo_item_fk", referencedColumnName="codigo_item_pk")
     */
    protected $itemRel;     

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
     * Set loteFk
     *
     * @param string $loteFk
     */
    public function setLoteFk($loteFk)
    {
        $this->loteFk = $loteFk;
    }

    /**
     * Get loteFk
     *
     * @return string 
     */
    public function getLoteFk()
    {
        return $this->loteFk;
    }

    /**
     * Set codigoBodegaFk
     *
     * @param smallint $codigoBodegaFk
     */
    public function setCodigoBodegaFk($codigoBodegaFk)
    {
        $this->codigoBodegaFk = $codigoBodegaFk;
    }

    /**
     * Get codigoBodegaFk
     *
     * @return smallint 
     */
    public function getCodigoBodegaFk()
    {
        return $this->codigoBodegaFk;
    }

    /**
     * Set existencia
     *
     * @param integer $existencia
     */
    public function setExistencia($existencia)
    {
        $this->existencia = $existencia;
    }

    /**
     * Get existencia
     *
     * @return integer 
     */
    public function getExistencia()
    {
        return $this->existencia;
    }

    /**
     * Set cantidadRemisionada
     *
     * @param integer $cantidadRemisionada
     */
    public function setCantidadRemisionada($cantidadRemisionada)
    {
        $this->cantidadRemisionada = $cantidadRemisionada;
    }

    /**
     * Get cantidadRemisionada
     *
     * @return integer 
     */
    public function getCantidadRemisionada()
    {
        return $this->cantidadRemisionada;
    }

    /**
     * Set cantidadReservada
     *
     * @param integer $cantidadReservada
     */
    public function setCantidadReservada($cantidadReservada)
    {
        $this->cantidadReservada = $cantidadReservada;
    }

    /**
     * Get cantidadReservada
     *
     * @return integer 
     */
    public function getCantidadReservada()
    {
        return $this->cantidadReservada;
    }

    /**
     * Set cantidadDisponible
     *
     * @param integer $cantidadDisponible
     */
    public function setCantidadDisponible($cantidadDisponible)
    {
        $this->cantidadDisponible = $cantidadDisponible;
    }

    /**
     * Get cantidadDisponible
     *
     * @return integer 
     */
    public function getCantidadDisponible()
    {
        return $this->cantidadDisponible;
    }

    /**
     * Set fechaVencimiento
     *
     * @param date $fechaVencimiento
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;
    }

    /**
     * Get fechaVencimiento
     *
     * @return date 
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set itemRel
     *
     * @param zikmont\InventarioBundle\Entity\InvItem $itemRel
     */
    public function setItemRel(\zikmont\InventarioBundle\Entity\InvItem $itemRel)
    {
        $this->itemRel = $itemRel;
    }

    /**
     * Get itemRel
     *
     * @return zikmont\InventarioBundle\Entity\InvItem 
     */
    public function getItemRel()
    {
        return $this->itemRel;
    }
}