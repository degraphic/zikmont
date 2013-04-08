<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ConfiguracionesController extends Controller
{
    
    public function ConfiguracionesAction()
    {
        return $this->render('zikmontFrontEndBundle:Configuraciones:configuraciones.html.twig');
    }
}
