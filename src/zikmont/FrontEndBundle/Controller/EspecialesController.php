<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class EspecialesController extends Controller {

    /**
     * Busca un tercero por nombre o nit segun sea escrito en un textbox
     * @return boolean|\Symfony\Component\HttpFoundation\Response 
     */
    public function buscarTercerosAction() {
        try {
            $em = $this->getDoctrine()->getEntityManager();

            $strTercero = $_GET["q"];

            $Terceros = new \zikmont\FrontEndBundle\Entity\GenTerceros();
            $mm = $this->getRequest()->isXmlHttpRequest();
            if ($this->getRequest()->isXmlHttpRequest())
                $Terceros = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->BuscarNombreTercero($strTercero);

            foreach ($Terceros as $key => $value) {
                $array[] = $value->getCodigoTerceroPk() . "-" . trim($value->getNombreCortoTercero());
            }
            
            //Falta controlar el error si no devuelve 
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
    
    /**
     * Busca un tercero por nombre o nit segun sea escrito en un textbox
     * @return boolean|\Symfony\Component\HttpFoundation\Response 
     */
    public function buscarDireccionesAction() {
        try {
            $em = $this->getDoctrine()->getEntityManager();

            $strTercero = $_GET["q"];

            $strTercero = explode("-", $strTercero = $_GET["q"]);

            $strTercero = $strTercero[0];

            $arDirecciones = new \zikmont\FrontEndBundle\Entity\GenTercerosDirecciones();

            $arrayDirecciones = array();

            if ($this->getRequest()->isXmlHttpRequest())
                $arDirecciones = $em->getRepository('zikmontFrontEndBundle:GenTercerosDirecciones')->DevDireccionesTercero($strTercero);

            foreach ($arDirecciones as $key) {
                $arrayDirecciones[] = array('codigo' => $key->getCodigoDireccionPk(), 'direccion' => $key->getNombreDireccion());
            }

            $strHtml = "";

            foreach ($arrayDirecciones as $optionValue) {
                $intCodigo = $optionValue['codigo'];
                $strDireccion = $optionValue['direccion'];
                $strHtml .="<option value='$intCodigo'>" . $strDireccion;
            }

            return new \Symfony\Component\HttpFoundation\Response($strHtml);
        } catch (Exception $e) {
            
        }
    }    

}
