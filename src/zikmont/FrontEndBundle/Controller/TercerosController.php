<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class TercerosController extends Controller {

    /**
     * consulta todos los terceros de la base de datos
     * y lo muestra en un listado
     * @return type 
     */
    public function ListarTercerosAction() {
        $em = $this->getDoctrine()->getEntityManager();


        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            if ($request->request->get('TxtCodigoTercero') != "" && is_numeric($request->request->get('TxtCodigoTercero'))) {
                $arTerceros = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->findBy(array('codigoTerceroPk' => $request->request->get('TxtCodigoTercero')));
            } elseif ($request->request->get('TxtNombreTercero') != "") {
                $arTerceros = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->BuscarNombreTercero($request->request->get('TxtNombreTercero'));
            }
            // Todos los productos
            else
                $arTerceros = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->findAll();
        }
        // Todos los productos
        else
            $arTerceros = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->findAll();


        return $this->render('zikmontFrontEndBundle:Maestros/Terceros:listarTerceros.html.twig', array('arTerceros' => $arTerceros, 'ultimo_tercero' => $request->request->get('TxtNombreTercero'), 'ultimo_nit' => $request->request->get('TxtCodigoTercero')));
    }

    /**
     * Genera la plantilla de los datos del tercero sea para crear uno nuevo o para editar uno existente.
     * @param integer $codigoTerceroPk el codigo del tercero en caso de que se vaya a editar
     * @return plantilla 
     */
    public function cargarDatosTerceroAction($codigoTerceroPk = null) {
        $em = $this->getDoctrine()->getEntityManager();

        if ($codigoTerceroPk != null && $codigoTerceroPk != "")
            $arTercero = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->find($codigoTerceroPk);
        
        return $this->render('zikmontFrontEndBundle:Maestros/Terceros:detallesTercero.html.twig', array('arTercero' => $arTercero));
    }

    /**
     * Alamacena un nuevo tercero
     * @return type 
     */
    public function terceroNuevoAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $objMensaje = new GenerarMensajes();

        $arTercero = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->find($request->request->get('TxtCodigoTercero'));
        if (Count($arTercero) == 0)
            $boolEditar = false;
        else
            $boolEditar = true;

        if ($request->getMethod() == 'POST') {
            if ($boolEditar == false)
                $arTercero = new \zikmont\FrontEndBundle\Entity\GenTerceros();

            $arTercero->setCodigoTerceroPk($request->request->get('TxtCodigoTercero'));
            $arTercero->setNombreCortoTercero($request->request->get('TxtNombreCorto'));
            $arTercero->setNombres($request->request->get('TxtNombres'));
            $arTercero->setApellido1($request->request->get('TxtApellido1'));
            $arTercero->setApellido2($request->request->get('TxtApellido2'));
            $arTercero->setDireccion($request->request->get('TxtDireccion'));
            $arTercero->setTelefono($request->request->get('TxtTelefono'));
            $arTercero->setCelular($request->request->get('TxtCelular'));
            $arTercero->setFax($request->request->get('TxtFax'));
            $arTercero->setEmail($request->request->get('TxtEmail'));
            
            if($request->request->get('ChkRetefteVentas') == 'on' && $request->request->get('ChkRetefteVentas'))
                $arTercero->setRetencionFuenteVentas(1);
            else
                $arTercero->setRetencionFuenteVentas(0);
            
            if(($request->request->get('ChkAutoretenedor') == 'on') && $request->request->get('ChkAutoretenedor'))
                $arTercero->setAutoretenedor(1);
            else
                $arTercero->setAutoretenedor(0);
            
            if(($request->request->get('ChkRetefteSinBaseVentas') == 'on') && $request->request->get('ChkRetefteSinBaseVentas'))
                $arTercero->setRetencionFuenteVentasSinBase(1);
            else
                $arTercero->setRetencionFuenteVentasSinBase(0);
            
            $arTercero->setCodigoListaPrecioFk($request->request->get('CboListaPrecios'));
            $arTercero->setCodigoListaCostoFk($request->request->get('CboListaCostos'));

            $em->persist($arTercero);
            $em->flush();
            if ($boolEditar == false) {
                $objMensaje->Mensaje('completado', "El tercero ha sido creado", $this);
            } else {
                $objMensaje->Mensaje('completado', "Se han actualizado los datos del tercero", $this);
            }
        }

        return $this->redirect($this->generateUrl('listarterceros'));
    }

    /**
     *
     * @param type $valor
     * @return type 
     * */
    public static function object2array($valor) {
        $dato = NULL;
        if (!(is_array($valor) || is_object($valor))) { //si no es un objeto ni un array
            $dato = $valor; //lo deja
        } else { //si es un objeto
            foreach ($valor as $key => $valor1) { //lo conteo
                $dato[$key] = self::object2array($valor1); //
            }
        }
        return $dato;
    }

    /**
     * Busca un tercero por nombre o nit segun sea escrito en un textbox
     * @return boolean|\Symfony\Component\HttpFoundation\Response 
     */
    public function buscarTercerosAction() {
        try {
            $em = $this->getDoctrine()->getEntityManager();

            $strTercero = $_GET["q"];

            $Terceros = new \zikmont\FrontEndBundle\Entity\GenTerceros();

            if ($this->getRequest()->isXmlHttpRequest())
                $Terceros = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->BuscarNombreTercero($strTercero);

            foreach ($Terceros as $key => $value) {
                $array[] = $value->getCodigoTerceroPk() . "-" . trim($value->getNombreCortoTercero());
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
