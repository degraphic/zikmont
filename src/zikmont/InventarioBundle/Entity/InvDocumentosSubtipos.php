<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_documentos_subtipos")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvDocumentosSubtiposRepository")
 */
class InvDocumentosSubtipos
{   
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_documento_subtipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $codigoDocumentoSubtipoPk;
    
    /**
     * @ORM\Column(name="nombre", type="string", length=80)
     */        
    private $nombre;


    /**
     * Get codigoDocumentoSubtipoPk
     *
     * @return integer 
     */
    public function getCodigoDocumentoSubtipoPk()
    {
        return $this->codigoDocumentoSubtipoPk;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
}