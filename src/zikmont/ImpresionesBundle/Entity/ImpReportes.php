<?php

namespace zikmont\ImpresionesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * zikmont\FrontEndBundle\Entity\Reportes
 *
 * @ORM\Table(name="imp_reportes")
 * @ORM\Entity(repositoryClass="zikmont\ImpresionesBundle\Repository\ImpReportesRepository")
 */
class ImpReportes
{
    /**
     * @ORM\Id
     * @ORM\Column(name="codigo_reporte_pk", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codigoReportePk;

    /**
     * @ORM\Column(name="nombre_reporte", type="string", length=80)
     */
    private $nombreReporte;     


    /**
     * Get codigoReportePk
     *
     * @return integer 
     */
    public function getCodigoReportePk()
    {
        return $this->codigoReportePk;
    }

    /**
     * Set nombreReporte
     *
     * @param string $nombreReporte
     */
    public function setNombreReporte($nombreReporte)
    {
        $this->nombreReporte = $nombreReporte;
    }

    /**
     * Get nombreReporte
     *
     * @return string 
     */
    public function getNombreReporte()
    {
        return $this->nombreReporte;
    }
}