<?php

namespace zikmont\GestionCarteraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('zikmontGestionCarteraBundle:Default:index.html.twig', array('name' => $name));
    }
}
