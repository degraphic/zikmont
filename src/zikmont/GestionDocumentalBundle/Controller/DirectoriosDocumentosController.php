<?php

namespace zikmont\GestionDocumentalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use zikmont\MensajesBundle\GenerarMensajes;

class DirectoriosDocumentosController extends Controller {

    public function indexAction() {
        return $this->render('zikmontGestionDocumentalBundle:Consultar:consultarDocumentos.html.twig');
    }
    
    /**
     * Consulta los subdirectorios de un directorio enviado por parametro
     * @param integer $intIdDirectorio el codigo del directorio a consultar
     * @param boolean $boolConsulta Determina si se va a consultar los directorios o si se va a seleccionar uno para digitalizacion
     * @return pagina
     */
    public function AbrirDirectorioAction($codigoDirectorioPk=null,$Consulta=true,$nombre_div=null)
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $arDirectorio = new \zikmont\GestionDocumentalBundle\Entity\DirectoriosDocumentos();
        
        if(is_numeric($codigoDirectorioPk)) {
            $arDirectorio = $em->getRepository('zikmontGestionDocumentalBundle:DirectoriosDocumentos')->DevSubDirectorios($codigoDirectorioPk);
        }
        else  {
            $arDirectorio = $em->getRepository('zikmontGestionDocumentalBundle:DirectoriosDocumentos')->findBy(array('codigoDirectorioPadreFk'=>NULL));
        }
        
        return $this->render('zikmontGestionDocumentalBundle:Plantillas:directorios.html.twig', array('arDirectorios' => $arDirectorio,'boolConsulta'=>$Consulta,'nombre_div'=>$nombre_div));
    }

    /**
     * Genera la plantilla de los datos del tercero sea para crear uno nuevo o para editar uno existente.
     * @param integer $codigoTerceroPk el codigo del tercero en caso de que se vaya a editar
     * @return plantilla 
     */
    public function cargarDatosDirectorioAction($codigoDirectorioPk = null) {
        $em = $this->getDoctrine()->getEntityManager();

        if ($codigoDirectorioPk != null && $codigoDirectorioPk != "")
            $arDirectorio = $em->getRepository('zikmontGestionDocumentalBundle:DirectoriosDocumentos')->find($codigoDirectorioPk);

        return $this->render('zikmontGestionDocumentalBundle:Directorios:detallesDirectorio.html.twig', array('arDirectorio' => $arDirectorio));
    }

    public function cargarDirectoriosAction($codigoDirectorioPk = null) {
        $em = $this->getDoctrine()->getEntityManager();

        $_SESSION['Contruct'] = "";
        $this->listar_directorios_ruta("/home/desarrollo2/Documents/documentos/");

        $Construct = $_SESSION['Contruct'];

        return $this->render('zikmontGestionDocumentalBundle:Plantillas:contenidoDirectorio.html.twig');
    }

    public function listar_directorios_ruta($ruta) {
        $e = "";

        if (!isset($_SESSION['Contruct']))
            $_SESSION['Contruct'] = "";

        if (is_dir($ruta)) {
            $_SESSION['Contruct'] .= "<li><span class=\"folder\">$ruta</span>
                             <ul>";

            if ($dh = opendir($ruta)) {
                while (($file = readdir($dh)) !== false) {
//                    echo "<script>alert('$file');</script>";

                    if (!is_dir($ruta . $file) && file_exists($ruta . $file) && $file != "." && $file != "..") {
                        $_SESSION['Contruct'] .= "<li><span class=\"file\">$file</span></li>";
                    }

                    //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio 
                    //mostraría tanto archivos como directorios 
                    //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file); 
                    if (is_dir($ruta . $file) && $file != "." && $file != "..") {
                        //solo si el archivo es un directorio, distinto que "." y ".." 
                        $this->listar_directorios_ruta($ruta . $file . "/");
                    }
                }
                $_SESSION['Contruct'] .= "</ul>";
                closedir($dh);
            }
            else
                $_SESSION['Contruct'] .= "</ul>";
        }

        $e = "";
    }

   /**
     * Crea un nuevo registro de directorio en la entidad directorios_documentos
     * y crea un archivo dentro del directorio seleccionado por el usuario
     * @return type
     */
    public function directorioDocumentosNuevoAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $objMensaje = new GenerarMensajes();

        $arConfiguracion = new \zikmont\GestionDocumentalBundle\Entity\ConfiguracionDirectoriosDocumentos();
        $arConfiguracion = $em->getRepository('zikmontGestionDocumentalBundle:ConfiguracionDirectoriosDocumentos')->find(1);

        if (Count($arConfiguracion) == 0) {
            $objMensaje->Mensaje('error', "No se ha configurado una ruta para almacenamiento", $this);
            return $this->redirect($this->generateUrl('gestiondocumental'));
        }
        // Verifica si el directorio tiene permisos de escritura
        else {
            if (!is_writable($arConfiguracion->getRutaDirectorioDocumentos())) {
                $objMensaje->Mensaje('error', "El directorio seleccionado no tiene permisos de escritura", $this);
                return $this->redirect($this->generateUrl('gestiondocumental'));
            }
        }

        if ($request->getMethod() == 'POST') {
            $arDirectorio = new \zikmont\GestionDocumentalBundle\Entity\DirectoriosDocumentos();
            $arDirectorio->setNombreDirectorio($request->request->get('TxtNombreDirectorio'));
            $arDirectorio->setFechaCreacionDirectorio(date_create(date('Y-m-d H:i:s')));
            $arDirectorio->setCodigoDirectorioPadreFk(NULL);
            $arDirectorio->setNombreUsuario(NULL);
            $arDirectorio->setInactivo(0);
            $arDirectorio->setComentarios($request->request->get('TxtComentarios'));

            $em->persist($arDirectorio);

            $em->flush();
            $objMensaje->Mensaje('completado', "El directorio ha sido creado", $this);
            $this->CrearDirectorio($arConfiguracion->getRutaDirectorioDocumentos(), $arDirectorio->getCodigoDirectorioPk(), $request->request->get('TxtNombreDirectorio'));
        
        }

        return $this->redirect($this->generateUrl('gestiondocumental'));
    }

    /**
     * Crea un directori y le asigna los permisos 777 con chmod
     * @return boolean
     */
    private function CrearDirectorio($strDireccion, $intIdDirectorio, $strNombreDirectorio) {
//        $objMensaje = new GenerarMensajes();

        try {
            if (is_writable($strDireccion)) {
                if (mkdir($strDireccion . DIRECTORY_SEPARATOR . $intIdDirectorio, 777) && chmod($strDireccion . DIRECTORY_SEPARATOR . $intIdDirectorio, 777)) {
                    chmod($strDireccion . DIRECTORY_SEPARATOR . $intIdDirectorio, 777) && chmod($strDireccion . DIRECTORY_SEPARATOR . $intIdDirectorio, 777);
                    return true;
                }
                else {
                    if (is_dir($strDireccion . DIRECTORY_SEPARATOR . $intIdDirectorio)) {
                        unlink($strDireccion . DIRECTORY_SEPARATOR . $intIdDirectorio);
                        return false;
                    }
                }
            }
//            else {
//                $objMensaje->Mensaje('error', "El directorio seleccionado no tiene permisos de escritura", $this);
//            }
        } catch (Excepcion $e) {
            return false;
        }
    }

}


