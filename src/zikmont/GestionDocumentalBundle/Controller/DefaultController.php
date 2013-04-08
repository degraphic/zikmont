<?php

namespace zikmont\GestionDocumentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $arDirectorios = new \zikmont\GestionDocumentalBundle\Entity\DirectoriosDocumentos();
        $arDirectorios = $em->getRepository('zikmontGestionDocumentalBundle:DirectoriosDocumentos')->findAll();

        $arDocumentos = new \zikmont\GestionDocumentalBundle\Entity\DocumentosDigitalizacion();
        $arDocumentos = $em->getRepository('zikmontGestionDocumentalBundle:DocumentosDigitalizacion')->findAll();
        
        $arUnidadesDocumentales = new \zikmont\GestionDocumentalBundle\Entity\UnidadesDocumentales();
        $arUnidadesDocumentales = $em->getRepository('zikmontGestionDocumentalBundle:UnidadesDocumentales')->findAll();
        
        $arTiposArchivos= new \zikmont\GestionDocumentalBundle\Entity\TiposArchivos();
        $arTiposArchivos = $em->getRepository('zikmontGestionDocumentalBundle:TiposArchivos')->findAll();
        
        $arDisposicionesFinales= new \zikmont\GestionDocumentalBundle\Entity\DisposicionesFinales();
        $arDisposicionesFinales = $em->getRepository('zikmontGestionDocumentalBundle:DisposicionesFinales')->findAll();

        return $this->render('zikmontGestionDocumentalBundle:Default:index.html.twig', array('arDirectorios' => $arDirectorios, 'arDocumentos' => $arDocumentos, 'arUnidadesDocumentales' => $arUnidadesDocumentales, 'arTiposArchivos' => $arTiposArchivos, 'arDisposicionesFinales' => $arDisposicionesFinales));
    }

}
