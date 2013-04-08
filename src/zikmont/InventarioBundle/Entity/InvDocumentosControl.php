<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_documentos_control")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvDocumentosControlRepository")
 */
class InvDocumentosControl
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_documento_padre_pk", type="integer")
     */ 
    private $codigoDocumentoPadrePk;    

    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_documento_hijo_pk", type="integer")
     */ 
    private $codigoDocumentoHijoPk;    
    
    /**
     * @ORM\ManyToOne(targetEntity="InvDocumentos", inversedBy="InvDocumentosControl")
     * @ORM\JoinColumn(name="codigo_documento_padre_pk", referencedColumnName="codigo_documento_pk")
     */
    protected $documentoPadreRel;      

    /**
     * @ORM\ManyToOne(targetEntity="InvDocumentos", inversedBy="InvDocumentosControl")
     * @ORM\JoinColumn(name="codigo_documento_hijo_pk", referencedColumnName="codigo_documento_pk")
     */
    protected $documentoHijoRel;    
    


    /**
     * Set codigoDocumentoPadrePk
     *
     * @param integer $codigoDocumentoPadrePk
     */
    public function setCodigoDocumentoPadrePk($codigoDocumentoPadrePk)
    {
        $this->codigoDocumentoPadrePk = $codigoDocumentoPadrePk;
    }

    /**
     * Get codigoDocumentoPadrePk
     *
     * @return integer 
     */
    public function getCodigoDocumentoPadrePk()
    {
        return $this->codigoDocumentoPadrePk;
    }

    /**
     * Set codigoDocumentoHijoPk
     *
     * @param integer $codigoDocumentoHijoPk
     */
    public function setCodigoDocumentoHijoPk($codigoDocumentoHijoPk)
    {
        $this->codigoDocumentoHijoPk = $codigoDocumentoHijoPk;
    }

    /**
     * Get codigoDocumentoHijoPk
     *
     * @return integer 
     */
    public function getCodigoDocumentoHijoPk()
    {
        return $this->codigoDocumentoHijoPk;
    }

    /**
     * Set documentoPadreRel
     *
     * @param zikmont\InventarioBundle\Entity\InvDocumentos $documentoPadreRel
     */
    public function setDocumentoPadreRel(\zikmont\InventarioBundle\Entity\InvDocumentos $documentoPadreRel)
    {
        $this->documentoPadreRel = $documentoPadreRel;
    }

    /**
     * Get documentoPadreRel
     *
     * @return zikmont\InventarioBundle\Entity\InvDocumentos 
     */
    public function getDocumentoPadreRel()
    {
        return $this->documentoPadreRel;
    }

    /**
     * Set documentoHijoRel
     *
     * @param zikmont\InventarioBundle\Entity\InvDocumentos $documentoHijoRel
     */
    public function setDocumentoHijoRel(\zikmont\InventarioBundle\Entity\InvDocumentos $documentoHijoRel)
    {
        $this->documentoHijoRel = $documentoHijoRel;
    }

    /**
     * Get documentoHijoRel
     *
     * @return zikmont\InventarioBundle\Entity\InvDocumentos 
     */
    public function getDocumentoHijoRel()
    {
        return $this->documentoHijoRel;
    }
}