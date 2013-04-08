<?php

namespace zikmont\InventarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;
use zikmont\ImpresionesBundle\Control_Impresion_Inventario;

class MovimientosController extends Controller {

    /**
     * Lista los movimientos (Encabezado) - Filtro
     */
    public function listaAction($codigoDocumento) {
        $request = $this->getRequest();
        $arMovimientosFrm = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $objFormulario = $this->createForm(new \zikmont\InventarioBundle\Form\MovimientoNuevoType(), $arMovimientosFrm);
        $arMovimientos = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $em = $this->getDoctrine()->getEntityManager();
        $arDocumento = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->find($codigoDocumento);
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            $objChkFecha = NULL;
            if (isset($arrControles['ChkFecha']))
                $objChkFecha = $arrControles['ChkFecha'];
            switch ($request->request->get('OpSubmit')) {
                case "OpAutorizar";
                    foreach ($arrSeleccionados AS $codigoMovimiento)
                        $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Autorizar($codigoMovimiento);
                    break;

                case "OpImprimir";
                    foreach ($arrSeleccionados AS $codigoMovimiento)
                        $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Imprimir($codigoMovimiento);
                    break;

                case "OpEliminar";
                    foreach ($arrSeleccionados AS $codigoMovimiento) {
                        $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
                        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
                        if ($arMovimiento->getEstadoAutorizado() == 0) {
                            if ($em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevNroDetallesMovimiento($codigoMovimiento) <= 0) {
                                $em->remove($arMovimiento);
                                $em->flush();
                            }
                        }
                    }
                    break;
                case "OpBuscar";
                    $arMovimientos = new \zikmont\InventarioBundle\Entity\InvMovimientos();
                    $arMovimientos = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->DevMovimientosFiltro(
                            $codigoDocumento, $arrControles['TxtCodigoMovimiento'], $arrControles['TxtNumeroMovimiento'], $arrControles['TxtCodigoTercero'], $objChkFecha, $arrControles['TxtFechaDesde'], $arrControles['TxtFechaHasta']);
                    break;
            }


            /*$objFormulario->bindRequest($request);
            if ($objFormulario->isValid()) {
                $em->persist($arMovimientosFrm);
                $em->flush();
                return $this->redirect($this->generateUrl('inventario_movimientos_lista'));
            }*/
        }
        $arMovimientos = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->findBy(array('codigoDocumentoFk' => $codigoDocumento, 'estadoImpreso' => '0'));
        return $this->render('zikmontInventarioBundle:Movimientos:lista.html.twig', array('arMovimientos' => $arMovimientos, 'arDocumento' => $arDocumento, 'objformulario' => $objFormulario->createView()));
    }

    /**
     * Alamacena un nuevo movimiento
     * @return type
     */
    public function nuevoAction($codigoDocumento) {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();
        $arMovimientoNuevo = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $objMensaje = new GenerarMensajes();
        $arDocumento = new \zikmont\InventarioBundle\Entity\InvDocumentos();

        if ($request->getMethod() == 'POST') {
            if (($request->request->get('TxtCodigoMovimiento')))
                $arMovimientoNuevo = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($request->request->get('TxtCodigoMovimiento'));

            if ($request->getMethod() == 'POST' || (($request->request->get('TxtCodigoMovimiento') && Count($arMovimientoNuevo) == 0)))
                if (!($request->request->get('TxtCodigoMovimiento')))
                    $arMovimientoNuevo = new \zikmont\InventarioBundle\Entity\InvMovimientos();

            $codigoTercero = explode("-", $request->request->get('TxtCodigoTerceroMovimientoNuevo'));
            $arTercero = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->find($codigoTercero[0]);

            $arDocumento = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->find($request->request->get('iddocumento'));

            $arMovimientoNuevo->setDocumentoRel($arDocumento);
            $arMovimientoNuevo->setDocumentoTipoRel($arDocumento->getDocumentoTipoRel());
            $arMovimientoNuevo->setTerceroRel($arTercero);
            $arMovimientoNuevo->setSoporte($request->request->get('TxtSoporte'));
            $arMovimientoNuevo->setComentarios($request->request->get('comentarios'));
            $arMovimientoNuevo->setSubTotal('0');
            $arMovimientoNuevo->setValorTotalDescuento('0');
            $arMovimientoNuevo->setFecha(date_create(date('Y-m-d H:i:s')));
            $arMovimientoNuevo->setEstadoAutorizado('0');

            $em->persist($arMovimientoNuevo);
            $em->flush();

            if (($request->request->get('TxtCodigoMovimiento')))
                $objMensaje->Mensaje('completado', "Se han actualizado los datos del Movimiento", $this);

            return $this->redirect($this->generateUrl('inventario_movimientos_detalle', array('codigoMovimiento' => $arMovimientoNuevo->getCodigoMovimientoPk())));
        }

        return $this->render('zikmontInventarioBundle:Movimientos:nuevo.html.twig', array('codigoDocumento' => $codigoDocumento));
    }
    
    /**
     * Carga los datos del encabezado de un detalle de movimiento
     * @param iteger $codigoMovimientoPk el codigo del movimiento que se va a editar.
     * @return render
     */
     public function cargarDatosMovimientoAction($codigoMovimientoPk) {
        $em = $this->getDoctrine()->getEntityManager();
        $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $arMovimientosDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
        $objMensaje = new GenerarMensajes();

        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimientoPk);

        $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->DevNroDetallesMovimiento($codigoMovimientoPk);

        if ($arMovimientosDetalle != 0) {
            $objMensaje->Mensaje('error', "El movimiento Contiene detalles y no puede ser editado", $this);
            return $this->redirect($this->generateUrl('inventario_movimientos_detalle', array('codigoMovimiento' => $codigoMovimientoPk)));
        }

        if (Count($arMovimiento) != 0)
            return $this->render('zikmontFrontEndBundle:Plantillas:movimientosNuevo.html.twig', array('arMovimiento' => $arMovimiento, 'codigoDocumento' => $arMovimiento->getCodigoDocumentoFk()));
        else
            return $this->render('zikmontFrontEndBundle:Plantillas:movimientosNuevo.html.twig', array('codigoDocumento' => $arMovimiento->getCodigoDocumentoFk()));
    }
    

    /**
     * Lista los movimientos detalle (Detalles) segun encabezado - Filtro
     */
    public function detalleAction($codigoMovimiento) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $objMensaje = new GenerarMensajes();
        $arMovimientosDetallesFrm = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
        $objFormulario = $this->createForm(new \zikmont\InventarioBundle\Form\MovimientoDetalleNuevoType(), $arMovimientosDetallesFrm);
        $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);
        if ($request->getMethod() == 'POST') {
            //$objFormulario->bindRequest($request);
            /*if ($objFormulario->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($arMovimientosDetallesFrm);
                $em->flush();
                return $this->redirect($this->generateUrl('movimientosdetalle'));
            }*/
            $arrControles = $request->request->All();
            $arrSeleccionados = $request->request->get('ChkSeleccionar');
            switch ($request->request->get('OpSubmit')) {
                case "OpAutorizar";
                    $strResultado = $this->GuardarCambios($arrControles);
                    if ($strResultado != "")
                        $objMensaje->Mensaje("error", $strResultado, $this);
                    else {
                        $strResultado = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Autorizar($codigoMovimiento);
                        if ($strResultado != "")
                            $objMensaje->Mensaje("error", "No se autorizo el movimiento: " . $strResultado, $this);
                    }
                    break;

                case "OpDesAutorizar";
                    $varDesautorizar = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->DesAutorizar($codigoMovimiento);
                    if ($varDesautorizar != "")
                        $objMensaje->Mensaje("error", "No se desautorizo el movimiento: " . $varDesautorizar, $this);
                    break;

                case "OpAnular";
                    $varAnular = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Anular($codigoMovimiento);
                    if ($varAnular != "")
                        $objMensaje->Mensaje("error", "No se anulo el movimiento: " . $varAnular, $this);
                    break;

                case "OpImprimir";
                    $strResultado = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Imprimir($codigoMovimiento);
                    if($strResultado == "") {
                        $Impresion = new Control_Impresion_Inventario();
                        $Impresion->CounstruirImpresion($em, $arMovimiento);
                    }
                    else
                        $objMensaje->Mensaje("error", "No se pudo imprimir el documento: " . $strResultado, $this);
                    break;

                case "OpEliminar";
                    if (count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoMovimientoDetalle) {
                            $arMovimientoDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                            $arMovimientoDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($codigoMovimientoDetalle);
                            if ($arMovimientoDetalle->getCodigoDetalleMovimientoEnlace() != "") {
                                $arMovimientoDetalleEnlace = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                                $arMovimientoDetalleEnlace = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($arMovimientoDetalle->getCodigoDetalleMovimientoEnlace());
                                $arMovimientoDetalleEnlace->setCantidadAfectada($arMovimientoDetalleEnlace->getCantidadAfectada() - $arMovimientoDetalle->getCantidad());
                                $em->persist($arMovimientoDetalleEnlace);
                                $em->flush();
                            }
                            $em->remove($arMovimientoDetalle);
                            $em->flush();
                        }
                        $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Liquidar($codigoMovimiento);
                    }
                    break;

                case "OpActualizarDetalles";
                    $strResultado = $this->GuardarCambios($arrControles);
                    if ($strResultado != "")
                        $objMensaje->Mensaje("error", $strResultado, $this);
                    else
                        $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Liquidar($codigoMovimiento);
                    break;

                case "OpCerrarDetalles";
                    if (count($arrSeleccionados) > 0) {
                        foreach ($arrSeleccionados AS $codigoMovimientoDetalle) {
                            $arMovimientoDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                            $arMovimientoDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($codigoMovimientoDetalle);
                            if ($arMovimientoDetalle->getEstadoCerrado() == 0) {
                                $arMovimientoDetalle->setEstadoCerrado(1);
                                $em->persist($arMovimientoDetalle);
                                $em->flush();
                            }
                        }
                    }
                    break;

                case "OpAgregarItem";
                    if ($arrControles['TxtCodigoItem'] != "") {
                        $arItem = new \zikmont\InventarioBundle\Entity\InvItem();
                        $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->findBy(array('codigoBarras' => $arrControles['TxtCodigoItem']));
                        //$arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->find($arItem[0]);
                        if (count($arItem) > 0) {
                            $arMovimiento = new \zikmont\InventarioBundle\Entity\InvMovimientos();
                            $arMovimiento = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->find($codigoMovimiento);

                            $arMovimientoDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                            $arMovimientoDetalle->setMovimientoRel($arMovimiento);
                            $arMovimientoDetalle->setCantidad(1);

                            if ($arMovimiento->getDocumentoRel()->getTipoValor() == 2)
                                $arMovimientoDetalle->setPrecio($em->getRepository('zikmontInventarioBundle:InvListasPreciosDetalles')->DevPrecio($arMovimiento->getCodigoTerceroFk(), $arItem[0]->getCodigoItemPk()));

                            if ($arMovimiento->getDocumentoRel()->getTipoValor() == 1)
                                $arMovimientoDetalle->setPrecio($em->getRepository('zikmontInventarioBundle:InvListasCostosDetalles')->DevCosto($arMovimiento->getCodigoTerceroFk(), $arItem[0]->getCodigoItemPk()));

                            $arMovimientoDetalle->setLoteFk("SL");
                            $arMovimientoDetalle->setFechaVencimiento(date_create('2020/12/30'));
                            $arMovimientoDetalle->setCodigoBodegaFk(1);

                            $arMovimientoDetalle->setItemMD($arItem[0]);
                            $arMovimientoDetalle->setPorcentajeIva($arItem[0]->getPorcentajeIva());
                            $em->persist($arMovimientoDetalle);
                            $em->flush();
                            if ($arMovimiento->getCodigoDocumentoTipoFk() == 4 && $arMovimiento->getDocumentoRel()->getOperacionInventario() == -1)
                                $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->EstableceLoteMovimientoDetalle($arMovimientoDetalle->getCodigoDetalleMovimientoPk());
                            $em->getRepository('zikmontInventarioBundle:InvMovimientos')->Liquidar($codigoMovimiento);
                        }
                    }
                    break;
            }
        }
        $arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->findBy(array('codigoMovimientoFk' => $codigoMovimiento));

        $arDocumento = new \zikmont\InventarioBundle\Entity\InvDocumentos();
        $arDocumento = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->find($arMovimiento->getCodigoDocumentoFk());
        $arMovimientosRetenciones = new \zikmont\InventarioBundle\Entity\InvMovimientosRetenciones();
        $arMovimientosRetenciones = $em->getRepository('zikmontInventarioBundle:InvMovimientosRetenciones')->findBy(array('codigoMovimientoFk' => $codigoMovimiento));

        return $this->render('zikmontInventarioBundle:Movimientos:detalle.html.twig', array('arMovimiento' => $arMovimiento,
                    'arMovimientosDetalle' => $arMovimientosDetalle,
                    'objformulario' => $objFormulario->createView(),
                    'arDocumento' => $arDocumento,
                    'arMovimientosRetenciones' => $arMovimientosRetenciones));
    }

    /**
     * Genera un  encabezado
     * @param integer $codigoDocumento
     * @return type
     */
    public function movimientoRapidoNuevoAction($codigoDocumento) {
        $em = $this->getDoctrine()->getEntityManager();
        $arConfiguraciones = new \zikmont\FrontEndBundle\Entity\GenConfiguraciones();
        $arConfiguraciones = $em->getRepository('zikmontFrontEndBundle:GenConfiguraciones')->find(1);
        $arTercero = new \zikmont\FrontEndBundle\Entity\GenTerceros();
        $arTercero = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->find($arConfiguraciones->getNitVentasMostrador());
        $arDocumento = new \zikmont\InventarioBundle\Entity\InvDocumentos();
        $arDocumento = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->find($codigoDocumento);
        $arMovimientoNuevo = new \zikmont\InventarioBundle\Entity\InvMovimientos();
        $arMovimientoNuevo->setTerceroRel($arTercero);
        $arMovimientoNuevo->setDocumentoRel($arDocumento);
        $arMovimientoNuevo->setDocumentoTipoRel($arDocumento->getDocumentoTipo());
        $arMovimientoNuevo->setFecha(date_create(date('Y-m-d H:i:s')));
        $em->persist($arMovimientoNuevo);
        $em->flush();
        return $this->redirect($this->generateUrl('movimientosdetalle', array('codigoMovimiento' => $arMovimientoNuevo->getCodigoMovimientoPk())));
    }

    /**
     * Guarda los cambios realizados en la tabla de los detalles de movimiento
     * @param array $arrDetalles Array con los controles de la vista
     */
    public function GuardarCambios($arrDetalles) {
        $em = $this->getDoctrine()->getEntityManager();
        $intIndice = 0;
        $boolValidado = "";
        if (isset($arrDetalles['LblCodigoDetalle'])) {
            if (count($arrDetalles['LblCodigoDetalle']) > 0) {
                //Validar las cantidades del documento enlace
                foreach ($arrDetalles['LblCodigoDetalle'] as $intCodigoDetalle) {
                    if ($boolValidado == "") {
                        $intNuevaCantidad = $arrDetalles['TxtCantidad'][$intIndice];
                        $arMovimientoDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                        $arMovimientoDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($intCodigoDetalle);
                        if ($arMovimientoDetalle->getCodigoDetalleMovimientoEnlace() != "") {
                            $arMovimientoDetalleEnlace = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                            $arMovimientoDetalleEnlace = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($arMovimientoDetalle->getCodigoDetalleMovimientoEnlace());
                            $intDiferenciaCantidades = $intNuevaCantidad - $arMovimientoDetalle->getCantidad();
                            $intCantidadPendienteEnlace = $arMovimientoDetalleEnlace->getCantidad() - $arMovimientoDetalleEnlace->getCantidadAfectada();
                            if ($intDiferenciaCantidades != 0) {
                                if ($intDiferenciaCantidades > $intCantidadPendienteEnlace) {
                                    $boolValidado = "La cantidad [" . $intNuevaCantidad . "] del detalle " . $arMovimientoDetalle->getCodigoDetalleMovimientoPk() . " es mayor a la cantidad pendiente [" . $intCantidadPendienteEnlace . "] del enlace " . $arMovimientoDetalleEnlace->getMovimientoRel()->getDocumentoRel()->getNombreDocumento() . " Nro. " . $arMovimientoDetalleEnlace->getMovimientoRel()->getNumeroMovimiento() . " detalle " . $arMovimientoDetalleEnlace->getCodigoDetalleMovimientoPk();
                                }
                            }
                        }
                    }
                    $intIndice++;
                }

                if ($boolValidado == "") {
                    $intIndice = 0;
                    foreach ($arrDetalles['LblCodigoDetalle'] as $intCodigoDetalle) {
                        $intNuevaCantidad = $arrDetalles['TxtCantidad'][$intIndice];
                        $arMovimientoDetalle = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                        $arMovimientoDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($intCodigoDetalle);
                        $intDiferenciaCantidades = $intNuevaCantidad - $arMovimientoDetalle->getCantidad();

                        if (isset($arrDetalles['TxtLote']))
                            $arMovimientoDetalle->setLoteFk($arrDetalles['TxtLote'][$intIndice]);

                        if (isset($arrDetalles['TxtVencimiento']))
                            $arMovimientoDetalle->setFechaVencimiento(date_create($arrDetalles['TxtVencimiento'][$intIndice]));

                        if (isset($arrDetalles['TxtBodega']))
                            $arMovimientoDetalle->setCodigoBodegaFk($arrDetalles['TxtBodega'][$intIndice]);

                        $arMovimientoDetalle->setCantidad($arrDetalles['TxtCantidad'][$intIndice]);
                        $arMovimientoDetalle->setPorcentajeDescuento($arrDetalles['TxtDescuento'][$intIndice]);

                        $arMovimientoDetalle->setPrecio($arrDetalles['TxtPrecio'][$intIndice]);
                        $em->persist($arMovimientoDetalle);
                        $em->flush();

                        if ($arMovimientoDetalle->getCodigoDetalleMovimientoEnlace() != "") {
                            $arMovimientoDetalleEnlace = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
                            $arMovimientoDetalleEnlace = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->find($arMovimientoDetalle->getCodigoDetalleMovimientoEnlace());
                            $arMovimientoDetalleEnlace->setCantidadAfectada($arMovimientoDetalleEnlace->getCantidadAfectada() + $intDiferenciaCantidades);
                            $em->persist($arMovimientoDetalleEnlace);
                            $em->flush();
                        }

                        $intIndice++;
                    }
                }
            }
        }
        return $boolValidado;
    }
}
