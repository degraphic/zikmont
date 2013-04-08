<?php

namespace zikmont\GestionCarteraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class EstadoCuentaController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        
        $intCodigoDocumento = "";
        $intCodigoTercero = "";
        $arMovimientos = "";
        
        if ($request->getMethod() == 'POST') {
            
             $arrControles = $request->request->All();
             
            // Documento
            $intCodigoDocumento = $arrControles['CboDocumentos'];
            $arrayTercero = explode("-", $arrControles['TxtCodigoTercero']);
            $intCodigoTercero = $arrayTercero[0];
            
            if(is_numeric($intCodigoTercero))
            {
                $arMovimientos = $em->getRepository('zikmontFrontEndBundle:CuentasCobrar')->DevCuentasCobrar($intCodigoTercero);
            }
        }
        
        $arDocumentos = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->DevDocumentos();
        return $this->render('zikmontGestionCarteraBundle:Consultas:estadoCuenta.html.twig',array('arDocumentos' => $arDocumentos,'arMovimientos' => $arMovimientos,'codigo_tercero' => $intCodigoTercero,'codigo_documento' => $intCodigoDocumento,));
    }
    
    public function consultaEstadoCuentaAction()
    {
        return $this->render('zikmontGestionCarteraBundle:Consultas:pagosRealizados.html.twig');
    }
    
}
