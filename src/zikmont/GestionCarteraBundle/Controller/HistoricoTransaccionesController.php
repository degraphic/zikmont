<?php

namespace zikmont\GestionCarteraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HistoricoTransaccionesController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('zikmontGestionCarteraBundle:Consultas:historicoTransacciones.html.twig');
    }
    
    
}
