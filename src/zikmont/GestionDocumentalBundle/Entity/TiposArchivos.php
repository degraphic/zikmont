<?php

namespace zikmont\GestionDocumentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\GestionDocumentalBundle\Entity\TiposArchivos
 * @ORM\Table(name="gdc_documentos_digitalizacion_tipos_archivos")
 * @ORM\Entity(repositoryClass="zikmont\GestionDocumentalBundle\Repository\TiposArchivosRepository")
 */
class TiposArchivos
{
    /**
     * @ORM\id
     * @ORM\Column(name="codigo_tipo_archivo", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoTipoArchivoPk;

    /**
     * @ORM\Column(name="nombre_tipo_archivo", type="string", length=80, nullable="true")
     */   
    private $nombreTipoArchivo;


    /**
     * Get codigoTipoArchivoPk
     *
     * @return integer 
     */
    public function getCodigoTipoArchivoPk()
    {
        return $this->codigoTipoArchivoPk;
    }

    /**
     * Set nombreTipoArchivo
     *
     * @param string $nombreTipoArchivo
     */
    public function setNombreTipoArchivo($nombreTipoArchivo)
    {
        $this->nombreTipoArchivo = $nombreTipoArchivo;
    }

    /**
     * Get nombreTipoArchivo
     *
     * @return string 
     */
    public function getNombreTipoArchivo()
    {
        return $this->nombreTipoArchivo;
    }
}