<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_resumen_ventas")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvResumenVentasRepository")
 */
class InvResumenVentas
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_resumen_ventas_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoResumenVentasPk;

    /**
     * @ORM\Column(name="annio", type="integer", nullable="true")
     */    
    private $annio;
    
    /**
     * @ORM\Column(name="enero", type="float")
     */
    private $enero = 0;    
    
    /**
     * @ORM\Column(name="febrero", type="float")
     */
    private $febrero = 0;    
    
    /**
     * @ORM\Column(name="marzo", type="float")
     */
    private $marzo = 0;    
    
    /**
     * @ORM\Column(name="abril", type="float")
     */
    private $abril = 0;    
    
    /**
     * @ORM\Column(name="mayo", type="float")
     */
    private $mayo = 0;   
    
    /**
     * @ORM\Column(name="junio", type="float")
     */
    private $junio = 0;    
    
    /**
     * @ORM\Column(name="julio", type="float")
     */
    private $julio = 0;    
    
    /**
     * @ORM\Column(name="agosto", type="float")
     */
    private $agosto = 0;    
    
    /**
     * @ORM\Column(name="septiembre", type="float")
     */
    private $septiembre = 0;    
    
    /**
     * @ORM\Column(name="octubre", type="float")
     */
    private $octubre = 0;    
    
    /**
     * @ORM\Column(name="noviembre", type="float")
     */
    private $noviembre = 0;    
    
    /**
     * @ORM\Column(name="diciembre", type="float")
     */
    private $diciembre = 0;    


    /**
     * Get codigoResumenVentasPk
     *
     * @return integer 
     */
    public function getCodigoResumenVentasPk()
    {
        return $this->codigoResumenVentasPk;
    }

    /**
     * Set annio
     *
     * @param integer $annio
     */
    public function setAnnio($annio)
    {
        $this->annio = $annio;
    }

    /**
     * Get annio
     *
     * @return integer 
     */
    public function getAnnio()
    {
        return $this->annio;
    }

    /**
     * Set enero
     *
     * @param float $enero
     */
    public function setEnero($enero)
    {
        $this->enero = $enero;
    }

    /**
     * Get enero
     *
     * @return float 
     */
    public function getEnero()
    {
        return $this->enero;
    }

    /**
     * Set febrero
     *
     * @param float $febrero
     */
    public function setFebrero($febrero)
    {
        $this->febrero = $febrero;
    }

    /**
     * Get febrero
     *
     * @return float 
     */
    public function getFebrero()
    {
        return $this->febrero;
    }

    /**
     * Set marzo
     *
     * @param float $marzo
     */
    public function setMarzo($marzo)
    {
        $this->marzo = $marzo;
    }

    /**
     * Get marzo
     *
     * @return float 
     */
    public function getMarzo()
    {
        return $this->marzo;
    }

    /**
     * Set abril
     *
     * @param float $abril
     */
    public function setAbril($abril)
    {
        $this->abril = $abril;
    }

    /**
     * Get abril
     *
     * @return float 
     */
    public function getAbril()
    {
        return $this->abril;
    }

    /**
     * Set mayo
     *
     * @param float $mayo
     */
    public function setMayo($mayo)
    {
        $this->mayo = $mayo;
    }

    /**
     * Get mayo
     *
     * @return float 
     */
    public function getMayo()
    {
        return $this->mayo;
    }

    /**
     * Set junio
     *
     * @param float $junio
     */
    public function setJunio($junio)
    {
        $this->junio = $junio;
    }

    /**
     * Get junio
     *
     * @return float 
     */
    public function getJunio()
    {
        return $this->junio;
    }

    /**
     * Set julio
     *
     * @param float $julio
     */
    public function setJulio($julio)
    {
        $this->julio = $julio;
    }

    /**
     * Get julio
     *
     * @return float 
     */
    public function getJulio()
    {
        return $this->julio;
    }

    /**
     * Set agosto
     *
     * @param float $agosto
     */
    public function setAgosto($agosto)
    {
        $this->agosto = $agosto;
    }

    /**
     * Get agosto
     *
     * @return float 
     */
    public function getAgosto()
    {
        return $this->agosto;
    }

    /**
     * Set septiembre
     *
     * @param float $septiembre
     */
    public function setSeptiembre($septiembre)
    {
        $this->septiembre = $septiembre;
    }

    /**
     * Get septiembre
     *
     * @return float 
     */
    public function getSeptiembre()
    {
        return $this->septiembre;
    }

    /**
     * Set octubre
     *
     * @param float $octubre
     */
    public function setOctubre($octubre)
    {
        $this->octubre = $octubre;
    }

    /**
     * Get octubre
     *
     * @return float 
     */
    public function getOctubre()
    {
        return $this->octubre;
    }

    /**
     * Set noviembre
     *
     * @param float $noviembre
     */
    public function setNoviembre($noviembre)
    {
        $this->noviembre = $noviembre;
    }

    /**
     * Get noviembre
     *
     * @return float 
     */
    public function getNoviembre()
    {
        return $this->noviembre;
    }

    /**
     * Set diciembre
     *
     * @param float $diciembre
     */
    public function setDiciembre($diciembre)
    {
        $this->diciembre = $diciembre;
    }

    /**
     * Get diciembre
     *
     * @return float 
     */
    public function getDiciembre()
    {
        return $this->diciembre;
    }
}