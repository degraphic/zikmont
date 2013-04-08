<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_cierres_mes_lotes")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvCierresMesLotesRepository")
 */
class InvCierresMesLotes
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_cierre_mes_lote_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCierreMesLotePk;
    
    /**
     * @ORM\Column(name="codigo_cierre_mes_fk", type="integer", nullable="true")
     */    
    private $codigoCierreMesFk;    
    
    /**
     * @ORM\Column(name="codigo_item_fk", type="integer")
     */     
    private $codigoItemFk;     
    
    /**
     * @ORM\Column(name="lote_fk", type="string", length=40)
     */      
    private $loteFk;
    
    /**
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
     * @ORM\ManyToOne(targetEntity="InvItem", inversedBy="InvLotes")
     * @ORM\JoinColumn(name="codigo_item_fk", referencedColumnName="codigo_item_pk")
     */
    protected $itemRel;
    
    /**
     * @ORM\ManyToOne(targetEntity="InvCierresMes", inversedBy="InvCierresMesLotes")
     * @ORM\JoinColumn(name="codigo_cierre_mes_fk", referencedColumnName="codigo_cierre_mes_pk")
     */
    protected $cierreMesRel;    


    /**
     * Get codigoCierreMesLotePk
     *
     * @return integer 
     */
    public function getCodigoCierreMesLotePk()
    {
        return $this->codigoCierreMesLotePk;
    }

    /**
     * Set codigoCierreMesFk
     *
     * @param integer $codigoCierreMesFk
     */
    public function setCodigoCierreMesFk($codigoCierreMesFk)
    {
        $this->codigoCierreMesFk = $codigoCierreMesFk;
    }

    /**
     * Get codigoCierreMesFk
     *
     * @return integer 
     */
    public function getCodigoCierreMesFk()
    {
        return $this->codigoCierreMesFk;
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

    /**
     * Set cierreMesRel
     *
     * @param zikmont\InventarioBundle\Entity\InvCierresMes $cierreMesRel
     */
    public function setCierreMesRel(\zikmont\InventarioBundle\Entity\InvCierresMes $cierreMesRel)
    {
        $this->cierreMesRel = $cierreMesRel;
    }

    /**
     * Get cierreMesRel
     *
     * @return zikmont\InventarioBundle\Entity\InvCierresMes 
     */
    public function getCierreMesRel()
    {
        return $this->cierreMesRel;
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
}