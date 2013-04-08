<?php

namespace zikmont\ImpresionesBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SoporteImpresionController extends Controller {
    public function DevEm() {
        $em = $this->getDoctrine()->getEntityManager();
        return $em;
    }
}

?>
