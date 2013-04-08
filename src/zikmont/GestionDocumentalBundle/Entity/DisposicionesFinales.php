<?php

namespace zikmont\GestionDocumentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\GestionDocumentalBundle\Entity\DisposicionesFinales
 * @ORM\Table(name="gdc_documentos_digitalizacion_disposiciones_finales")
 * @ORM\Entity(repositoryClass="zikmont\GestionDocumentalBundle\Repository\DisposicionesFinalesRepository")
 */
class DisposicionesFinales
{
    /**
     * @ORM\id
     * @ORM\Column(name="codigo_disposicion_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoDisposicionFinalPk;

    /**
     * @ORM\Column(name="nombre_disposicion_final", type="string", length=80, nullable="true")
     */   
    private $nombreDisposicionFinal;

    /**
     * Get codigoDisposicionFinalPk
     *
     * @return integer 
     */
    public function getCodigoDisposicionFinalPk()
    {
        return $this->codigoDisposicionFinalPk;
    }

    /**
     * Set nombreDisposicionFinal
     *
     * @param string $nombreDisposicionFinal
     */
    public function setNombreDisposicionFinal($nombreDisposicionFinal)
    {
        $this->nombreDisposicionFinal = $nombreDisposicionFinal;
    }

    /**
     * Get nombreDisposicionFinal
     *
     * @return string 
     */
    public function getNombreDisposicionFinal()
    {
        return $this->nombreDisposicionFinal;
    }
}