<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class DireccionesController extends Controller {

    /**
     * consulta todos los terceros de la base de datos
     * y lo muestra en un listado
     * @return type 
     */
    public function ListarDireccionesAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $arDirecciones = $em->getRepository('zikmontFrontEndBundle:Direcciones')->findAll();

        return $this->render('zikmontFrontEndBundle:Maestros/Terceros/Direcciones:listarDirecciones.html.twig', array('arDirecciones' => $arDirecciones));
    }

    /**
     * Genera la plantilla de los datos de las direcciones de envio sea para crear uno nuevo o para editar uno existente.
     * @param integer $codigoDireccionPk el codigo de la direccion de envio en caso de que se vaya a editar
     * @return plantilla 
     */
    public function cargarDatosDireccionAction($codigoDireccionPk = null) {
        $em = $this->getDoctrine()->getEntityManager();

        if ($codigoDireccionPk != null && $codigoDireccionPk != "")
            $arDireccion = $em->getRepository('zikmontFrontEndBundle:Direcciones')->find($codigoDireccionPk);
        
        $result = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->BuscarTerceros();

        return $this->render('zikmontFrontEndBundle:Maestros/Terceros/Direcciones:detallesDireccion.html.twig', array('arDireccion' => $arDireccion,'Result' => $result));
    }

    /**
     * Alamacena un nuevo tercero
     * @return type 
     */
    public function direccionNuevaAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $objMensaje = new GenerarMensajes();

        $arDireccion = $em->getRepository('zikmontFrontEndBundle:Direcciones')->find($request->request->get('TxtCodigoDireccion'));
        if (Count($arDireccion) == 0)
            $boolEditar = false;
        else
            $boolEditar = true;

        if ($request->getMethod() == 'POST') {
            if ($boolEditar == false)
                $arDireccion = new \zikmont\FrontEndBundle\Entity\Direcciones();

            $codigoTercero = explode("-", $request->request->get('TxtCodigoTercero'));
            $arTercero = $em->getRepository('zikmontFrontEndBundle:GenTerceros')->find($codigoTercero[0]);

            $arDireccion->setTercerosRel($arTercero);
            $arDireccion->setNombreDireccion($request->request->get('TxtNombreDireccion'));
            $arDireccion->setDireccion($request->request->get('TxtDireccion'));
            $arDireccion->setContacto($request->request->get('TxtContacto'));
            $arDireccion->setTelefono($request->request->get('TxtTelefono'));
            $arDireccion->setEmail($request->request->get('TxtEmail'));

            $em->persist($arDireccion);
            $em->flush();
            if ($boolEditar == false)
                $objMensaje->Mensaje('completado', "La dirección ha sido creado", $this);
            else
                $objMensaje->Mensaje('completado', "Se han actualizado los datos de la dirección", $this);
        }

        return $this->redirect($this->generateUrl('listardirecciones'));
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



}
