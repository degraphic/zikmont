<?php

namespace zikmont\GestionDocumentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class ConfiguracionDirectoriosDocumentosController extends Controller {

    /**
     * Genera la plantilla de los datos del tercero sea para crear uno nuevo o para editar uno existente.
     * @param integer $codigoTerceroPk el codigo del tercero en caso de que se vaya a editar
     * @return plantilla 
     */
    public function cargarConfiguracionDocumentosAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $arConfiguracion = new \zikmont\GestionDocumentalBundle\Entity\ConfiguracionDirectoriosDocumentos();
        $arConfiguracion = $em->getRepository('zikmontGestionDocumentalBundle:ConfiguracionDirectoriosDocumentos')->find(1);

        return $this->render('zikmontGestionDocumentalBundle:Directorios:configuracionesDirectorios.html.twig', array('arConfiguracion' => $arConfiguracion));
    }

    /**
     * Permite ingresar o actualizar las rutas fisicas dentro del servidor
     * donde quedaran almacenados los documentos digitalizados.
     * @return
     */
    public function guardarRutasDocumentosAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $objMensaje = new GenerarMensajes();
        if ($request->getMethod() == 'POST') {
            
            $arConfiguracionDirectorio = $em->getRepository('zikmontGestionDocumentalBundle:ConfiguracionDirectoriosDocumentos')->find(1);
            if (Count($arConfiguracionDirectorio) == 0)
                $arConfiguracionDirectorio = new \zikmont\GestionDocumentalBundle\Entity\ConfiguracionDirectoriosDocumentos();
            
            $arConfiguracionDirectorio->setRutaDirectorioDocumentos($request->request->get('TxtDirectorioDocumentos'));
            $arConfiguracionDirectorio->setRutaDirectorioDocumentosContables($request->request->get('TxtDirectorioDocumentosOperativos'));
            $arConfiguracionDirectorio->setRutaDirectorioDocumentosOperativos($request->request->get('TxtDirectorioDocumentosProductos'));
            $arConfiguracionDirectorio->setRutaDirectorioDocumentosProductos($request->request->get('TxtDirectorioDocumentosTerceros'));
            $arConfiguracionDirectorio->setRutaDirectorioDocumentosTerceros($request->request->get('TxtDirectorioDocumentosContables'));
            try {
                $em->persist($arConfiguracionDirectorio);
                $em->flush();
                $objMensaje->Mensaje('completado', "Se ha almacenado la configuración", $this);
            } catch (Exception $e) {
                $objMensaje->Mensaje('error', "Se produjo un error</br>" . $e->getMessage(), $this);
            }
        }
        return $this->redirect($this->generateUrl('gestiondocumental'));
    }
}
