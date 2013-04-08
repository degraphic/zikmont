<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appprodUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = urldecode($pathinfo);

        // zikmontFrontEndBundle_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'zikmontFrontEndBundle_homepage');
            }
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\DefaultController::indexAction',  '_route' => 'zikmontFrontEndBundle_homepage',);
        }

        // documentoslista
        if ($pathinfo === '/documentoslista') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\DocumentosController::documentoslistaAction',  '_route' => 'documentoslista',);
        }

        // movimientoslista
        if (0 === strpos($pathinfo, '/movimientoslista') && preg_match('#^/movimientoslista/(?P<codigoDocumento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientoslistaAction',)), array('_route' => 'movimientoslista'));
        }

        // movimientosdetalle
        if (0 === strpos($pathinfo, '/movimientosdetalle') && preg_match('#^/movimientosdetalle/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosdetalleAction',)), array('_route' => 'movimientosdetalle'));
        }

        // movimientosautorizar
        if (0 === strpos($pathinfo, '/movimientosautorizar') && preg_match('#^/movimientosautorizar/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosautorizarAction',)), array('_route' => 'movimientosautorizar'));
        }

        // movimientosdesautorizar
        if (0 === strpos($pathinfo, '/movimientosdesautorizar') && preg_match('#^/movimientosdesautorizar/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosdesautorizarAction',)), array('_route' => 'movimientosdesautorizar'));
        }

        // movimientosaccionitems
        if (0 === strpos($pathinfo, '/movimientosaccionitems') && preg_match('#^/movimientosaccionitems/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosdetalleaccionitemsAction',)), array('_route' => 'movimientosaccionitems'));
        }

        // movimientosnuevo
        if ($pathinfo === '/movimientosnuevo') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosnuevoAction',  '_route' => 'movimientosnuevo',);
        }

        // movimientosimprimir
        if (0 === strpos($pathinfo, '/movimientosimprimir') && preg_match('#^/movimientosimprimir/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosimprimirAction',)), array('_route' => 'movimientosimprimir'));
        }

        // movimientosagregaritem
        if (0 === strpos($pathinfo, '/movimientosagregaritem') && preg_match('#^/movimientosagregaritem/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::ItemsListaAction',)), array('_route' => 'movimientosagregaritem'));
        }

        // movimientosagregaritemdocumento
        if (0 === strpos($pathinfo, '/movimientosagregaritemdocumento') && preg_match('#^/movimientosagregaritemdocumento/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::DocumentosControlAction',)), array('_route' => 'movimientosagregaritemdocumento'));
        }

        // movimientosagregaritemdetalle
        if (0 === strpos($pathinfo, '/movimientosagregaritemdetalle') && preg_match('#^/movimientosagregaritemdetalle/(?P<codigoMovimiento>[^/]+?)/(?P<codigoMovimientoOrigen>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::DocumentosControlDetalleAction',)), array('_route' => 'movimientosagregaritemdetalle'));
        }

        // configuraciones
        if ($pathinfo === '/configuraciones') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ConfiguracionesController::configuracionesAction',  '_route' => 'configuraciones',);
        }

        // utilidades
        if ($pathinfo === '/utilidades') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\UtilidadesController::indexAction',  '_route' => 'utilidades',);
        }

        // regenerarkardex
        if ($pathinfo === '/regenerarkardex') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\UtilidadesController::regenerarkardexAction',  '_route' => 'regenerarkardex',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
