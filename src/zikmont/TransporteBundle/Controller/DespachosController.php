<?php

namespace zikmont\TransporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DespachosController extends Controller
{
    
    public function listaAction()
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $arDespachos = $em->getRepository('zikmontTransporteBundle:Despachos')->findAll();
        return $this->render('zikmontTransporteBundle:Despachos:lista.html.twig', array('arDespachos' => $arDespachos));
    }
}
