<?php

namespace zikmont\ImpresionesBundle;
use zikmont\ImpresionesBundle\Controller\ImpresionController;

/**
 * Description of ImpresionFactura
 *
 * @author desarrollo2
 */
class ImpresionFactura {

    public $Pdf;
    public $Em;
    public $Movimiento;
    public $NumeroCopias;

    public function setDetallesMovimiento($intCodigoMovimiento) {
        $this->CodigoMovimiento = $intCodigoMovimiento;
    }

    public function getDetallesMovimiento() {
        return $this->CodigoMovimiento;
    }

    public function Generar($arDetalles) {

        $this->setDetallesMovimiento($arDetalles);

        $this->Pdf = new \FPDF('P', 'mm', 'letter');
        $this->Pdf->AliasNbPages();
        $this->Pdf->AddPage();
        $this->Pdf->SetTitle('Factura de Venta');
        $this->Header();
        $this->Body();
        $this->Pdf->Output("Factura de Venta.pdf", 'D');
    }

    public function Header() {
        
        $Text = array('Fecha factura:', 'Fecha vencimiento:', 'Forma de pago:', 'OC:');

        $this->Pdf->SetY(17);
        $i = 0;
        foreach ($Text as $col) {
            $this->Pdf->SetX(140);
            if (($i % 2) == 0)
                $this->Pdf->SetFont('Arial', 'B', 7);
            $this->Pdf->Cell(40, 4, $col, 0, 0, 'L');
            $this->Pdf->Ln(4.4);
            $i++;
        }
        
        
        $this->Pdf->SetMargins(4, 1, 10);
        $this->Pdf->Rect(4, 16, 207, 18);
        
        $this->Pdf->SetFont('Arial', 'B', 7);
        // Listado derecho.
        $this->Pdf->SetY(17);
        $List1 = array('CLIENTE: ', 'NIT: ', 'DIR:', 'CIUDAD:');
        foreach ($List1 as $col) {
            $this->Pdf->Cell(40, 5, $col, 0, 0, 'L');
            $this->Pdf->Ln(3.5);
        }

        
        $this->Pdf->SetFont('Arial', 'B', 16);
//      $this->Image('/opt/lampp/htdocs/kasten/themes/Default/imagenes/general/abac.jpg', 6, 3, 33);
        $this->Pdf->SetFont('Arial', '', 4);
        $this->Pdf->SetFont('Arial', '', 7);

        $this->Pdf->Text(8, 15, "NIT.");
        $this->Pdf->ln(10);
        $this->Pdf->SetXY(10, 16);
        $this->Pdf->SetFont('Arial', 'B', 16);
        $this->Pdf->Text(75, 14, 'ENTRADA DE ALMACEN');

        $this->Pdf->ln(1);

        // Encabezado Tabla
        $strHeader = array('ITEM', 'DESCRIPCION', 'LOTE', 'VENCIMIENTO', 'BODEGA', 'COSTO', 'IVA', 'CANTIDAD', 'TOTAL');
        // widths de las columnas
        $intAnchoColumna = array(10, 87, 20, 20, 10, 20, 10, 10, 20, 15);

        $this->Pdf->ln(18);

        $this->Pdf->SetFont('Arial', 'B', 5);
        for ($i = 0; $i < count($strHeader); $i++)
            $this->Pdf->Cell($intAnchoColumna[$i], 3, $strHeader[$i], 1, 0, 'C');
    }

    public function Body() {
        $this->Pdf->ln(2);

        $i = 0;
        foreach ($this->getDetallesMovimiento() as $Detalle) {
            
            if(Count($this->Movimiento) == 0)
                $this->Movimiento =  $Detalle->getMovimientoRel();

            $this->Pdf->SetFont('Arial', '', 6.5);

            $this->Pdf->Cell(10, 5, $Detalle->getCodigoMovimientoFk(), 0, 0, 'L');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 8, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(87, 5, $Detalle->getitemMD()->getDescripcion(), 0, 0,'L');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 8, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(20, 5, $Detalle->getLoteFk(), 0, 0, 'L');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 8, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(20, 5, $Detalle->getCodigoMovimientoFk(), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 8, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(10, 5, number_format($Detalle->getCodigoBodegaFk(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 8, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(20, 5, number_format($Detalle->getPrecio(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 8, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(10, 5, number_format($Detalle->getPorcentajeIva(), 0, '.', ','), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 8, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(10, 5, number_format($Detalle->getCantidad(), 0, '.', ','), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 8, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(20, 5, number_format($Detalle->getTotal(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 8, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(15, 5, number_format($Detalle->getCodigoMovimientoFk(), 2, '.', ','), 0, 0, 'R');

            $this->Pdf->Ln(4);
        }
        
        $this->Pdf->SetFont('Arial', 'B', 7.5);
        $this->Pdf->line(6, $this->Pdf->GetY() + 10, 211, $this->Pdf->GetY() + 10);
        $this->Pdf->ln(12);
        $totales = array('SUBTOTAL: ' . " " . " ",
            'DCTO: ' . " " . " ",
            'SUBTOTAL NETO: ' . " " . " ",
            'IVA: ' . " " . " ",
            'FLETES: ' . " " . " ",
            'TOTAL GENERAL: ' . " " . " ",
            'RTE FTE: ' . " " . " ");

//        $this->Pdf->line(6, $this->Pdf->GetY() + 30, 211, $this->Pdf->GetY() + 30);
        $this->Pdf->SetMargins(170, 2, 15);
        for ($i = 0; $i < count($totales); $i++) {
            $this->Pdf->SetX(170);
            $this->Pdf->Cell(20, 4, $totales[$i], 0, 0, 'R');
            $this->Pdf->ln();
        }

        $totales2 = array(number_format($this->Movimiento->getSubTotal(), 2, '.', ','),
            number_format($this->Movimiento->getValorTotalDescuento(), 2, '.', ','),
            number_format($this->Movimiento->getSubTotal(), 2, '.', ','),
            number_format($this->Movimiento->getSubTotal(), 2, '.', ','),
            number_format($this->Movimiento->getSubTotal(), 2, '.', ','),
            number_format($this->Movimiento->getSubTotal(), 2, '.', ','),
            number_format($this->Movimiento->getSubTotal(), 2, '.', ','));

        $this->Pdf->SetFont('Arial', '', 7.5);
        $this->Pdf->SetXY(193,$this->Pdf->GetY()-40);
        $this->Pdf->ln(12);
        for ($i = 0; $i < count($totales2); $i++) {
            $this->Pdf->SetX(192);
            $this->Pdf->Cell(20, 4, $totales2[$i], 0, 0, 'R');
            $this->Pdf->ln();
        }        
        
        $this->Footer();
    }

    public function Footer() {
        
       $this->Pdf->Ln(3);
        $this->Pdf->line(6, $this->Pdf->GetY($this->Pdf->SetY(263)), 211, $this->Pdf->GetY($this->Pdf->SetY(263)));
        $this->Pdf->SetFont('Arial', 'B', 8);
        $this->Pdf->Text(23, $this->Pdf->GetY($this->Pdf->SetY(267)), 'CRA 58 # 9-40 CAMPO AMOR - MEDELLIN PBX 444 63 03 FAX 352 94 47 e-mail: abacientifica@aba.com.co - pedidos@aba.com.co'); 
        
        
       $this->Pdf->SetFont('Arial', '', 6.7);
        $this->Pdf->Text(6, 250,  'La empresa no se responsabiliza de los reclamos, si al momento de recibir el pedido no se deja constancia escrita');        
//        $this->Movimiento->getTerceroRel()->getNombreCortoTercero() 
    }
}

?>
