<?php

namespace zikmont\MensajesBundle;

use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Description of GenerarMensajes
 *
 * @author zikmont
 */
class GenerarMensajes extends ContainerAware {

    protected $_tipo;
    protected $_mensaje;
    protected $_titulo;
    protected $_vista;

    /**
     * Construye los parametros requeridos para generar un mensaje
     * @param string $strTipo El tipo de mensaje a generar  se debe enviar en minuscula <br> error, informacion, completado
     * @param string $strMensaje El mensaje que se mostrara
     * @param string $vista la vista donde se mostrara el mensaje
     */
    public function Mensaje($strTipo, $strMensaje, $vista) {
        $this->set_tipo($strTipo);
        $this->set_mensaje($strMensaje);
        $this->set_vista($vista);
        
        if($vista->container->get('request')->isXmlHttpRequest())
            $vista->container->get('session')->setFlash($this->get_tipo(), $this->get_mensaje());
        else
            $vista->get('session')->setFlash($this->get_tipo(), $this->get_mensaje());
    }

    public function set_tipo($strTipo) {
        $this->_tipo = $strTipo;
    }

    public function set_mensaje($strMensaje) {
        $this->_mensaje = $strMensaje;
    }
    
    public function set_vista($vista) {
        $this->_vista = $vista;
    }

    public function get_tipo() {
        return $this->_tipo;
    }

    public function get_vista() {
        return $this->_vista;
    }
    
    public function get_mensaje() {
        return $this->_mensaje;
    }
}
?>

