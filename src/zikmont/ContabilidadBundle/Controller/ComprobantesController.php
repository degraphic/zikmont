<?php

namespace zikmont\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class ComprobantesController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $arComprobantes = new \zikmont\ContabilidadBundle\Entity\CtbComprobantesContables();
        $arComprobantes = $em->getRepository('zikmontContabilidadBundle:CtbComprobantesContables')->findAll();
        return $this->render('zikmontContabilidadBundle:MaestrosCorregido/Comprobantes:listado.html.twig', array('arComprobantes' => $arComprobantes));
    }    
    
    public function nuevoAction($codigoComprobantePk = null) {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();                       
        
        if ($request->getMethod() == 'POST') {
            if (($request->request->get('TxtCodigoComprobante')))
                $arComprobante = $em->getRepository('zikmontContabilidadBundle:CtbComprobantesContables')->find($request->request->get('TxtCodigoComprobante'));
            else
                $arComprobante = new \zikmont\ContabilidadBundle\Entity\CtbComprobantesContables();                        
            $arComprobante->setNombreComprobanteContable($request->request->get('TxtNombreComprobante'));
            $em->persist($arComprobante);
            $em->flush();
            return $this->redirect($this->generateUrl('maestros_contabilidad_comprobantes'));            
        }        
        
        if ($codigoComprobantePk != null && $codigoComprobantePk != "")        
            $arComprobante = $em->getRepository('zikmontContabilidadBundle:CtbComprobantesContables')->find($codigoComprobantePk);        
        return $this->render('zikmontContabilidadBundle:MaestrosCorregido/Comprobantes:nuevo.html.twig', array('arComprobante' => $arComprobante));
    }    
}
