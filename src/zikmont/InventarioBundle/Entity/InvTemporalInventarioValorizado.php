<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="inv_temporal_inventario_valorizado")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvTemporalInventarioValorizadoRepository")
 */
class InvTemporalInventarioValorizado
{
    /** 
     * @ORM\Id
     * @ORM\Column(name="codigo_temporal_inventario_valorizado_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $codigoTemporalInventarioValorizadoPk;
    
    /**
     * @ORM\Column(name="fecha", type="datetime", nullable="true")
     */    
    private $fecha;     
    
    /**
     * @ORM\Column(name="codigo_item_fk", type="integer", nullable="true")
     */     
    private $codigoItemFk; 
    
    /**
     * @ORM\Column(name="saldo", type="integer")
     */        
    private $saldo = 0;
    
    /**
     * @ORM\Column(name="costo_promedio", type="float")
     */    
    private $costoPromedio = 0;
    
    /**
     * @ORM\Column(name="total_promedio", type="float")
     */    
    private $totalPromedio = 0;    
    
    /**
     * @ORM\Column(name="codigo_usuario_fk", type="string", length=20, nullable="true")
     */    
    private $codigoUsuarioFk;     
        

    

    /**
     * Get codigoTemporalInventarioValorizadoPk
     *
     * @return integer 
     */
    public function getCodigoTemporalInventarioValorizadoPk()
    {
        return $this->codigoTemporalInventarioValorizadoPk;
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
     * Set saldo
     *
     * @param integer $saldo
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    /**
     * Get saldo
     *
     * @return integer 
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * Set costoPromedio
     *
     * @param float $costoPromedio
     */
    public function setCostoPromedio($costoPromedio)
    {
        $this->costoPromedio = $costoPromedio;
    }

    /**
     * Get costoPromedio
     *
     * @return float 
     */
    public function getCostoPromedio()
    {
        return $this->costoPromedio;
    }

    /**
     * Set totalPromedio
     *
     * @param float $totalPromedio
     */
    public function setTotalPromedio($totalPromedio)
    {
        $this->totalPromedio = $totalPromedio;
    }

    /**
     * Get totalPromedio
     *
     * @return float 
     */
    public function getTotalPromedio()
    {
        return $this->totalPromedio;
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
     * Set itemMD
     *
     * @param zikmont\FrontEndBundle\Entity\Item $itemMD
     */
    public function setItemMD(\zikmont\FrontEndBundle\Entity\Item $itemMD)
    {
        $this->itemMD = $itemMD;
    }

    /**
     * Get itemMD
     *
     * @return zikmont\FrontEndBundle\Entity\Item 
     */
    public function getItemMD()
    {
        return $this->itemMD;
    }
}