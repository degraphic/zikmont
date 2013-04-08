<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller {
    public function DocumentosAction() {                                       
        return $this->render('zikmontFrontEndBundle:Plantillas:menu.html.twig');        
    } 
}
