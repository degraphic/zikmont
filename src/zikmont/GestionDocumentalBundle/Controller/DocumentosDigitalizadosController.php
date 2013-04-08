<?php

namespace zikmont\GestionDocumentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class DocumentosDigitalizadosController extends Controller {

    /**
     * Alamacena en base de datos el registro de un nuevo documento
     * @return type
     */ 
    public function DigitalizarAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $objMensaje = new GenerarMensajes();
        $Configuracion = new \zikmont\FrontEndBundle\Entity\GenConfiguraciones();

        if ($request->getMethod() == 'POST') {
            try {
                $arDocumento = new \zikmont\GestionDocumentalBundle\Entity\DocumentosDigitalizados();
                $arDocumento->setNombreUsuario(Null);
                $arDocumento->setFechaDigitalizacion(date_create(date('Y-m-d H:i:s')));
                $arDocumento->setCodigoDocumentoFk($request->request->get('CboDocumentos'));
                $arDocumento->setCodigoArchivo($em->getRepository('zikmontGestionDocumentalBundle:ConfiguracionDirectorios')->DevCodigoConsecutivoArchivo());
                $arDocumento->setCodigoDirectorio(0);
                $arDocumento->setFechaDocumento(date_create($request->request->get('TxtFechaDesde')));
                $arDocumento->setNumeroDocumento($request->request->get('TxtNumeroDocumento'));
                $arDocumento->setNumeroRadicado($request->request->get('TxtNroRadicado'));

                if($request->request->get('RdbDocumentoEnviado'))
                    $arDocumento->setDocumentoEnviado(1);
                
                if($request->request->get('RdbDocumentoInterno'))
                    $arDocumento->setDocumentoInterno(1);
                
                if($request->request->get('RdbDocumentoRecibido'))
                    $arDocumento->setDocumentoRecibido(1);
                
                $Remitente = explode("-",$request->request->get('TxtRemitente'));
                if(Count($Remitente) > 1)
                    $arDocumento->setRemitenteDocumento($Remitente[1]);
                else
                    $arDocumento->setRemitenteDocumento($request->request->get('TxtRemitente'));
                
                $Destinatario = explode("-",$request->request->get('TxtDestinatario'));
                if(Count($Destinatario) > 1)
                    $arDocumento->setDestinatarioDocumento($Destinatario[1]);
                else
                    $arDocumento->setDestinatarioDocumento($request->request->get('TxtDestinatario'));
                
                $arDocumento->setNombreContacto($request->request->get('TxtNmContacto'));
                $arDocumento->setCargoContacto($request->request->get('TxtCargoContacto'));
                $arDocumento->setCodigoTipoArchivoFk($request->request->get('CboTiposArchivos'));
                $arDocumento->setCodigoDisposicionFinalFk($request->request->get('CboDisposicionesFinales'));
                $arDocumento->setCodigoUnidadDocumentalFk($request->request->get('CboUnidadesDocumentales'));
                $arDocumento->setComentarios($request->request->get('TxtComentarios'));

                $em->persist($arDocumento);

                $em->flush();
                $objMensaje->Mensaje('completado', "El documento ha sido digitalizado", $this);
            } catch (Exception $e) {
                $objMensaje->Mensaje('error', "No se pudo digitalizar el documento" . $e->getMessage(), $this);
            }
        }

        return $this->redirect($this->generateUrl('gestiondocumental'));
    }
    
}

