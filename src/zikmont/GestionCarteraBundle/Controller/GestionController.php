<?php

namespace zikmont\GestionCarteraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class GestionController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('zikmontGestionCarteraBundle:Gestion:gestion.html.twig');
    }
    
    
}
