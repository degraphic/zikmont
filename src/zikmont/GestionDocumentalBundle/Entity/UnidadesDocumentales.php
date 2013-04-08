<?php

namespace zikmont\GestionDocumentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\GestionDocumentalBundle\Entity\UnidadesDocumentales
 *
 * @ORM\Table(name="gdc_documentos_digitalizacion_unidades_documentales")
 * @ORM\Entity(repositoryClass="zikmont\GestionDocumentalBundle\Repository\UnidadesDocumentalesRepository")
 */
class UnidadesDocumentales
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_unidad_documental_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */ 
    private $codigoUnidadDocumentalPk;

    /**
     * @ORM\Column(name="nombre_unidad_documental", type="string", length=80, nullable="true")
     */      
    private $nombreUnidadDocumental;
    
    /**
     * @ORM\Column(name="comentarios", type="string", length=150, nullable="true")
     */      
    private $comentarios;

    /**
     * Get codigoUnidadDocumentalPk
     *
     * @return integer 
     */
    public function getCodigoUnidadDocumentalPk()
    {
        return $this->codigoUnidadDocumentalPk;
    }

    /**
     * Set nombreUnidadDocumental
     *
     * @param string $nombreUnidadDocumental
     */
    public function setNombreUnidadDocumental($nombreUnidadDocumental)
    {
        $this->nombreUnidadDocumental = $nombreUnidadDocumental;
    }

    /**
     * Get nombreUnidadDocumental
     *
     * @return string 
     */
    public function getNombreUnidadDocumental()
    {
        return $this->nombreUnidadDocumental;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;
    }

    /**
     * Get comentarios
     *
     * @return string 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }
}