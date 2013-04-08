<?php

namespace zikmont\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class ActivosFijosController extends Controller {
    
    public function listaAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();                
        $arCtbActivosFijos = new \zikmont\ContabilidadBundle\Entity\CtbActivosFijos();
        if ($request->getMethod() == 'POST') {
            $objControles = $request->request->all();
            $arrSeleccionados = $request->request->get('ChkSeleccionar');            
            switch ($request->request->get('OpSubmit')) {
                case "OpEliminar";
                    break;
                case "OpBuscar";                    
                    break;                                        
            }
            
        }
        $arCtbActivosFijos = $em->getRepository('zikmontContabilidadBundle:CtbActivosFijos')->findAll();
        return $this->render('zikmontContabilidadBundle:ActivosFijos:lista.html.twig', array(
            'arCtbActivosFijos' => $arCtbActivosFijos,
            ));
    }
    
    public function nuevoAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        if ($request->getMethod() == 'POST') {
            $objControles = $request->request->all();            
            switch ($request->request->get('OpSubmit')) {
                case "OpGuardar";
                    $arCtbActivoFijoTipo = new \zikmont\ContabilidadBundle\Entity\CtbActivosFijosTipos();
                    $arCtbActivoFijoTipo = $em->getRepository('zikmontContabilidadBundle:CtbActivosFijosTipos')->find($objControles['CboActivoFijoTipo']);
                    $arCtbActivoFijoNuevo = new \zikmont\ContabilidadBundle\Entity\CtbActivosFijos();
                    $arCtbActivoFijoNuevo->setNombre($objControles['TxtNombre']);
                    $arCtbActivoFijoNuevo->setCtbActivoFijoTipoRel($arCtbActivoFijoTipo);
                    $em->persist($arCtbActivoFijoNuevo);
                    $em->flush();
                    return $this->redirect($this->generateUrl('contabilidad_activos_fijos'));                    
                    break;                                        
            }
            
        }        
        
        $arCtbActivosFijosTipos = new \zikmont\ContabilidadBundle\Entity\CtbActivosFijosTipos();
        $arCtbActivosFijosTipos = $em->getRepository('zikmontContabilidadBundle:CtbActivosFijosTipos')->findAll();        
        return $this->render('zikmontContabilidadBundle:ActivosFijos:nuevo.html.twig', array('arCtbActivosFijosTipos' => $arCtbActivosFijosTipos));        
    }

}
