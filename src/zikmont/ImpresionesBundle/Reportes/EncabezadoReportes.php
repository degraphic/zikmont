<?php
namespace zikmont\ImpresionesBundle\Reportes;

class EncabezadoReportes {
    public static function GenerarEncabezado($mythis, $intCodigoReporte) { 
        $em = $mythis->emp;
        $arEmpresa = new \zikmont\FrontEndBundle\Entity\Empresas();
        $arEmpresa = $em->getRepository('zikmontFrontEndBundle:Empresas')->find(1); 
        $arReporte = new \zikmont\ImpresionesBundle\Entity\Reportes();
        $arReporte = $em->getRepository('zikmontImpresionesBundle:Reportes')->find($intCodigoReporte);    
        
        $mythis->SetFont('Arial', '', 4);        
        $mythis->Text(160, 2, '2013-01-01 10:25 [Zikmont Contable]');
        $mythis->Image('bundles/zikmont/imagenes/logos/abac.jpg', 12, 3, 33);
        $mythis->ln(11);        
        $mythis->SetFont('Arial', 'B', 12);
        $mythis->Text(70, 15, $arReporte->getNombreReporte());
        $mythis->ln(5);        
        $mythis->SetFont('Arial', 'B', 8);
        $mythis->Text(85, 20, $arEmpresa->getNombreEmpresa() . " - " . $arEmpresa->getNit() . "-" . $arEmpresa->getDigitoVerificacion());
        $mythis->SetXY(258, 16);
    }    
}

?>