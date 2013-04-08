<?php

namespace zikmont\PresupuestosCivilesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('zikmontPresupuestosCivilesBundle:Default:index.html.twig', array('name' => $name));
    }
}
