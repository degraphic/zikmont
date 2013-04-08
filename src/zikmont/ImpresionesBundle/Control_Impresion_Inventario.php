<?php

namespace zikmont\ImpresionesBundle;

use zikmont\ImpresionesBundle\Formatos;

/**
 * Description of Control_Impresion
 *
 * @author desarrollo2
 */
class Control_Impresion_Inventario {

    public function CounstruirImpresion($em, $arMovimiento = NULL, $intCodigoMovimiento = NULL) {   
        
        if($arMovimiento == NULL && is_numeric($intCodigoMovimiento) && ($intCodigoMovimiento !=NULL))
        {
            $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
            $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
        }

        switch ($arMovimiento->getDocumentoRel()->getCodigoDocumentoPk()) {
            // Impresion factura venta POS
            case 0:
                $Impresion = new ImpresionFacturaPOS();
                $Impresion->Generar($this->get_EncabezadoMovimiento(),$this->get_DetallesMovimiento(), $this->get_NmDocumento());
                break;

            case 1:
                $Impresion = new ImpresionEntrada();
                $Impresion->Generar($this->get_EncabezadoMovimiento(),$this->get_DetallesMovimiento(), $this->get_NmDocumento());
                break;

            case 2:
                $Impresion = new ImpresionSalida();
                $Impresion->Generar($this->get_EncabezadoMovimiento(),$this->get_DetallesMovimiento(), $this->get_NmDocumento());
                break;

            case 3:
                $Impresion = new ImpresionFactura();
                $Impresion->Generar($this->get_EncabezadoMovimiento(),$this->get_DetallesMovimiento(), $this->get_NmDocumento());
                break;

            case 4:
                $Impresion = new ImpresionEntrada();
                $Impresion->Generar($this->get_EncabezadoMovimiento(),$this->get_DetallesMovimiento(), $this->get_NmDocumento());
                break;

            case 5:
                $Impresion = new ImpresionEntradas();
                $Impresion->Generar($this->get_EncabezadoMovimiento(),$this->get_DetallesMovimiento(), $this->get_NmDocumento());
                break;

            case 9:
                $Impresion = new ImpresionOrdenCompra();
                $Impresion->Generar($this->get_EncabezadoMovimiento(),$this->get_DetallesMovimiento());
                break;

            case 15:
                $Impresion = new Formatos\FormatoSolicitud();
                $Impresion->Generar($em,$arMovimiento);
                break;
        }
    }
}

?>

