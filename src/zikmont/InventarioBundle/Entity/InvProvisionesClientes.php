<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_provisiones_clientes")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvProvisionesClientesRepository")
 */
class InvProvisionesClientes
{
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_provision_cliente_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */        
    private $codigoProvisionClientePk;  

    /**
     * @ORM\Column(name="codigo_tercero_fk", type="integer", nullable="true")
     */    
    private $codigoTerceroFk; 
    
    /**
     * @ORM\Column(name="codigo_item_fk", type="integer", nullable="true")
     */     
    private $codigoItemFk;         
 
    
    
    
    /**
     * Get codigoProvisionClientePk
     *
     * @return integer 
     */
    public function getCodigoProvisionClientePk()
    {
        return $this->codigoProvisionClientePk;
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
     * Set itemRel
     *
     * @param zikmont\FrontEndBundle\Entity\Item $itemRel
     */
    public function setItemRel(\zikmont\FrontEndBundle\Entity\Item $itemRel)
    {
        $this->itemRel = $itemRel;
    }

    /**
     * Get itemRel
     *
     * @return zikmont\FrontEndBundle\Entity\Item 
     */
    public function getItemRel()
    {
        return $this->itemRel;
    }
}