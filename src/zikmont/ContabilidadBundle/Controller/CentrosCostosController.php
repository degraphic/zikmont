<?php

namespace zikmont\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class CentrosCostosController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $arCentrosCostos = new \zikmont\ContabilidadBundle\Entity\CtbCentrosCostos();
        $arCentrosCostos = $em->getRepository('zikmontContabilidadBundle:CtbCentrosCostos')->findAll();
        return $this->render('zikmontContabilidadBundle:MaestrosCorregido/CentrosCostos:listado.html.twig', array('arCentrosCostos' => $arCentrosCostos));
    }    
    
    public function nuevoAction($codigoCentroCostosPk = null) {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();                       
        
        if ($request->getMethod() == 'POST') {
            if (($request->request->get('TxtCodigoCentroCostos')))
                $arCentroCostos = $em->getRepository('zikmontContabilidadBundle:CtbCentrosCostos')->find($request->request->get('TxtCodigoCentroCostos'));
            else
                $arCentroCostos = new \zikmont\ContabilidadBundle\Entity\CtbCentrosCostos();                        
            $arCentroCostos->setNombreCentroCostos($request->request->get('TxtNombreCentroCostos'));
            $em->persist($arCentroCostos);
            $em->flush();
            return $this->redirect($this->generateUrl('maestros_contabilidad_centros_costos'));            
        }        
        
        if ($codigoCentroCostosPk != null && $codigoCentroCostosPk != "")        
            $arCentroCostos = $em->getRepository('zikmontContabilidadBundle:CtbCentrosCostos')->find($codigoCentroCostosPk);        
        return $this->render('zikmontContabilidadBundle:MaestrosCorregido/CentrosCostos:nuevo.html.twig', array('arCentroCostos' => $arCentroCostos));
    }    
}
