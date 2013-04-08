<?php
namespace zikmont\ImpresionesBundle\Formatos;

class EncabezadoFormatosOperativos {
    public static function GenerarEncabezado($em, $intCodigoReporte,$pdf) { 
//        $em = $pdf->emp;
        $arEmpresa = new \zikmont\FrontEndBundle\Entity\GenEmpresas;
        $arEmpresa = $em->getRepository('zikmontFrontEndBundle:GenEmpresas')->find(1); 
        $arReporte = new \zikmont\ImpresionesBundle\Entity\ImpReportes();
        $arReporte = $em->getRepository('zikmontImpresionesBundle:ImpReportes')->find($intCodigoReporte);    
        
        $pdf->SetFont('Arial', '', 4);        
        $pdf->Text(160, 2, '2013-01-01 10:25 [Zikmont Contable]');
        $pdf->Image('bundles/zikmont/imagenes/logos/abac.jpg', 12, 3, 33);
        $pdf->ln(11);        
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(70, 15, $arReporte->getNombreReporte());
        $pdf->ln(5);        
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Text(85, 20, $arEmpresa->getNombreEmpresa() . " - " . $arEmpresa->getNit() . "-" . $arEmpresa->getDigitoVerificacion());
        $pdf->SetXY(258, 16);
    }    
}

?>