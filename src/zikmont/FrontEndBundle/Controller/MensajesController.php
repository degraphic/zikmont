<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use mensajeszk\MensajesBundle\GenerarMensajes;

class MensajesController extends Controller {
//    public function mostrarAction($intTipo,$strTitulo,$strMensaje) {  
//        $Mensaje = new \mensajeszk\MensajesBundle\GenerarMensajes();
//        $Mensaje->Mensaje($intTipo, $strTitulo, $strMensaje);
//    }     
    public function mostrarAction() {  
        return $this->render('zikmontFrontEndBundle:Plantillas:mensajes.html.twig');       
    }     
}
