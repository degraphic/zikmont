<?php

namespace zikmont\GestionDocumentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\GestionDocumentalBundle\Entity\CargaDocumentos
 *
 * @ORM\Table(name="gdc_carga_documentos")
 * @ORM\Entity
 */
class CargaDocumentos
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_carga_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $codigoCargaPk;

    

    /**
     * Get codigoCargaPk
     *
     * @return integer 
     */
    public function getCodigoCargaPk()
    {
        return $this->codigoCargaPk;
    }
}