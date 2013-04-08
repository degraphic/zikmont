<?php

namespace zikmont\GestionDocumentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller {
    public function DocumentosAction() {                                       
        return $this->render('zikmontGestionDocumentalBundle:Plantillas:menu.html.twig');        
    } 
}
