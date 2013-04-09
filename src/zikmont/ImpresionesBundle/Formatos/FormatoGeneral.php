<?php

namespace zikmont\ImpresionesBundle\Formatos;

use zikmont\ImpresionesBundle\Formatos\EncabezadoFormatosOperativos;

//require_once '/opt/lampp/htdocs/zikmont/src/zikmont/ImpresionesBundle/Reportes/fpdf.php';
require_once __DIR__ . '/../Soporte/fpdf.php';

/**
 * Description of FormatoGeneral
 *
 * @author daniel
 */
class FormatoGeneral extends \FPDF {

    public function GenerarEncabezado($em) {

        $arEmpresa = new \zikmont\FrontEndBundle\Entity\GenEmpresas;
        $arEmpresa = $em->getRepository('zikmontFrontEndBundle:GenEmpresas')->find(1);
//      $arReporte = new \zikmont\ImpresionesBundle\Entity\ImpReportes();
//      $arReporte = $em->getRepository('zikmontImpresionesBundle:ImpReportes')->find($intCodigoReporte);    

        $this->SetFont('Arial', '', 4);
        $this->Text(186, 2, '2013-01-01 10:25 [Zikmont - Inventario]');
        $this->Image('bundles/zikmont/imagenes/logos/abac.jpg', 4, 2, 33);
        $this->ln(11);        $this->Text(160, 2, '2013-01-01 10:25 [Zikmont Contable]');

        $this->SetFont('Arial', 'B', 12);
//        $this->Text(70, 15, self::$arMovimiento->getDocumentoRel()->getNombre());
        $this->ln(5);
        $this->SetFont('Arial', 'B', 8);
//        $this->Text(4, 22, $arEmpresa->getNombreEmpresa(). "-" . $arEmpresa->getNit() . "-" . $arEmpresa->getDigitoVerificacion() );
//        $this->SetFont('Arial', '', 8);
        $this->Text(10,22, $arEmpresa->getNit() . "-" . $arEmpresa->getDigitoVerificacion() );
        $this->SetXY(258, 18);
    }
}

?>
