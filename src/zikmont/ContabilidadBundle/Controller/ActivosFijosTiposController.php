<?php

namespace zikmont\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class ActivosFijosTiposController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $arCtbActivosFijosTipos = new \zikmont\ContabilidadBundle\Entity\CtbActivosFijosTipos();        
        $arCtbActivosFijosTipos = $em->getRepository('zikmontContabilidadBundle:CtbActivosFijosTipos')->findAll();
        return $this->render('zikmontContabilidadBundle:MaestrosCorregido/ActivosFijosTipos:listado.html.twig', array('arCtbActivosFijosTipos' => $arCtbActivosFijosTipos));
    }    
    
    public function nuevoAction($codigoActivoFijoTipoPk = null) {
        $em = $this->getDoctrine()->getEntityManager();
        $request = $this->getRequest();                       
        
        if ($request->getMethod() == 'POST') {
            if (($request->request->get('TxtCodigoActivoFijoTipo')))
                $arCtbActivoFijoTipo = $em->getRepository('zikmontContabilidadBundle:CtbActivosFijosTipos')->find($request->request->get('TxtCodigoActivoFijoTipo'));
            else                
                $arCtbActivoFijoTipo = new \zikmont\ContabilidadBundle\Entity\CtbActivosFijosTipos();                        
            
            $arCtbActivoFijoTipo->setNombre($request->request->get('TxtNombre'));
            $em->persist($arCtbActivoFijoTipo);
            $em->flush();
            return $this->redirect($this->generateUrl('maestros_contabilidad_activos_fijos_tipos'));            
        }        
        
        if ($codigoActivoFijoTipoPk != null && $codigoActivoFijoTipoPk != "")        
            $arCtbActivoFijoTipo = $em->getRepository('zikmontContabilidadBundle:CtbActivosFijosTipos')->find($codigoActivoFijoTipoPk);        
        return $this->render('zikmontContabilidadBundle:MaestrosCorregido/ActivosFijosTipos:nuevo.html.twig', array('arCtbActivoFijoTipo' => $arCtbActivoFijoTipo));
    }    
}
