<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // _welcome
        if ($pathinfo === '/bienvenida') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        // _demo_login
        if ($pathinfo === '/demo/secured/login') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
        }

        // _security_check
        if ($pathinfo === '/demo/secured/login_check') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
        }

        // _demo_logout
        if ($pathinfo === '/demo/secured/logout') {
            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
        }

        // acme_demo_secured_hello
        if ($pathinfo === '/demo/secured/hello') {
            return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
        }

        // _demo_secured_hello
        if (0 === strpos($pathinfo, '/demo/secured/hello') && preg_match('#^/demo/secured/hello/(?P<name>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',)), array('_route' => '_demo_secured_hello'));
        }

        // _demo_secured_hello_admin
        if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',)), array('_route' => '_demo_secured_hello_admin'));
        }

        if (0 === strpos($pathinfo, '/demo')) {
            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',)), array('_route' => '_demo_hello'));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        // _wdt
        if (preg_match('#^/_wdt/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+?)\\.txt$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)/search/results$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+?)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // carteraGestionBundle_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'cartera\\GestionBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'carteraGestionBundle_homepage'));
        }

        // zikmontFrontEndBundle_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'zikmontFrontEndBundle_homepage');
            }
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\DefaultController::indexAction',  '_route' => 'zikmontFrontEndBundle_homepage',);
        }

        // topmenudetalles
        if (0 === strpos($pathinfo, '/tomenudetalles') && preg_match('#^/tomenudetalles/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\TopMenuDetallesController::documentosAction',)), array('_route' => 'topmenudetalles'));
        }

        // documentoslista
        if (0 === strpos($pathinfo, '/documentoslista') && preg_match('#^/documentoslista/(?P<codigoTipoDocumento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\DocumentosController::documentoslistaAction',)), array('_route' => 'documentoslista'));
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

        // movimientosaccionencabezado
        if (0 === strpos($pathinfo, '/movimientosaccionencabezado') && preg_match('#^/movimientosaccionencabezado/(?P<codigoDocumento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosaccionencabezadoAction',)), array('_route' => 'movimientosaccionencabezado'));
        }

        // movimientosnuevo
        if ($pathinfo === '/movimientosnuevo') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosnuevoAction',  '_route' => 'movimientosnuevo',);
        }

        // movimientosmostrarnuevo
        if ($pathinfo === '/movimientosnuevo') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosmostrarnuevoAction',  '_route' => 'movimientosmostrarnuevo',);
        }

        // movimientosimprimir
        if (0 === strpos($pathinfo, '/movimientosimprimir') && preg_match('#^/movimientosimprimir/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientosimprimirAction',)), array('_route' => 'movimientosimprimir'));
        }

        // movimientosagregaritem
        if (0 === strpos($pathinfo, '/movimientosagregaritem') && preg_match('#^/movimientosagregaritem/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::ItemsListaAction',)), array('_route' => 'movimientosagregaritem'));
        }

        // movimientosbuscaritem
        if (0 === strpos($pathinfo, '/movimientosbuscaritem') && preg_match('#^/movimientosbuscaritem/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::BuscarItemAction',)), array('_route' => 'movimientosbuscaritem'));
        }

        // movimientosagregarlote
        if (0 === strpos($pathinfo, '/movimientosagregarlote') && preg_match('#^/movimientosagregarlote/(?P<codigoMovimientoDetalle>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarLoteController::LotesListaAction',)), array('_route' => 'movimientosagregarlote'));
        }

        // movimientosagregaritemdocumento
        if (0 === strpos($pathinfo, '/movimientosagregaritemdocumento') && preg_match('#^/movimientosagregaritemdocumento/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::DocumentosControlAction',)), array('_route' => 'movimientosagregaritemdocumento'));
        }

        // movimientosagregaritemdetalle
        if (0 === strpos($pathinfo, '/movimientosagregaritemdetalle') && preg_match('#^/movimientosagregaritemdetalle/(?P<codigoMovimiento>[^/]+?)/(?P<codigoMovimientoOrigen>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosAgregarItemController::DocumentosControlDetalleAction',)), array('_route' => 'movimientosagregaritemdetalle'));
        }

        // movimientospendientes
        if (0 === strpos($pathinfo, '/movimientospendientes') && preg_match('#^/movimientospendientes/(?P<codigoDocumentoTipo>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientospendientesAction',)), array('_route' => 'movimientospendientes'));
        }

        // movimientospendientesdetalle
        if (0 === strpos($pathinfo, '/movimientospendientesdetalle') && preg_match('#^/movimientospendientesdetalle/(?P<codigoMovimiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\MovimientosController::movimientospendientesdetallesAction',)), array('_route' => 'movimientospendientesdetalle'));
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

        // consultakardex
        if ($pathinfo === '/consultakardex') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ConsultasController::kardexAction',  '_route' => 'consultakardex',);
        }

        // consultadisponibles
        if ($pathinfo === '/consultadisponibles') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ConsultasController::disponiblesAction',  '_route' => 'consultadisponibles',);
        }

        // contabilidadcontabilizar
        if (0 === strpos($pathinfo, '/contabilidadcontabilizar') && preg_match('#^/contabilidadcontabilizar/(?P<codigoDocumentoTipo>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ContabilidadController::movimientoscontabilizarlistaAction',)), array('_route' => 'contabilidadcontabilizar'));
        }

        // contabilidadresumen
        if ($pathinfo === '/contabilidadresumen') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ContabilidadController::resumenAction',  '_route' => 'contabilidadresumen',);
        }

        // contabilidadcontrolcertificadosretenciones
        if ($pathinfo === '/contabilidadcontrolcertificadosretenciones') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ContabilidadController::certificadosretencionesAction',  '_route' => 'contabilidadcontrolcertificadosretenciones',);
        }

        // contabilidadbalanceprueba
        if ($pathinfo === '/contabilidadbalanceprueba') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\ContabilidadController::balancepruebaAction',  '_route' => 'contabilidadbalanceprueba',);
        }

        // informecarteraestadocuenta
        if ($pathinfo === '/informecarteraestadocuenta') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\InformesController::carteraestadocuentaAction',  '_route' => 'informecarteraestadocuenta',);
        }

        // informetesoreriaestadocuenta
        if ($pathinfo === '/informetesoreriaestadocuenta') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\InformesController::tesoreriaestadocuentaAction',  '_route' => 'informetesoreriaestadocuenta',);
        }

        // informecontabilidadretenciones
        if ($pathinfo === '/informecontabilidadretenciones') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\InformesController::contabilidadretencionesAction',  '_route' => 'informecontabilidadretenciones',);
        }

        // informeinventarioexistencias
        if ($pathinfo === '/informeinventarioexistencias') {
            return array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\InformesController::inventarioexistenciasAction',  '_route' => 'informeinventarioexistencias',);
        }

        // asientoslista
        if (0 === strpos($pathinfo, '/asientoslista') && preg_match('#^/asientoslista/(?P<codigoAsientoTipo>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientoslistaAction',)), array('_route' => 'asientoslista'));
        }

        // asientosautorizar
        if (0 === strpos($pathinfo, '/asientosautorizar') && preg_match('#^/asientosautorizar/(?P<codigoAsiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosautorizarAction',)), array('_route' => 'asientosautorizar'));
        }

        // asientosdesautorizar
        if (0 === strpos($pathinfo, '/asientosdesautorizar') && preg_match('#^/asientosdesautorizar/(?P<codigoAsiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosdesautorizarAction',)), array('_route' => 'asientosdesautorizar'));
        }

        // asientosdetalle
        if (0 === strpos($pathinfo, '/asientosdetalle') && preg_match('#^/asientosdetalle/(?P<codigoAsiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosdetalleAction',)), array('_route' => 'asientosdetalle'));
        }

        // asientosaccionitems
        if (0 === strpos($pathinfo, '/asientosaccionitems') && preg_match('#^/asientosaccionitems/(?P<codigoAsiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosdetalleaccionitemsAction',)), array('_route' => 'asientosaccionitems'));
        }

        // asientosagregarcuentapagar
        if (0 === strpos($pathinfo, '/asientosagregarcuentapagar') && preg_match('#^/asientosagregarcuentapagar/(?P<codigoAsiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosagregarcuentapagarAction',)), array('_route' => 'asientosagregarcuentapagar'));
        }

        // asientosagregarcuentacobrar
        if (0 === strpos($pathinfo, '/asientosagregarcuentacobrar') && preg_match('#^/asientosagregarcuentacobrar/(?P<codigoAsiento>[^/]+?)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'zikmont\\FrontEndBundle\\Controller\\AsientosController::asientosagregarcuentacobrarAction',)), array('_route' => 'asientosagregarcuentacobrar'));
        }

        // gestioncartera
        if ($pathinfo === '/gestioncartera') {
            return array (  '_controller' => 'cartera\\GestionBundle\\Controller\\GestionController::indexAction',  '_route' => 'gestioncartera',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
