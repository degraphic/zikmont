<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appprodUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appprodUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       'zikmontFrontEndBundle_homepage' => true,
       'documentoslista' => true,
       'movimientoslista' => true,
       'movimientosdetalle' => true,
       'movimientosautorizar' => true,
       'movimientosdesautorizar' => true,
       'movimientosaccionitems' => true,
       'movimientosnuevo' => true,
       'movimientosimprimir' => true,
       'movimientosagregaritem' => true,
       'movimientosagregaritemdocumento' => true,
       'movimientosagregaritemdetalle' => true,
       'configuraciones' => true,
       'utilidades' => true,
       'regenerarkardex' => true,
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function generate($name, $parameters = array(), $absolute = false)
    {
        if (!isset(self::$declaredRouteNames[$name])) {
            throw new RouteNotFoundException(sprintf('Route "%s" does not exist.', $name));
        }

        $escapedName = str_replace('.', '__', $name);

        list($variables, $defaults, $requirements, $tokens) = $this->{'get'.$escapedName.'RouteInfo'}();

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $absolute);
    }

    private function getzikmontFrontEndBundle_homepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function getdocumentoslistaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\DocumentosController::documentoslistaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/documentoslista',  ),));
    }

    private function getmovimientoslistaRouteInfo()
    {
        return array(array (  0 => 'codigoDocumento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientoslistaAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoDocumento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientoslista',  ),));
    }

    private function getmovimientosdetalleRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosdetalleAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosdetalle',  ),));
    }

    private function getmovimientosautorizarRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosautorizarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosautorizar',  ),));
    }

    private function getmovimientosdesautorizarRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosdesautorizarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosdesautorizar',  ),));
    }

    private function getmovimientosaccionitemsRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosdetalleaccionitemsAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosaccionitems',  ),));
    }

    private function getmovimientosnuevoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosnuevoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/movimientosnuevo',  ),));
    }

    private function getmovimientosimprimirRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosimprimirAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosimprimir',  ),));
    }

    private function getmovimientosagregaritemRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::ItemsListaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosagregaritem',  ),));
    }

    private function getmovimientosagregaritemdocumentoRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::DocumentosControlAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosagregaritemdocumento',  ),));
    }

    private function getmovimientosagregaritemdetalleRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',  1 => 'codigoMovimientoOrigen',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::DocumentosControlDetalleAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimientoOrigen',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  2 =>   array (    0 => 'text',    1 => '/movimientosagregaritemdetalle',  ),));
    }

    private function getconfiguracionesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ConfiguracionesController::configuracionesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/configuraciones',  ),));
    }

    private function getutilidadesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\UtilidadesController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/utilidades',  ),));
    }

    private function getregenerarkardexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\UtilidadesController::regenerarkardexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/regenerarkardex',  ),));
    }
}
