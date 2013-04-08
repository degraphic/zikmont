<?php

namespace zikmont\GestionCarteraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PagosRealizadosController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('zikmontGestionCarteraBundle:Consultas:pagosRealizados.html.twig');
    }
    
   
    
}
