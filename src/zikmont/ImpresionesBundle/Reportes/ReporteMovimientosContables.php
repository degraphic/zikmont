<?php
namespace zikmont\ImpresionesBundle\Reportes;
use zikmont\ImpresionesBundle\Reportes\EncabezadoReportes;
require_once __DIR__ . '/../Soporte/fpdf.php';
class ReporteMovimientosContables extends \FPDF{
    
    public function Generar($em, $arMovimientosContables) {        
        ob_end_clean();        
        $this->Pdf = new ReporteMovimientosContables('P', 'mm', 'letter', $em);           
        $this->Pdf->AddPage();        
        $douTotalDebito = 0;
        $douTotalCredito = 0;        
        $this->Pdf->SetX(10);
        $this->Pdf->SetFont('Arial', '', 6);
        foreach ($arMovimientosContables as $arMovimientosContables) {
            $this->Pdf->Cell(9, 4, $arMovimientosContables->getCodigoMovimientoPk(), 0, 0, 'R');
            $this->Pdf->Cell(20, 4, $arMovimientosContables->getCodigoCuentaFk(), 0, 0);
            $this->Pdf->Cell(9, 4, $arMovimientosContables->getCodigoComprobanteContableFk(), 0, 0, 'L');
            $this->Pdf->Cell(15, 4, "2013-05-05", 0, 0, 'L');
            $this->Pdf->Cell(15, 4, "0000000", 0, 0, 'L');
            $this->Pdf->Cell(30, 4, $arMovimientosContables->getDetalle(), 0, 0, 'L');
            $this->Pdf->Cell(20, 4, number_format($arMovimientosContables->getDebito(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->Cell(20, 4, number_format($arMovimientosContables->getCredito(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->Cell(15, 4, number_format($arMovimientosContables->getBase(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->Cell(15, 4, $arMovimientosContables->getCodigoTerceroFk(), 0, 0, 'L');
            $this->Pdf->Cell(5, 4, $arMovimientosContables->getCodigoCentroCostosFk(), 0, 0, 'L');
            $this->Pdf->Ln();
            $this->Pdf->SetAutoPageBreak(true, 33);
            $douTotalDebito = $douTotalDebito + $arMovimientosContables->getDebito();
            $douTotalCredito = $douTotalCredito + $arMovimientosContables->getCredito();
            
        }     
        $this->Pdf->Cell(9, 4, "", 0, 0, 'R');
        $this->Pdf->Cell(20, 4, "", 0, 0);
        $this->Pdf->Cell(9, 4, "", 0, 0, 'L');
        $this->Pdf->Cell(15, 4, "", 0, 0, 'L');
        $this->Pdf->Cell(15, 4, "", 0, 0, 'L');
        $this->Pdf->Cell(30, 4, "", 0, 0, 'L');
        $this->Pdf->Cell(20, 4, number_format($douTotalDebito, 2, '.', ','), 0, 0, 'R');
        $this->Pdf->Cell(20, 4, number_format($douTotalCredito, 2, '.', ','), 0, 0, 'R');
        $this->Pdf->Cell(15, 4, "", 0, 0, 'R');  
        $this->Pdf->Cell(15, 4, "", 0, 0, 'L');
        $this->Pdf->Cell(5, 4, "", 0, 0, 'L');
        
        $this->Pdf->Output("ReporteMovimientos.pdf", 'D');
        exit;
    }    
    
    public function Header() { 
        EncabezadoReportes::GenerarEncabezado($this, 1);
        $this->Ln(10);        
        $this->SetFillColor(236, 236, 236);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B', 6.3);
        
        $arrayTitulos = array('ID', 'Cuenta', 'Com', 'Fecha', 'Doc. Ref', 'Detalle', 'Debito', 'Credito', 'Base', 'Nit', 'C.C');
        $arrayMedidas = array(9, 20, 9, 15, 15, 30, 20, 20, 15, 15, 5);
        for ($i = 0; $i < count($arrayTitulos); $i++)
            $this->Cell($arrayMedidas[$i], 4, $arrayTitulos[$i], 1, 0, 'C', 1);

        //Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        $this->Ln(4);        
        
    }   
}

?>

