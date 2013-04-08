<?php

namespace zikmont\FrontEndBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InformesController extends Controller {
    
    public function carteraEstadoCuentaAction() {        
        $em = $this->getDoctrine()->getEntityManager(); 
        $arCuentasCobrar = $em->getRepository('zikmontFrontEndBundle:CuentasCobrar')->DevCuentasCobrar();                
        return $this->render('zikmontFrontEndBundle:Informes/Cartera:estadoCuenta.html.twig', array('arCuentasCobrar' => $arCuentasCobrar));
    }    
    
    public function tesoreriaEstadoCuentaAction() {        
        $em = $this->getDoctrine()->getEntityManager(); 
        $arCuentasPagar = $em->getRepository('zikmontFrontEndBundle:CuentasPagar')->DevCuentasPagar();                
        return $this->render('zikmontFrontEndBundle:Informes/Tesoreria:estadoCuenta.html.twig', array('arCuentasPagar' => $arCuentasPagar));
    }     
    
    public function contabilidadRetencionesAction() {        
        $em = $this->getDoctrine()->getEntityManager(); 
        $arCuentasPagar = $em->getRepository('zikmontFrontEndBundle:CuentasPagar')->DevCuentasPagar();                
        return $this->render('zikmontFrontEndBundle:Informes/Contabilidad:retenciones.html.twig', array('arCuentasPagar' => $arCuentasPagar));
    }  

    public function comercialVentasAction() {       
        $em = $this->getDoctrine()->getEntityManager();
        $arMovimientos = $em->getRepository('zikmontInventarioBundle:InvMovimientos')->DevMovimientosFacturacionResumidoAnnioMes();
        return $this->render('zikmontFrontEndBundle:Informes/Comercial:ventas.html.twig', array('arMovimientos' => $arMovimientos));        
    }     
    
    public function generalesEstadoGeneralAction() {       
        $em = $this->getDoctrine()->getEntityManager();        
        return $this->render('zikmontFrontEndBundle:Informes/General:estadoGeneral.html.twig');        
    }    
}
