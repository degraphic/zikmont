<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;


/**
 * appdevUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRouteNames = array(
       '_welcome' => true,
       '_demo_login' => true,
       '_security_check' => true,
       '_demo_logout' => true,
       'acme_demo_secured_hello' => true,
       '_demo_secured_hello' => true,
       '_demo_secured_hello_admin' => true,
       '_demo' => true,
       '_demo_hello' => true,
       '_demo_contact' => true,
       '_wdt' => true,
       '_profiler_search' => true,
       '_profiler_purge' => true,
       '_profiler_import' => true,
       '_profiler_export' => true,
       '_profiler_search_results' => true,
       '_profiler' => true,
       '_configurator_home' => true,
       '_configurator_step' => true,
       '_configurator_final' => true,
       'carteraGestionBundle_homepage' => true,
       'zikmontFrontEndBundle_homepage' => true,
       'topmenudetalles' => true,
       'documentoslista' => true,
       'movimientoslista' => true,
       'movimientosdetalle' => true,
       'movimientosautorizar' => true,
       'movimientosdesautorizar' => true,
       'movimientosaccionitems' => true,
       'movimientosaccionencabezado' => true,
       'movimientosnuevo' => true,
       'movimientosmostrarnuevo' => true,
       'movimientosimprimir' => true,
       'movimientosagregaritem' => true,
       'movimientosbuscaritem' => true,
       'movimientosagregarlote' => true,
       'movimientosagregaritemdocumento' => true,
       'movimientosagregaritemdetalle' => true,
       'movimientospendientes' => true,
       'movimientospendientesdetalle' => true,
       'configuraciones' => true,
       'utilidades' => true,
       'regenerarkardex' => true,
       'consultakardex' => true,
       'consultadisponibles' => true,
       'contabilidadcontabilizar' => true,
       'contabilidadresumen' => true,
       'contabilidadcontrolcertificadosretenciones' => true,
       'contabilidadbalanceprueba' => true,
       'informecarteraestadocuenta' => true,
       'informetesoreriaestadocuenta' => true,
       'informecontabilidadretenciones' => true,
       'informeinventarioexistencias' => true,
       'asientoslista' => true,
       'asientosautorizar' => true,
       'asientosdesautorizar' => true,
       'asientosdetalle' => true,
       'asientosaccionitems' => true,
       'asientosagregarcuentapagar' => true,
       'asientosagregarcuentacobrar' => true,
       'gestioncartera' => true,
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

    private function get_welcomeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/bienvenida',  ),));
    }

    private function get_demo_loginRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/login',  ),));
    }

    private function get_security_checkRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/login_check',  ),));
    }

    private function get_demo_logoutRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/logout',  ),));
    }

    private function getacme_demo_secured_helloRouteInfo()
    {
        return array(array (), array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello',  ),));
    }

    private function get_demo_secured_hello_adminRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/secured/hello/admin',  ),));
    }

    private function get_demoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/',  ),));
    }

    private function get_demo_helloRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/demo/hello',  ),));
    }

    private function get_demo_contactRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/demo/contact',  ),));
    }

    private function get_wdtRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_wdt',  ),));
    }

    private function get_profiler_searchRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/search',  ),));
    }

    private function get_profiler_purgeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/purge',  ),));
    }

    private function get_profiler_importRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_profiler/import',  ),));
    }

    private function get_profiler_exportRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '.txt',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/\\.]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler/export',  ),));
    }

    private function get_profiler_search_resultsRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/search/results',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  2 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_profilerRouteInfo()
    {
        return array(array (  0 => 'token',), array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'token',  ),  1 =>   array (    0 => 'text',    1 => '/_profiler',  ),));
    }

    private function get_configurator_homeRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/',  ),));
    }

    private function get_configurator_stepRouteInfo()
    {
        return array(array (  0 => 'index',), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'index',  ),  1 =>   array (    0 => 'text',    1 => '/_configurator/step',  ),));
    }

    private function get_configurator_finalRouteInfo()
    {
        return array(array (), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/_configurator/final',  ),));
    }

    private function getcarteraGestionBundle_homepageRouteInfo()
    {
        return array(array (  0 => 'name',), array (  '_controller' => 'cartera\\GestionBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'name',  ),  1 =>   array (    0 => 'text',    1 => '/hello',  ),));
    }

    private function getzikmontFrontEndBundle_homepageRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\DefaultController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/',  ),));
    }

    private function gettopmenudetallesRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\TopMenuDetallesController::documentosAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/tomenudetalles',  ),));
    }

    private function getdocumentoslistaRouteInfo()
    {
        return array(array (  0 => 'codigoTipoDocumento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\DocumentosController::documentoslistaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoTipoDocumento',  ),  1 =>   array (    0 => 'text',    1 => '/documentoslista',  ),));
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

    private function getmovimientosaccionencabezadoRouteInfo()
    {
        return array(array (  0 => 'codigoDocumento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosaccionencabezadoAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoDocumento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosaccionencabezado',  ),));
    }

    private function getmovimientosnuevoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosnuevoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/movimientosnuevo',  ),));
    }

    private function getmovimientosmostrarnuevoRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosmostrarnuevoAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/movimientosnuevo',  ),));
    }

    private function getmovimientosimprimirRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosimprimirAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosimprimir',  ),));
    }

    private function getmovimientosagregaritemRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::ItemsListaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosagregaritem',  ),));
    }

    private function getmovimientosbuscaritemRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::BuscarItemAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosbuscaritem',  ),));
    }

    private function getmovimientosagregarloteRouteInfo()
    {
        return array(array (  0 => 'codigoMovimientoDetalle',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarLoteController::LotesListaAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimientoDetalle',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosagregarlote',  ),));
    }

    private function getmovimientosagregaritemdocumentoRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::DocumentosControlAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientosagregaritemdocumento',  ),));
    }

    private function getmovimientosagregaritemdetalleRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',  1 => 'codigoMovimientoOrigen',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::DocumentosControlDetalleAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimientoOrigen',  ),  1 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  2 =>   array (    0 => 'text',    1 => '/movimientosagregaritemdetalle',  ),));
    }

    private function getmovimientospendientesRouteInfo()
    {
        return array(array (  0 => 'codigoDocumentoTipo',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientospendientesAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoDocumentoTipo',  ),  1 =>   array (    0 => 'text',    1 => '/movimientospendientes',  ),));
    }

    private function getmovimientospendientesdetalleRouteInfo()
    {
        return array(array (  0 => 'codigoMovimiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientospendientesdetallesAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoMovimiento',  ),  1 =>   array (    0 => 'text',    1 => '/movimientospendientesdetalle',  ),));
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

    private function getconsultakardexRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ConsultasController::kardexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/consultakardex',  ),));
    }

    private function getconsultadisponiblesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ConsultasController::disponiblesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/consultadisponibles',  ),));
    }

    private function getcontabilidadcontabilizarRouteInfo()
    {
        return array(array (  0 => 'codigoDocumentoTipo',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ContabilidadController::movimientoscontabilizarlistaAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoDocumentoTipo',  ),  1 =>   array (    0 => 'text',    1 => '/contabilidadcontabilizar',  ),));
    }

    private function getcontabilidadresumenRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ContabilidadController::resumenAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/contabilidadresumen',  ),));
    }

    private function getcontabilidadcontrolcertificadosretencionesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ContabilidadController::certificadosretencionesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/contabilidadcontrolcertificadosretenciones',  ),));
    }

    private function getcontabilidadbalancepruebaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ContabilidadController::balancepruebaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/contabilidadbalanceprueba',  ),));
    }

    private function getinformecarteraestadocuentaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\InformesController::carteraestadocuentaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/informecarteraestadocuenta',  ),));
    }

    private function getinformetesoreriaestadocuentaRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\InformesController::tesoreriaestadocuentaAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/informetesoreriaestadocuenta',  ),));
    }

    private function getinformecontabilidadretencionesRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\InformesController::contabilidadretencionesAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/informecontabilidadretenciones',  ),));
    }

    private function getinformeinventarioexistenciasRouteInfo()
    {
        return array(array (), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\InformesController::inventarioexistenciasAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/informeinventarioexistencias',  ),));
    }

    private function getasientoslistaRouteInfo()
    {
        return array(array (  0 => 'codigoAsientoTipo',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientoslistaAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoAsientoTipo',  ),  1 =>   array (    0 => 'text',    1 => '/asientoslista',  ),));
    }

    private function getasientosautorizarRouteInfo()
    {
        return array(array (  0 => 'codigoAsiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosautorizarAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoAsiento',  ),  1 =>   array (    0 => 'text',    1 => '/asientosautorizar',  ),));
    }

    private function getasientosdesautorizarRouteInfo()
    {
        return array(array (  0 => 'codigoAsiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosdesautorizarAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoAsiento',  ),  1 =>   array (    0 => 'text',    1 => '/asientosdesautorizar',  ),));
    }

    private function getasientosdetalleRouteInfo()
    {
        return array(array (  0 => 'codigoAsiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosdetalleAction',), array (  'id' => '\\d+',), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoAsiento',  ),  1 =>   array (    0 => 'text',    1 => '/asientosdetalle',  ),));
    }

    private function getasientosaccionitemsRouteInfo()
    {
        return array(array (  0 => 'codigoAsiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosdetalleaccionitemsAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoAsiento',  ),  1 =>   array (    0 => 'text',    1 => '/asientosaccionitems',  ),));
    }

    private function getasientosagregarcuentapagarRouteInfo()
    {
        return array(array (  0 => 'codigoAsiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosagregarcuentapagarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoAsiento',  ),  1 =>   array (    0 => 'text',    1 => '/asientosagregarcuentapagar',  ),));
    }

    private function getasientosagregarcuentacobrarRouteInfo()
    {
        return array(array (  0 => 'codigoAsiento',), array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosagregarcuentacobrarAction',), array (), array (  0 =>   array (    0 => 'variable',    1 => '/',    2 => '[^/]+?',    3 => 'codigoAsiento',  ),  1 =>   array (    0 => 'text',    1 => '/asientosagregarcuentacobrar',  ),));
    }

    private function getgestioncarteraRouteInfo()
    {
        return array(array (), array (  '_controller' => 'cartera\\GestionBundle\\Controller\\GestionController::indexAction',), array (), array (  0 =>   array (    0 => 'text',    1 => '/gestioncartera',  ),));
    }
}
