<?php
namespace zikmont\ImpresionesBundle\Formatos;
//require_once '/opt/lampp/htdocs/zikmont/src/zikmont/ImpresionesBundle/Reportes/fpdf.php';
require_once __DIR__ . '/../Soporte/fpdf.php';
class FormatoComprobanteEgreso extends \FPDF{
    
    public function Generar($em, $arAsiento) {        
        $arEmpresa = new \zikmont\FrontEndBundle\Entity\Empresas();
        $arEmpresa = $em->getRepository('zikmontFrontEndBundle:Empresas')->find(1);
        ob_end_clean();        
        $this->Pdf = new FormatoComprobanteEgreso('P', 'mm', 'letter', $em);           
        $this->Pdf->AddPage();      
        $this->Pdf->SetFillColor(255, 255, 255);    
        $this->Pdf->SetX(20);
        $this->Pdf->Cell(180,80, "", 1, 1, 'L', 1);
        $this->Pdf->SetX(20);
        $this->Pdf->Cell(90, 20, "", 1, 1, 'L', 1);
        $this->Pdf->SetXY(100,$this->Pdf->GetY()-20);      
        $this->Pdf->Cell(100, 20, "", 1, 1, 'L', 1);
        $this->Pdf->SetX(20);
        $this->Pdf->Cell(180,80, "", 1, 1, 'L', 1);
        $this->Pdf->SetX(20);        
        $this->Pdf->Cell(50, 10, "", 1, 1, 'L', 1);
        $this->Pdf->SetXY(70,$this->Pdf->GetY()-10);      
        $this->Pdf->Cell(50, 10, "", 1, 1, 'L', 1);        
        $this->Pdf->SetXY(120,$this->Pdf->GetY()-10);      
        $this->Pdf->Cell(80, 10, "", 1, 1, 'L', 1);        
        
        $this->Pdf->SetX(20);        
        $this->Pdf->Cell(50, 10, "", 1, 1, 'L', 1);
        $this->Pdf->SetXY(70,$this->Pdf->GetY()-10);      
        $this->Pdf->Cell(50, 10, "", 1, 1, 'L', 1);        
        $this->Pdf->SetXY(120,$this->Pdf->GetY()-10);      
        $this->Pdf->Cell(80, 10, "", 1, 1, 'L', 1);        
        
        $this->Pdf->Image('bundles/zikmont/imagenes/logos/abac.jpg', 22, 91, 33);
        //$this->Image($file, $x, $y, $w, $h, $type, $link);
        $this->Pdf->SetFillColor(0, 0, 0);
        $this->Pdf->SetFont('Arial', 'B', 16);        
        $this->Pdf->Text(105, 98, "COMPROBANTE");
        $this->Pdf->Text(105, 105, "DE EGRESO");        
        $this->Pdf->Text(160, 105, $arAsiento->getNumeroAsiento());
        $this->Pdf->SetFont('Arial', 'B', 12);
        $this->Pdf->Text(60, 101, "Nit: " . $arEmpresa->getNit() . "-" . $arEmpresa->getDigitoVerificacion());
        $this->Pdf->SetFont('Arial', '', 8);
        $this->Pdf->Text(22, 193, "Preparado");
        $this->Pdf->Text(22, 203, "Aprovado");
        $this->Pdf->Text(72, 193, "Revisado");
        $this->Pdf->Text(72, 203, "Contabilizado");
        $this->Pdf->Text(122, 193, "Firma y sello del beneficiario");
        $this->Pdf->Text(122, 203, "C.C / Nit");                        
        $arAsientosDetalles = new \zikmont\ContabilidadBundle\Entity\CtbAsientosDetalles();
        $arAsientosDetalles = $em->getRepository('zikmontContabilidadBundle:CtbAsientosDetalles')->findBy(array('codigoAsientoFk' => $arAsiento->getCodigoAsientoPk()));
        $this->Pdf->SetFont('Arial', '', 6);
        $this->Pdf->SetXY(25,125);
        foreach($arAsientosDetalles as $arAsientosDetalles) {
            $this->Pdf->SetX(25);
            $this->Pdf->Cell(9, 4, $arAsientosDetalles->getCodigoAsientoDetallePk(), 0, 0, 'R');
            $this->Pdf->Cell(20, 4, $arAsientosDetalles->getCodigoCuentaFk(), 0, 0);
            $this->Pdf->Cell(9, 4, $arAsiento->getCodigoComprobanteContableFk(), 0, 0, 'L');
            $this->Pdf->Cell(15, 4, "2013-05-05", 0, 0, 'L');
            $this->Pdf->Cell(15, 4, "0000000", 0, 0, 'L');
            $this->Pdf->Cell(30, 4, $arAsientosDetalles->getDescripcionContable(), 0, 0, 'L');
            $this->Pdf->Cell(20, 4, number_format($arAsientosDetalles->getDebito(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->Cell(20, 4, number_format($arAsientosDetalles->getCredito(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->Cell(15, 4, number_format($arAsientosDetalles->getBase(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->Cell(15, 4, $arAsientosDetalles->getCodigoTerceroFk(), 0, 0, 'L');
            $this->Pdf->Cell(5, 4, $arAsientosDetalles->getCodigoCentroCostosFk(), 0, 0, 'L');
            $this->Pdf->Ln();
            $this->Pdf->SetAutoPageBreak(true, 33);    
        }

        $this->Pdf->SetXY(25,120);        
        $this->Pdf->SetFillColor(236, 236, 236);
        $this->Pdf->SetTextColor(0);
        $this->Pdf->SetDrawColor(0, 0, 0);
        $this->Pdf->SetLineWidth(.3);
        $this->Pdf->SetFont('', 'B', 6.3);
        
        $arrayTitulos = array('ID', 'Cuenta', 'Com', 'Fecha', 'Doc. Ref', 'Detalle', 'Debito', 'Credito', 'Base', 'Nit', 'C.C');
        $arrayMedidas = array(9, 20, 9, 15, 15, 30, 20, 20, 15, 15, 5);
        for ($i = 0; $i < count($arrayTitulos); $i++)
            $this->Pdf->Cell($arrayMedidas[$i], 4, $arrayTitulos[$i], 1, 0, 'C', 1);
       
        $this->Pdf->SetFillColor(224, 235, 255);
        $this->Pdf->SetTextColor(0);
        $this->Pdf->SetFont('');
        $this->Pdf->Ln(4);
        
        $this->Pdf->Output("ComprobanteEgreso.pdf", 'D');
        exit;
    }           
}

?>

