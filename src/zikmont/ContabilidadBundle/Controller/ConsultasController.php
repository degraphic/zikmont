<?php

namespace zikmont\ContabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\ImpresionesBundle\Reportes;


class ConsultasController extends Controller {

    public function movimientosAction() {
        $request = $this->getRequest();
        $objFunciones = new \zikmont\ExternasBundle\FuncionesZikmont\FuncionesZikmont();
        $em = $this->getDoctrine()->getEntityManager();
        $arCtbMovimientos = new \zikmont\ContabilidadBundle\Entity\CtbMovimientos();          
        $boolBuscar = false;
        $objControles = array('TxtNumero' => '', 'CboComprobantes' => '', 'TxtFechaDesde' => '', 'TxtFechaHasta' => ''); 
        if ($request->getMethod() == 'POST') {
            $objControles = $request->request->all();            
            switch ($request->request->get('OpSubmit')) {
                case "OpExportar";
                    $arCtbMovimientos = $em->getRepository('zikmontContabilidadBundle:CtbMovimientos')->DevMovimientos($objControles['TxtNumero'], $objControles['CboComprobantes'], "", "", 0);
                    $Datos2 = array();
                    foreach ($arCtbMovimientos as $arCtbMovimientos) {
                        $Datos2[] = (array('IdMov' => $arCtbMovimientos->getCodigoMovimientoContablePk(),
                            'Item' => $arCtbMovimientos->getCodigoMovimientoContablePk(),
                            'Lote' => $arCtbMovimientos->getCodigoMovimientoContablePk()));
                    }
                    //$Datos = $objFunciones->object2array($Datos2);                        
                    $objFunciones->createExcel('MovimientosContables.xls', $Datos2);    
                    exit;                    
                    break;
                case "OpImprimir";                                       
                    $arCtbMovimientos = $em->getRepository('zikmontContabilidadBundle:CtbMovimientos')->DevMovimientos($objControles['TxtNumero'], $objControles['CboComprobantes'], "", "", 0);
                    $objReporte = new Reportes\ReporteMovimientosContables();                       
                    $objReporte->Generar($em, $arCtbMovimientos);
                    break;
                
                case "OpBuscar";                                       
                    $arCtbMovimientos = $em->getRepository('zikmontContabilidadBundle:CtbMovimientos')->DevMovimientos($objControles['TxtNumero'], $objControles['CboComprobantes'], "", "", 0);
                    $boolBuscar = true;
                    break;                
            }
        }
        if($boolBuscar == false)
            $arCtbMovimientos = $em->getRepository('zikmontContabilidadBundle:CtbMovimientos')->findAll();
        $arComprobantes = new \zikmont\ContabilidadBundle\Entity\CtbComprobantesContables();
        $arComprobantes = $em->getRepository('zikmontContabilidadBundle:CtbComprobantesContables')->findAll();
        return $this->render('zikmontContabilidadBundle:Consultas/Movimientos:movimientos.html.twig', array(
            'arCtbMovimientos' => $arCtbMovimientos, 
            'arComprobantes' => $arComprobantes,
            'objControles' => $objControles));
    }
    
    public function movimientosHistoricoAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $arCtbMovimientosHistorico = new \zikmont\ContabilidadBundle\Entity\CtbMovimientosHistorico();
        $arCtbMovimientosHistorico = $em->getRepository('zikmontContabilidadBundle:CtbMovimientosHistorico')->findAll();
        if ($request->getMethod() == 'POST') {
        }
        return $this->render('zikmontContabilidadBundle:Consultas/Movimientos:movimientosHistorico.html.twig', array('arMovimientosContablesHistorico' => $arCtbMovimientosHistorico));
    }    
    
    public function movimientosResumenAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $arCtbMovimientosResumen = new \zikmont\ContabilidadBundle\Entity\CtbMovimientosResumen();
        $arCierresMesContabilidad = new \zikmont\ContabilidadBundle\Entity\CtbCierresMes();
        $arCierresMesContabilidad = $em->getRepository('zikmontContabilidadBundle:CtbCierresMes')->findBy(array('estadoCerrado' => 1));
        $intCodigoCierre = "";
        if ($request->getMethod() == 'POST') {
            $arrControles = $request->request->All();
            $intCodigoCierre = $arrControles['CboCierres'];           
            $arCtbMovimientosResumen = $em->getRepository('zikmontContabilidadBundle:CtbMovimientosResumen')->findBy(array('codigoCierreMesContabilidadFk' => $intCodigoCierre));            
        }
        else 
            $arCtbMovimientosResumen = $em->getRepository('zikmontContabilidadBundle:CtbMovimientosResumen')->findAll();
        
        return $this->render('zikmontContabilidadBundle:Consultas/Movimientos:movimientosResumen.html.twig', array('arMovimientosContablesResumen' => $arCtbMovimientosResumen, 'arCierresMesContabilidad' => $arCierresMesContabilidad, 'intCodigoCierre' => $intCodigoCierre));
    }    


}
