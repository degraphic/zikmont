<?php
namespace zikmont\ImpresionesBundle\Formatos;
use zikmont\ImpresionesBundle\Formatos\EncabezadoFormatosOperativos;
require_once __DIR__ . '/../Soporte/fpdf.php';
class FormatoPedido extends \FPDF{
    
    public function Generar($em, $IntIdMovimiento) {        
        ob_end_clean();        
        $this->Pdf = new FormatoPedido('P', 'mm', 'letter', $em);           
        $this->Pdf->IdMovimiento = $IntIdMovimiento;
        $this->Pdf->AddPage();                
        $this->Pdf->Output("Pedido.pdf", 'D');
        exit;
    }    
    
    public function Header() { 
        EncabezadoFormatosOperativos::GenerarEncabezado($this, 2);        
        
        $this->SetMargins(4, 1, 10);
        $this->Rect(4, 25, 207, 18);
        $this->ln(1);
        $this->SetY(25);
        $this->SetFont('Arial', 'B', 7);        
        $List1 = array('CLIENTE: ', 'NIT: ', 'DIR:', 'CIUDAD:');
        foreach ($List1 as $col) {
            $this->Cell(40, 5, $col, 0, 0, 'L');
            $this->Ln(3.5);
        }        
        $this->SetFont('Arial', '', 7);
        $strHeader = array('ITEM', 'DESCRIPCION', 'LOTE', 'VENCIMIENTO', 'BODEGA', 'COSTO', 'IVA', 'CANTIDAD', 'TOTAL');        
        $intAnchoColumna = array(10, 87, 20, 20, 10, 20, 10, 10, 20);

        $this->ln(5);
        $this->SetFont('Arial', 'B', 5);
        for ($i = 0; $i < count($strHeader); $i++)
            $this->Cell($intAnchoColumna[$i], 3, $strHeader[$i], 1, 0, 'C'); 
        $this->Body();
              
    }
    public function Body () {
        $em = $this->emp;
        $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($this->IdMovimiento);         
        $arMovimientosDetalles = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
        $arMovimientosDetalles = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->findBy(array('codigoMovimientoFk' => $this->IdMovimiento)); 
        $this->ln(2);
        $intAlto = 5;
        $i = 0;
        foreach ($arMovimientosDetalles as $arMovimientosDetalles) {           
            $this->SetFont('Arial', '', 6.5);
            $this->Cell(10, $intAlto, $arMovimientosDetalles->getCodigoDetalleMovimientoPk(), 0, 0, 'L');
            $this->line($this->GetX(), $this->GetY() + 8, $this->GetX(), $this->GetY() + 1);
            $this->Cell(87, $intAlto, $arMovimientosDetalles->getItemRel()->getDescripcion(), 0, 0,'L');
            $this->line($this->GetX(), $this->GetY() + 8, $this->GetX(), $this->GetY() + 1);
            $this->Cell(20, $intAlto, $arMovimientosDetalles->getLoteFk(), 0, 0, 'L');
            $this->line($this->GetX(), $this->GetY() + 8, $this->GetX(), $this->GetY() + 1);
            $this->Cell(20, $intAlto, "NA", 0, 0, 'L');
            $this->line($this->GetX(), $this->GetY() + 8, $this->GetX(), $this->GetY() + 1);
            $this->Cell(10, $intAlto, number_format($arMovimientosDetalles->getCodigoBodegaFk(), 0, '.', ','), 0, 0, 'R');
            $this->line($this->GetX(), $this->GetY() + 8, $this->GetX(), $this->GetY() + 1);
            $this->Cell(20, $intAlto, number_format($arMovimientosDetalles->getPrecio(), 0, '.', ','), 0, 0, 'R');
            $this->line($this->GetX(), $this->GetY() + 8, $this->GetX(), $this->GetY() + 1);
            $this->Cell(10, $intAlto, number_format($arMovimientosDetalles->getPorcentajeIva(), 0, '.', ','), 0, 0, 'R');
            $this->line($this->GetX(), $this->GetY() + 8, $this->GetX(), $this->GetY() + 1);                     
            $this->Cell(10, $intAlto, number_format($arMovimientosDetalles->getCantidad(), 0, '.', ','), 0, 0, 'R');
            $this->line($this->GetX(), $this->GetY() + 8, $this->GetX(), $this->GetY() + 1);
            $this->Cell(20, $intAlto, number_format($arMovimientosDetalles->getTotal(), 0, '.', ','), 0, 0, 'R');
            $this->Ln(2);
        }
        
       $this->SetFont('Arial', 'B', 7.5);
        $this->line(6, $this->GetY() + 10, 211, $this->GetY() + 10);
        $this->ln(12);
        $totales = array('SUBTOTAL: ' . " " . " ",
            'DCTO: ' . " " . " ",
            'SUBTOTAL NETO: ' . " " . " ",
            'IVA: ' . " " . " ",
            'FLETES: ' . " " . " ",
            'TOTAL GENERAL: ' . " " . " ",
            'RTE FTE: ' . " " . " ");

//        $this->Pdf->line(6, $this->Pdf->GetY() + 30, 211, $this->Pdf->GetY() + 30);
        $this->SetMargins(170, 2, 15);
        for ($i = 0; $i < count($totales); $i++) {
            $this->SetX(170);
            $this->Cell(20, 4, $totales[$i], 0, 0, 'R');
            $this->ln();
        }

        $totales2 = array(number_format($arMovimiento->getSubTotal(), 2, '.', ','),
            number_format($arMovimiento->getValorTotalDescuento(), 2, '.', ','),
            number_format($arMovimiento->getSubTotal(), 2, '.', ','),
            number_format($arMovimiento->getSubTotal(), 2, '.', ','),
            number_format($arMovimiento->getSubTotal(), 2, '.', ','),
            number_format($arMovimiento->getSubTotal(), 2, '.', ','),
            number_format($arMovimiento->getSubTotal(), 2, '.', ','));

        $this->SetFont('Arial', '', 7.5);
        $this->SetXY(193,$this->GetY()-40);
        $this->ln(12);
        for ($i = 0; $i < count($totales2); $i++) {
            $this->SetX(192);
            $this->Cell(20, 4, $totales2[$i], 0, 0, 'R');
            $this->ln();
        } 
    }
    
    public function Footer() {
        $this->SetFont('Arial', '', 8);
        $this->Rect(9, 265, 70, 6);
        $this->Text(14, 269, 'Consecutivo' . " " . $this->Rect(31, 266, 4, 4));
        $this->Text(38, 269, 'Control');
        $this->Rect(48, 266, 4, 4);
        $this->Text(56, 269, 'Contabilidad' . " " . $this->Rect(73, 266, 4, 4));

        //Número de página
        $this->Text(9, 260, 'Page ' . $this->PageNo() . '/{nb}');        
    }
    
}

?>

