<?php

namespace zikmont\InventarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="inv_documentos_tipos")
 * @ORM\Entity(repositoryClass="zikmont\InventarioBundle\Repository\InvDocumentosTiposRepository")
 */
class InvDocumentosTipos
{   
    
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_documento_tipo_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $codigoDocumentoTipoPk;
    
    /**
     * @ORM\Column(name="nombre", type="string", length=80)
     */        
    private $nombre;
   

    /**
     * Get codigoDocumentoTipoPk
     *
     * @return integer 
     */
    public function getCodigoDocumentoTipoPk()
    {
        return $this->codigoDocumentoTipoPk;
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