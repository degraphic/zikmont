<?php

namespace zikmont\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;
use \FPDF;

class ControlController extends Controller
{               
    public function retencionesAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();        
        if ($request->getMethod() == 'POST') {
            $intCodigoControlRetenciones = $request->request->get('OpSubmit');                                              
            $arCtbControlRetencionesAct = new \zikmont\ContabilidadBundle\Entity\CtbControlRetenciones();
            $arCtbControlRetencionesAct = $em->getRepository('zikmontContabilidadBundle:CtbControlRetenciones')->find($intCodigoControlRetenciones);
            $arSegUsuario = $this->get('security.context')->getToken()->getUser();
            $arCtbControlRetencionesAct->setUsuarioRecibeRel($arSegUsuario);
            $arCtbControlRetencionesAct->setEstadoRecibido(1);
            $arCtbControlRetencionesAct->setFechaRecibido(date_create(date('Y-m-d H:i:s')));
            $em->persist($arSegUsuario);
            $em->flush();
        } 
        
        $arCtbControlRetenciones = new \zikmont\ContabilidadBundle\Entity\CtbControlRetenciones();
        $arCtbControlRetenciones = $em->getRepository('zikmontContabilidadBundle:CtbControlRetenciones')->DevControlRetenciones();

        return $this->render('zikmontContabilidadBundle:Control/Retenciones:retenciones.html.twig', array('arCtbControlRetenciones' => $arCtbControlRetenciones));
    }   
    
    public function retencionesNuevoComentarioAction($CodigoControlRetenciones) {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();        
        if ($request->getMethod() == 'POST') {
            $arCtbControlRetenciones = new \zikmont\ContabilidadBundle\Entity\CtbControlRetenciones();
            $arCtbControlRetenciones = $em->getRepository('zikmontContabilidadBundle:CtbControlRetenciones')->find($CodigoControlRetenciones); 
            $arCtbControlRetenciones->setFechaUltimoComentario(date_create(date('Y-m-d H:i:s')));
            $arCtbControlRetencionesComentario = new \zikmont\ContabilidadBundle\Entity\CtbControlRetencionesComentarios();
            $arCtbControlRetencionesComentario->setCtbControlRetencionesRel($arCtbControlRetenciones);
            $arCtbControlRetencionesComentario->setComentario($request->request->get('TxtComentario'));
            $arCtbControlRetencionesComentario->setUsuarioRel($this->get('security.context')->getToken()->getUser());
            $arCtbControlRetencionesComentario->setFecha(date_create(date('Y-m-d H:i:s')));
            $em->persist($arCtbControlRetencionesComentario);
            $em->flush();
            $em->persist($arCtbControlRetenciones);
            $em->flush();          
            return $this->redirect($this->generateUrl('contabilidad_control_retenciones'));
        }
        return $this->render('zikmontContabilidadBundle:Control/Retenciones:retencionesNuevoComentario.html.twig', array('codigoControlRetenciones' => $CodigoControlRetenciones));
    }
}
