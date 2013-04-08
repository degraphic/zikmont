<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MovimientosNuevoController extends Controller {

    public function movimientosNuevoAction($codigoDocumento) {
        return $this->render('zikmontFrontEndBundle:Plantillas:movimientosNuevo.html.twig', array('codigoDocumento' => $codigoDocumento));
    }

}
