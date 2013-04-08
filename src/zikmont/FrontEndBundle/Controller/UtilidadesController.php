<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UtilidadesController extends Controller {
    public function indexAction() {

        return $this->render('zikmontFrontEndBundle:Utilidades:index.html.twig');
    }   
}
