<?php

namespace zikmont\ImpresionesBundle\Formatos;

class FormatoSolicitud extends FormatoGeneral {

    public static $arMovimiento;
    public static $em;

    public function Generar($em, $arMovimiento) {
        ob_end_clean();
        $this->Pdf = new FormatoSolicitud('P', 'mm', 'letter', $em);
        self::$arMovimiento = $arMovimiento;
        self::$em = $em;
        $this->Pdf->AddPage();
        $this->Pdf->Output($arMovimiento->getdocumentoRel()->getNombre()."-".$arMovimiento->getNumeroMovimiento().".pdf", 'D');
        exit;
    }

    public function Header() {
        $this->GenerarEncabezado(self::$em);

        $this->SetMargins(4, 1, 10);
        $this->Rect(4, 25, 207, 18);
        $this->ln(1);
        $this->SetY(26);
        $this->SetFont('Arial', 'B', 7);
        $List1 = array('CLIENTE: ', 'NIT: ', 'DIR:', 'CIUDAD:');
        foreach ($List1 as $col) {
            $this->Cell(40, 5, $col, 0, 0, 'L');
            $this->Ln(3.5);
        }
        
        $Datos = array(self::$arMovimiento->getTerceroRel()->getNombreCortoTercero(), self::$arMovimiento->getTerceroRel()->getCodigoTerceroPk(), self::$arMovimiento->getTerceroRel()->getTelefono(),self::$arMovimiento->getTerceroRel()->getDireccion());
        $this->SetFont('Arial', '', 8);
        $this->SetY(26);

        foreach ($Datos as $col) {
            $this->SetX(20);
            $this->Cell(40, 5, $col, 0, 'R');
            $this->Ln(3.5);
        }

        $this->Body();
    }

    public function Body() {
        $this->SetFont('Arial', '', 7);
        $this->SetXY(4, 45);
        $this->SetFillColor(236, 236, 236);
        $this->SetTextColor(0);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B', 6.3);
        
        $arrayTitulos = array('ITEM', 'DESCRIPCION', 'LOTE', 'VENCIMIENTO', 'BODEGA', 'COSTO', 'IVA', 'CANTIDAD', 'TOTAL');
        $arrayMedidas = array(9, 96, 20, 16, 11, 14, 8, 13, 20);
        
        for ($i = 0; $i < count($arrayTitulos); $i++)
            $this->Cell($arrayMedidas[$i], 4, $arrayTitulos[$i], 1, 0, 'C', 1);

        $this->ln(5);

        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        $this->Ln(1);

        $arMovimientosDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
        $arMovimientosDetalle = self::$em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->findBy(array('codigoMovimientoFk' => self::$arMovimiento->getCodigoMovimientoPk()));
        $this->SetFont('Arial', '', 6);
        $this->SetXY(4, 48);
        foreach ($arMovimientosDetalle as $Detalle) {
            $this->SetFont('Arial', '', 6.5);

            $this->Cell(9, 5, $Detalle->getMovimientoRel()->getCodigoMovimientoPk(), 0, 0, 'L');
            $this->line($this->GetX(), $this->GetY() + 4, $this->GetX(), $this->GetY() + 1);
            $this->Cell(96, 5, $Detalle->getitemRel()->getDescripcion(), 0, 0, 'L');
            $this->line($this->GetX(), $this->GetY() + 4, $this->GetX(), $this->GetY() + 1);
            $this->Cell(20, 5, $Detalle->getLoteFk(), 0, 0, 'L');
            $this->line($this->GetX(), $this->GetY() + 4, $this->GetX(), $this->GetY() + 1);
            $this->Cell(16, 5, $Detalle->getCodigoMovimientoFk(), 0, 0, 'R');
            $this->line($this->GetX(), $this->GetY() + 4, $this->GetX(), $this->GetY() + 1);
            $this->Cell(11, 5, $Detalle->getCodigoBodegaFk(), 0, 0, 'R');
            $this->line($this->GetX(), $this->GetY() + 4, $this->GetX(), $this->GetY() + 1);
            $this->Cell(14, 5, number_format($Detalle->getPrecio(), 2, '.', ','), 0, 0, 'R');
            $this->line($this->GetX(), $this->GetY() + 4, $this->GetX(), $this->GetY() + 1);
            $this->Cell(8, 5, number_format($Detalle->getPorcentajeIva(), 0, '.', ','), 0, 0, 'R');
            $this->line($this->GetX(), $this->GetY() + 4, $this->GetX(), $this->GetY() + 1);
            $this->Cell(13, 5, number_format($Detalle->getCantidad(), 0, '.', ','), 0, 0, 'R');
            $this->line($this->GetX(), $this->GetY() + 4, $this->GetX(), $this->GetY() + 1);
            $this->Cell(20, 5, number_format($Detalle->getTotal(), 2, '.', ','), 0, 0, 'R');
            $this->line($this->GetX(), $this->GetY() + 4, $this->GetX(), $this->GetY() + 1);

            $this->Ln(4);
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

        $this->line(6, $this->GetY() + 30, 211, $this->GetY() + 30);
        $this->SetMargins(170, 2, 15);
        for ($i = 0; $i < count($totales); $i++) {
            $this->SetX(170);
            $this->Cell(20, 4, $totales[$i], 0, 0, 'R');
            $this->ln();
        }

        $totales2 = array(number_format(self::$arMovimiento->getSubTotal(), 2, '.', ','),
            number_format(self::$arMovimiento->getValorTotalDescuento(), 2, '.', ','),
            number_format((self::$arMovimiento->getSubTotal() - self::$arMovimiento->getValorTotalDescuento()), 2, '.', ','),
            number_format(self::$arMovimiento->getValorTotalIva(), 2, '.', ','),
            number_format(self::$arMovimiento->getSubTotal(), 2, '.', ','),
            number_format(self::$arMovimiento->getSubTotal(), 2, '.', ','),
            number_format(self::$arMovimiento->getSubTotal(), 2, '.', ','));

        $this->SetFont('Arial', '', 7.5);
        $this->SetXY(193, $this->GetY() - 40);
        $this->ln(12);
        for ($i = 0; $i < count($totales2); $i++) {
            $this->SetX(192);
            $this->Cell(20, 4, $totales2[$i], 0, 0, 'R');
            $this->ln();
        }

        $this->SetFont('Arial', 'B', 6);
        
        $this->Cell(0, 0, $this->line(100, $this->GetY($this->SetY(130)), 150, $this->GetY($this->SetY(130))) . $this->Text(100, $this->GetY($this->SetY(133)), "AUTORIZADO"));
        $this->Cell(0, 0, $this->line(160, $this->GetY($this->SetY(130)), 210, $this->GetY($this->SetY(130))) . $this->Text(160, $this->GetY($this->SetY(133)), "FIRMADO RECIBIDO"));

        $this->Output(self::$arMovimiento->getDocumentoRel()->getNombre() . ".pdf", 'D');
        exit;
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
