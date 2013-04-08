<?php

namespace zikmont\GestionDocumentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BuscarDocumentosController extends Controller {

    public function indexAction() {
        return $this->render('zikmontGestionDocumentalBundle:Consultar:consultarDocumentos.html.twig');
    }

}
