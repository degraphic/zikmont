<?php

namespace zikmont\GestionDocumentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class DocumentosDigitalizacionController extends Controller {

    
    /**
     * Genera la plantilla de los datos del documento sea para crear uno nuevo o para editar uno existente.
     * @param integer $codigoDocumentPk el codigo del documento en caso de que se vaya a editar
     * @return plantilla 
     */
    public function cargarDocumentoAction($codigoDocumentoPk = null) {

        $em = $this->getDoctrine()->getEntityManager();
        
        $arDocumento = new \zikmont\GestionDocumentalBundle\Entity\DocumentosDigitalizacion();

        if ($codigoDocumentoPk != null && $codigoDocumentoPk != "")
            $arDocumento = $em->getRepository('zikmontGestionDocumentalBundle:DocumentosDigitalizacion')->find($codigoDocumentoPk);


        return $this->render('zikmontGestionDocumentalBundle:Plantillas:Documentos.html.twig', array('arDocumento' => $arDocumento));
    }

    /**
     * Alamacena en base de datos el registro de un nuevo documento
     * @return type
     */ 
    public function DocumentosNuevoAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $objMensaje = new GenerarMensajes();

        if ($request->getMethod() == 'POST') {
            try {
                $arDocumento = new \zikmont\GestionDocumentalBundle\Entity\DocumentosDigitalizacion();
                $arDocumento->setNombreDocumento($request->request->get('TxtNombreDocumento'));
                $arDocumento->setFechaCreado(date_create(date('Y-m-d H:i:s')));
                $arDocumento->setInactivo(0);
                $arDocumento->setNombreUsuario('1');


                $em->persist($arDocumento);

                $em->flush();
                $objMensaje->Mensaje('completado', "El documento ha sido creado", $this);
            } catch (Exception $e) {
                $objMensaje->Mensaje('error', "No se pudo crear el nuevo documento", $this);
            }
        }

        return $this->redirect($this->generateUrl('gestiondocumental'));
    }

}

