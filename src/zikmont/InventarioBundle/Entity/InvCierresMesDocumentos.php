<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_cierres_mes_documentos")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvCierresMesDocumentosRepository")
 */
class InvCierresMesDocumentos
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_cierre_mes_documentos_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoCierreMesDocumentosPk;
    
    /**
     * @ORM\Column(name="codigo_cierre_mes_inventario_fk", type="integer", nullable="true")
     */    
    private $codigoCierreMesInventarioFk;    
    
    /**
     * @ORM\Column(name="codigo_documento_fk", type="integer", nullable="true")
     */    
    private $codigoDocumentoFk;  
    
    /**
     * @ORM\Column(name="total_costo", type="float")
     */
    private $totalCosto = 0;            



    /**
     * Get codigoCierreMesDocumentosPk
     *
     * @return integer 
     */
    public function getCodigoCierreMesDocumentosPk()
    {
        return $this->codigoCierreMesDocumentosPk;
    }

    /**
     * Set codigoCierreMesInventarioFk
     *
     * @param integer $codigoCierreMesInventarioFk
     */
    public function setCodigoCierreMesInventarioFk($codigoCierreMesInventarioFk)
    {
        $this->codigoCierreMesInventarioFk = $codigoCierreMesInventarioFk;
    }

    /**
     * Get codigoCierreMesInventarioFk
     *
     * @return integer 
     */
    public function getCodigoCierreMesInventarioFk()
    {
        return $this->codigoCierreMesInventarioFk;
    }

    /**
     * Set codigoDocumentoFk
     *
     * @param integer $codigoDocumentoFk
     */
    public function setCodigoDocumentoFk($codigoDocumentoFk)
    {
        $this->codigoDocumentoFk = $codigoDocumentoFk;
    }

    /**
     * Get codigoDocumentoFk
     *
     * @return integer 
     */
    public function getCodigoDocumentoFk()
    {
        return $this->codigoDocumentoFk;
    }

    /**
     * Set totalCosto
     *
     * @param float $totalCosto
     */
    public function setTotalCosto($totalCosto)
    {
        $this->totalCosto = $totalCosto;
    }

    /**
     * Get totalCosto
     *
     * @return float 
     */
    public function getTotalCosto()
    {
        return $this->totalCosto;
    }
}