<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class ItemsController extends Controller {

    /**
     * consulta todos los item de la base de datos
     * y lo muestra en un listado
     * @return type 
     */
    public function listarItemAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $request = $this->getRequest();

        $arMarcas = $em->getRepository('zikmontFrontEndBundle:Marcas')->findAll();

        if ($request->getMethod() == 'POST') {
            if ($request->request->get('TxtCodigoItem') != "" && is_numeric($request->request->get('TxtCodigoItem'))) {
                $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->findBy(array('codigoItemPk' => $request->request->get('TxtCodigoItem')));
            } elseif ($request->request->get('TxtDescripcionItem') != "") {
                $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->BuscarDescripcionItem($request->request->get('TxtDescripcionItem'));
            }
            elseif($request->request->get('TxtCodigoBarras') != "") {
                $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->BuscarCodigoBarras($request->request->get('TxtCodigoBarras'));
            }
            // Todos los productos
            else
                $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->findAll();
        }
        // Todos los productos
        else
            $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->findAll();


        return $this->render('zikmontFrontEndBundle:Maestros/Items:listarItems.html.twig', array('arItems' => $arItem, 'ultimo_item' => $request->request->get('TxtCodigoItem'), 'ultima_descripcion' => $request->request->get('TxtDescripcionItem'), 'arMarcas' => $arMarcas,'codigo_barras'=>$request->request->get('TxtCodigoBarras')));
    }
    
    
    public function cargarDatosItemAction($codigoItemPk = null) {
        $em = $this->getDoctrine()->getEntityManager();
        
        if ($codigoItemPk != null && $codigoItemPk != "")        
            $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->find($codigoItemPk);
        
        $arMarcas = $em->getRepository('zikmontFrontEndBundle:Marcas')->findAll();

        return $this->render('zikmontFrontEndBundle:Maestros/Items:detallesItem.html.twig', array('arItem' => $arItem,'arMarcas'=>$arMarcas));
    }

    /**
     * Alamacena un nuevo tercero
     * @return type 
     */
    public function itemNuevoAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $objMensaje = new GenerarMensajes();

        if (($request->request->get('TxtCodigoItem')))
            $arItem = $em->getRepository('zikmontInventarioBundle:InvItem')->find($request->request->get('TxtCodigoItem'));

        if ($request->getMethod() == 'POST') {
            if (!($request->request->get('TxtCodigoItem')))
                $arItem = new \zikmont\InventarioBundle\Entity\InvItem();

            $arItem->setDescripcion($request->request->get('TxtDescripcion'));
            $arItem->setCodigoEAN($request->request->get('TxtCodigoEAN'));
            $arItem->setCodigoBarras($request->request->get('TxtCodigoBarra'));
            $arItem->setPorcentajeIva($request->request->get('TxtPorcentajeIva'));
            $arItem->setCuentaIngreso($request->request->get('TxtCuentaIngreso'));
            $arItem->setCuentaDevolucionVentas($request->request->get('TxtCuentaDevolucionVentas'));
            $arItem->setCuentaCompras($request->request->get('TxtCuentaCompras'));
            $arItem->setCuentaDevolucionCompras($request->request->get('TxtCuentaDevolucionCompras'));
            $arItem->setCuentaCosto($request->request->get('TxtCuentaCosto'));
            $arItem->setCuentaInventario($request->request->get('TxtCuentaInventario'));
            $arItem->setCostoPredeterminado($request->request->get('TxtCostoPredeterminado'));
            $arItem->setPrecioPredeterminado($request->request->get('TxtPrecioPredeterminado'));
            
            
            $arMarca = new \zikmont\FrontEndBundle\Entity\Marcas();
            $arMarca = $em->getRepository('zikmontFrontEndBundle:Marcas')->find($request->request->get('CboMarcas'));
            

            if ($request->request->get('CboMarcas') != "") {
                $arItem->setCodigoMarcaFK($request->request->get('CboMarcas'));
                $arItem->setMarcasRel($arMarca);
            }
            else {
                $objMensaje->Mensaje('error', "Debe seleccionar una marca para el producto.", $this);
            }

            $em->persist($arItem);
            $em->flush();
            if (!($request->request->get('TxtCodigoItem')))
                $objMensaje->Mensaje('completado', "El producto ha sido creado", $this);
            else {
                $objMensaje->Mensaje('completado', "Se han actualizado los datos del producto", $this);
            }
        }

        return $this->redirect($this->generateUrl('listaritems'));
    }
    
    /**
     * Busca un tercero por nombre o nit segun sea escrito en un textbox
     * @return boolean|\Symfony\Component\HttpFoundation\Response 
     */
    public function buscarItemsAction() {
        try {
            $em = $this->getDoctrine()->getEntityManager();

            $strItem = $_GET["q"];

            $arItems = new \zikmont\InventarioBundle\Entity\InvItem();

            if ($this->getRequest()->isXmlHttpRequest())
                $arItems = $em->getRepository('zikmontInventarioBundle:InvItem')->BuscarDescripcionItem($strItem);

            foreach ($arItems as $key => $value) {
                $array[] = $value->getCodigoItemPk()."-".trim($value->getDescripcion());
            }

            if (!is_array($array)) {
                return false;
            }
            $construct = "";
            
            foreach ($array as $value) {

                // Format the value:
                if (is_array($value)) {
                    $value = array_to_json($value);
                } else if (!is_numeric($value) || is_string($value)) {
                    $value = $value;
                }

                $construct .= $value . "\n";
            }

            $construct = str_replace('Array', '', $construct);

            return new \Symfony\Component\HttpFoundation\Response((string) $construct);

        } catch (Exception $e) {
            
        }
    }
    

}
