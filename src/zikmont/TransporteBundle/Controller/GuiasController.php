<?php

namespace zikmont\TransporteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class GuiasController extends Controller
{
    
    public function listaAction()
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $arGuias = $em->getRepository('zikmontTransporteBundle:TptGuias')->findAll();
        return $this->render('zikmontTransporteBundle:Guias:lista.html.twig', array('arGuias' => $arGuias));
    }
    
    /**
     * Detalle de la guia
     */
    public function guiaDetalleAction($codigoGuia) {
        $request = $this->getRequest();
        //$arMovimientosDetallesFrm = new \zikmont\InventarioBundle\Entity\InvMovimientosDetalles();
        
        $em = $this->getDoctrine()->getEntityManager();
        //$arMovimientosDetalle = $em->getRepository('zikmontInventarioBundle:InvMovimientosDetalles')->findBy(array('codigoMovimientoFk' => $codigoMovimiento));
        $arGuia = new \zikmont\TransporteBundle\Entity\TptGuias();
        $arGuia = $em->getRepository('zikmontTransporteBundle:TptGuias')->find($codigoGuia);

        return $this->render('zikmontTransporteBundle:Guias:detalle.html.twig', array('arGuia' => $arGuia));
    }    
}
