<?php

namespace zikmont\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class PlanUnicoCuentasController extends Controller {

    public function listarAction() {
        $em = $this->getDoctrine()->getEntityManager();

        return $this->render('zikmontContabilidadBundle:Maestros/Cuentas:listado.html.twig');
    }    
}
