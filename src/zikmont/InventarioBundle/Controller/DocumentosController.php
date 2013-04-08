<?php

namespace zikmont\InventarioBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DocumentosController extends Controller
{       
    public function listaAction($codigoTipoDocumento) {        
        $em = $this->getDoctrine()->getEntityManager();
        $arDocumentos = new \zikmont\InventarioBundle\Entity\InvDocumentos();
        $arDocumentos = $em->getRepository('zikmontInventarioBundle:InvDocumentos')->findBy(array('codigoDocumentoTipoFk' => $codigoTipoDocumento), array('codigoDocumentoSubtipoFk' => 'ASC'));        
        //En caso de que solo exista un documento
        if(count($arDocumentos) <= 1)
            return $this->redirect($this->generateUrl('inventario_movimientos_lista', array('codigoDocumento' => $arDocumentos[0]->getCodigoDocumentoPk())));
            
        return $this->render('zikmontInventarioBundle:Documentos:lista.html.twig', array('arDocumentos' => $arDocumentos, 'intCodigoSubtipo' => ''));        
    }        
}
