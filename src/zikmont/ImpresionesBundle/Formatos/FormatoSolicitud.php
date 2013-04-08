<?php
namespace zikmont\ImpresionesBundle\Formatos;

class FormatoSolicitud extends FormatoGeneral {
    
    public $Pdf;
    
    public function Generar($em, $arMovimiento) {        
        ob_end_clean();        
        $this->Pdf = new FormatoSolicitud('P', 'mm', 'letter', $em);           
        EncabezadoFormatosOperativos::GenerarEncabezado($em, 3,$this->Pdf);        

        $this->Pdf->AddPage();      
        
        $this->Pdf->SetMargins(4, 1, 10);
        $this->Pdf->Rect(4, 25, 207, 18);

        $this->Pdf->SetFont('Arial', 'B', 7);
        // Listado derecho.
        $this->Pdf->SetY(26);
        $List1 = array('TERCERO: ', 'NIT: ', 'DIR:', 'CIUDAD:');
        foreach ($List1 as $col) {
            $this->Pdf->Cell(40, 5, $col, 0, 0, 'L');
            $this->Pdf->Ln(3.5);
        }
        
        $Datos = array($arMovimiento->getTerceroRel()->getNombreCortoTercero(), $arMovimiento->getTerceroRel()->getCodigoTerceroPk(), $arMovimiento->getTerceroRel()->getTelefono(), $arMovimiento->getTerceroRel()->getDireccion());
        $this->Pdf->SetFont('Arial', '', 8);
        $this->Pdf->SetY(26);

        foreach ($Datos as $col) {
            $this->Pdf->SetX(28);
            $this->Pdf->Cell(40, 5, $col, 0, 'R');
            $this->Pdf->Ln(3.5);
        }
        
        
        $this->Pdf->SetXY(4,45);        
        $this->Pdf->SetFillColor(236, 236, 236);
        $this->Pdf->SetTextColor(0);
        $this->Pdf->SetDrawColor(0, 0, 0);
        $this->Pdf->SetLineWidth(.3);
        $this->Pdf->SetFont('', 'B', 6.3);
        
        $arrayTitulos = array('ITEM', 'DESCRIPCION', 'LOTE', 'VENCIMIENTO', 'BODEGA', 'COSTO', 'IVA', 'CANTIDAD', 'TOTAL');
        $arrayMedidas = array(9, 96, 20, 16, 11, 14, 8, 13, 20);
        for ($i = 0; $i < count($arrayTitulos); $i++)
            $this->Pdf->Cell($arrayMedidas[$i], 4, $arrayTitulos[$i], 1, 0, 'C', 1);
       
        $this->Pdf->SetFillColor(224, 235, 255);
        $this->Pdf->SetTextColor(0);
        $this->Pdf->SetFont('');
        $this->Pdf->Ln(1);
        
        $arMovimientosDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
        $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->findBy(array('codigoMovimientoFk' => $arMovimiento->getCodigoMovimientoPk()));
        $this->Pdf->SetFont('Arial', '', 6);
        $this->Pdf->SetXY(4,48);
        foreach($arMovimientosDetalle as $Detalle) {
            $this->Pdf->SetFont('Arial', '', 6.5);

            $this->Pdf->Cell(9, 5, $Detalle->getMovimientoRel()->getCodigoMovimientoPk(), 0, 0, 'L');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 4, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(96, 5, $Detalle->getitemRel()->getDescripcion(), 0, 0, 'L');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 4, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(20, 5, $Detalle->getLoteFk(), 0, 0, 'L');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 4, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(16, 5, $Detalle->getCodigoMovimientoFk(), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 4, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(11, 5, $Detalle->getCodigoBodegaFk(), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 4, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(14, 5, number_format($Detalle->getPrecio(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 4, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(8, 5, number_format($Detalle->getPorcentajeIva(), 0, '.', ','), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 4, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(13, 5, number_format($Detalle->getCantidad(), 0, '.', ','), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 4, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);
            $this->Pdf->Cell(20, 5, number_format($Detalle->getTotal(), 2, '.', ','), 0, 0, 'R');
            $this->Pdf->line($this->Pdf->GetX(), $this->Pdf->GetY() + 4, $this->Pdf->GetX(), $this->Pdf->GetY() + 1);

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

        $this->Pdf->line(6, $this->Pdf->GetY() + 30, 211, $this->Pdf->GetY() + 30);
        $this->Pdf->SetMargins(170, 2, 15);
        for ($i = 0; $i < count($totales); $i++) {
            $this->Pdf->SetX(170);
            $this->Pdf->Cell(20, 4, $totales[$i], 0, 0, 'R');
            $this->Pdf->ln();
        }

        $totales2 = array(number_format($arMovimiento->getSubTotal(), 2, '.', ','),
            number_format($arMovimiento->getValorTotalDescuento(), 2, '.', ','),
            number_format($arMovimiento->getSubTotal(), 2, '.', ','),
            number_format($arMovimiento->getSubTotal(), 2, '.', ','),
            number_format($arMovimiento->getSubTotal(), 2, '.', ','),
            number_format($arMovimiento->getSubTotal(), 2, '.', ','),
            number_format($arMovimiento->getSubTotal(), 2, '.', ','));

        $this->Pdf->SetFont('Arial', '', 7.5);
        $this->Pdf->SetXY(193, $this->Pdf->GetY() - 40);
        $this->Pdf->ln(12);
        for ($i = 0; $i < count($totales2); $i++) {
            $this->Pdf->SetX(192);
            $this->Pdf->Cell(20, 4, $totales2[$i], 0, 0, 'R');
            $this->Pdf->ln();
        }
        
        $this->Pdf->SetFont('Arial', 'B', 6);
        
        //$this->Pdf->Text(22, 20, "Preparado");
        $this->Pdf->Text(130, $this->Pdf->getY()+20, "AUTORIZADO");
        
        $this->Pdf->Text(170, $this->Pdf->getY()+20, "FIRMA Y SELLO RECIBO");
        $this->Pdf->Text(190, $this->Pdf->getY()+25, "C.C / Nit");                        
        
        $this->Pdf->Output($arMovimiento->getDocumentoRel()->getNombre().".pdf", 'D');
        exit;
    }           
}

?>

