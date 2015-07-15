<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
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
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/administracion')) {
            if (0 === strpos($pathinfo, '/administracion/socio')) {
                // socio_menu
                if ($pathinfo === '/administracion/socio/menu') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\SocioController::menuAction',  '_route' => 'socio_menu',);
                }

                // socio
                if ($pathinfo === '/administracion/socio/index') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\SocioController::indexAction',  '_route' => 'socio',);
                }

                // socio_show
                if (preg_match('#^/administracion/socio/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'socio_show')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\SocioController::showAction',));
                }

                // socio_new
                if ($pathinfo === '/administracion/socio/new') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\SocioController::newAction',  '_route' => 'socio_new',);
                }

                // socio_create
                if ($pathinfo === '/administracion/socio/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_socio_create;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\SocioController::createAction',  '_route' => 'socio_create',);
                }
                not_socio_create:

                // socio_edit
                if (preg_match('#^/administracion/socio/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'socio_edit')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\SocioController::editAction',));
                }

                // socio_update
                if (preg_match('#^/administracion/socio/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_socio_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'socio_update')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\SocioController::updateAction',));
                }
                not_socio_update:

                // socio_delete
                if (preg_match('#^/administracion/socio/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_socio_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'socio_delete')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\SocioController::deleteAction',));
                }
                not_socio_delete:

            }

            if (0 === strpos($pathinfo, '/administracion/pro')) {
                if (0 === strpos($pathinfo, '/administracion/producto')) {
                    // producto_menu
                    if ($pathinfo === '/administracion/producto/menu') {
                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProductoController::menuAction',  '_route' => 'producto_menu',);
                    }

                    // producto
                    if ($pathinfo === '/administracion/producto/index') {
                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProductoController::indexAction',  '_route' => 'producto',);
                    }

                    // producto_show
                    if (preg_match('#^/administracion/producto/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'producto_show')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProductoController::showAction',));
                    }

                    // producto_new
                    if ($pathinfo === '/administracion/producto/new') {
                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProductoController::newAction',  '_route' => 'producto_new',);
                    }

                    // producto_create
                    if ($pathinfo === '/administracion/producto/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_producto_create;
                        }

                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProductoController::createAction',  '_route' => 'producto_create',);
                    }
                    not_producto_create:

                    // producto_edit
                    if (preg_match('#^/administracion/producto/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'producto_edit')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProductoController::editAction',));
                    }

                    // producto_update
                    if (preg_match('#^/administracion/producto/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_producto_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'producto_update')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProductoController::updateAction',));
                    }
                    not_producto_update:

                    // producto_delete
                    if (preg_match('#^/administracion/producto/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_producto_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'producto_delete')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProductoController::deleteAction',));
                    }
                    not_producto_delete:

                }

                if (0 === strpos($pathinfo, '/administracion/proveedor')) {
                    // proveedor_menu
                    if ($pathinfo === '/administracion/proveedor/menu') {
                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProveedorController::menuAction',  '_route' => 'proveedor_menu',);
                    }

                    // proveedor
                    if ($pathinfo === '/administracion/proveedor/index') {
                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProveedorController::indexAction',  '_route' => 'proveedor',);
                    }

                    // proveedor_show
                    if (preg_match('#^/administracion/proveedor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'proveedor_show')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProveedorController::showAction',));
                    }

                    // proveedor_new
                    if ($pathinfo === '/administracion/proveedor/new') {
                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProveedorController::newAction',  '_route' => 'proveedor_new',);
                    }

                    // proveedor_create
                    if ($pathinfo === '/administracion/proveedor/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_proveedor_create;
                        }

                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProveedorController::createAction',  '_route' => 'proveedor_create',);
                    }
                    not_proveedor_create:

                    // proveedor_edit
                    if (preg_match('#^/administracion/proveedor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'proveedor_edit')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProveedorController::editAction',));
                    }

                    // proveedor_update
                    if (preg_match('#^/administracion/proveedor/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                            $allow = array_merge($allow, array('POST', 'PUT'));
                            goto not_proveedor_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'proveedor_update')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProveedorController::updateAction',));
                    }
                    not_proveedor_update:

                    // proveedor_delete
                    if (preg_match('#^/administracion/proveedor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                            $allow = array_merge($allow, array('POST', 'DELETE'));
                            goto not_proveedor_delete;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'proveedor_delete')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProveedorController::deleteAction',));
                    }
                    not_proveedor_delete:

                }

            }

            if (0 === strpos($pathinfo, '/administracion/usuario')) {
                // usuario_menu
                if ($pathinfo === '/administracion/usuario/menu') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuarioController::menuAction',  '_route' => 'usuario_menu',);
                }

                // usuario
                if ($pathinfo === '/administracion/usuario/index') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuarioController::indexAction',  '_route' => 'usuario',);
                }

                // usuario_show
                if (preg_match('#^/administracion/usuario/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_show')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuarioController::showAction',));
                }

                // usuario_new
                if ($pathinfo === '/administracion/usuario/new') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuarioController::newAction',  '_route' => 'usuario_new',);
                }

                // usuario_create
                if ($pathinfo === '/administracion/usuario/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_usuario_create;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuarioController::createAction',  '_route' => 'usuario_create',);
                }
                not_usuario_create:

                // usuario_edit
                if (preg_match('#^/administracion/usuario/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_edit')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuarioController::editAction',));
                }

                // usuario_update
                if (preg_match('#^/administracion/usuario/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_usuario_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_update')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuarioController::updateAction',));
                }
                not_usuario_update:

                // usuario_delete
                if (preg_match('#^/administracion/usuario/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_usuario_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_delete')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuarioController::deleteAction',));
                }
                not_usuario_delete:

            }

            if (0 === strpos($pathinfo, '/administracion/diario')) {
                // diario
                if ($pathinfo === '/administracion/diario/index') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\DiarioController::indexAction',  '_route' => 'diario',);
                }

                // diario_show
                if (preg_match('#^/administracion/diario/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'diario_show')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\DiarioController::showAction',));
                }

            }

            if (0 === strpos($pathinfo, '/administracion/venta')) {
                // venta
                if ($pathinfo === '/administracion/venta/index') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\VentaController::indexAction',  '_route' => 'venta',);
                }

                // venta_show
                if (preg_match('#^/administracion/venta/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'venta_show')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\VentaController::showAction',));
                }

            }

            // i52_ltpv_backend_homepage
            if (rtrim($pathinfo, '/') === '/administracion') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'i52_ltpv_backend_homepage');
                }

                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\AdministracionController::indexAction',  '_route' => 'i52_ltpv_backend_homepage',);
            }

            // i52_ltpv_backend_gestion
            if ($pathinfo === '/administracion/gestion') {
                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\AdministracionController::gestionAction',  '_route' => 'i52_ltpv_backend_gestion',);
            }

            // i52_ltpv_backend_informes
            if ($pathinfo === '/administracion/informes') {
                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\AdministracionController::informesAction',  '_route' => 'i52_ltpv_backend_informes',);
            }

            if (0 === strpos($pathinfo, '/administracion/c')) {
                // i52_ltpv_backend_cuotas
                if ($pathinfo === '/administracion/cuotas') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\CuotasController::cuotasAction',  '_route' => 'i52_ltpv_backend_cuotas',);
                }

                // i52_ltpv_backend_cambiacuota
                if ($pathinfo === '/administracion/cambiacuota') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_i52_ltpv_backend_cambiacuota;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\CuotasController::cuotasAction',  '_route' => 'i52_ltpv_backend_cambiacuota',);
                }
                not_i52_ltpv_backend_cambiacuota:

            }

            // i52_ltpv_backend_finalizacuotas
            if ($pathinfo === '/administracion/finalizacuotas') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_i52_ltpv_backend_finalizacuotas;
                }

                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\CuotasController::cuotasAction',  '_route' => 'i52_ltpv_backend_finalizacuotas',);
            }
            not_i52_ltpv_backend_finalizacuotas:

        }

        if (0 === strpos($pathinfo, '/caja')) {
            // i52_ltpv_frontend_homepage
            if ($pathinfo === '/caja/index') {
                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DefaultController::indexAction',  '_route' => 'i52_ltpv_frontend_homepage',);
            }

            // i52_ltpv_frontend_ventas
            if ($pathinfo === '/caja/venta') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_i52_ltpv_frontend_ventas;
                }

                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\VentasController::ventaAction',  '_route' => 'i52_ltpv_frontend_ventas',);
            }
            not_i52_ltpv_frontend_ventas:

            if (0 === strpos($pathinfo, '/caja/aniade')) {
                // i52_ltpv_frontend_aniadearticulo
                if ($pathinfo === '/caja/aniadearticulo/{id-articulo}') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_i52_ltpv_frontend_aniadearticulo;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\VentasController::ventaAction',  '_route' => 'i52_ltpv_frontend_aniadearticulo',);
                }
                not_i52_ltpv_frontend_aniadearticulo:

                // i52_ltpv_frontend_aniadecliente
                if ($pathinfo === '/caja/aniadecliente') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_i52_ltpv_frontend_aniadecliente;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\VentasController::ventaAction',  '_route' => 'i52_ltpv_frontend_aniadecliente',);
                }
                not_i52_ltpv_frontend_aniadecliente:

            }

            // i52_ltpv_frontend_cierraventa
            if ($pathinfo === '/caja/cierraventa') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_i52_ltpv_frontend_cierraventa;
                }

                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\VentasController::ventaAction',  '_route' => 'i52_ltpv_frontend_cierraventa',);
            }
            not_i52_ltpv_frontend_cierraventa:

            // i52_ltpv_frontend_borraarticulo
            if ($pathinfo === '/caja/borraarticulo/{id-articulo}') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_i52_ltpv_frontend_borraarticulo;
                }

                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\VentasController::ventaAction',  '_route' => 'i52_ltpv_frontend_borraarticulo',);
            }
            not_i52_ltpv_frontend_borraarticulo:

            if (0 === strpos($pathinfo, '/caja/c')) {
                // i52_ltpv_frontend_cantidadarticulo
                if ($pathinfo === '/caja/cantidadarticulo') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_i52_ltpv_frontend_cantidadarticulo;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\VentasController::ventaAction',  '_route' => 'i52_ltpv_frontend_cantidadarticulo',);
                }
                not_i52_ltpv_frontend_cantidadarticulo:

                // i52_ltpv_frontend_cierre
                if ($pathinfo === '/caja/cierre') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\CierreController::cierreAction',  '_route' => 'i52_ltpv_frontend_cierre',);
                }

            }

            // i52_ltpv_frontend_ejecutacierre
            if ($pathinfo === '/caja/ejecutacierre') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_i52_ltpv_frontend_ejecutacierre;
                }

                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\CierreController::cierreAction',  '_route' => 'i52_ltpv_frontend_ejecutacierre',);
            }
            not_i52_ltpv_frontend_ejecutacierre:

            // i52_ltpv_frontend_muestraventa
            if ($pathinfo === '/caja/muestraventa/{id-venta}') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_i52_ltpv_frontend_muestraventa;
                }

                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\CierreController::cierreAction',  '_route' => 'i52_ltpv_frontend_muestraventa',);
            }
            not_i52_ltpv_frontend_muestraventa:

            // i52_ltpv_frontend_devolucion
            if ($pathinfo === '/caja/devolucion') {
                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DevolucionController::devolucionAction',  '_route' => 'i52_ltpv_frontend_devolucion',);
            }

            // i52_ltpv_frontend_buscaventa
            if ($pathinfo === '/caja/buscaventa') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_i52_ltpv_frontend_buscaventa;
                }

                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DevolucionController::devolucionAction',  '_route' => 'i52_ltpv_frontend_buscaventa',);
            }
            not_i52_ltpv_frontend_buscaventa:

            if (0 === strpos($pathinfo, '/caja/cambiar')) {
                // i52_ltpv_frontend_cambiarproducto
                if ($pathinfo === '/caja/cambiarproducto') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_i52_ltpv_frontend_cambiarproducto;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DevolucionController::devolucionAction',  '_route' => 'i52_ltpv_frontend_cambiarproducto',);
                }
                not_i52_ltpv_frontend_cambiarproducto:

                // i52_ltpv_frontend_cambiarcantidad
                if ($pathinfo === '/caja/cambiarcantidad') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_i52_ltpv_frontend_cambiarcantidad;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DevolucionController::devolucionAction',  '_route' => 'i52_ltpv_frontend_cambiarcantidad',);
                }
                not_i52_ltpv_frontend_cambiarcantidad:

            }

            if (0 === strpos($pathinfo, '/caja/e')) {
                // i52_ltpv_frontend_eliminaarticulo
                if ($pathinfo === '/caja/eliminaarticulo/{id-articulo}') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_i52_ltpv_frontend_eliminaarticulo;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DevolucionController::devolucionAction',  '_route' => 'i52_ltpv_frontend_eliminaarticulo',);
                }
                not_i52_ltpv_frontend_eliminaarticulo:

                // i52_ltpv_frontend_ejecutadevolucion
                if ($pathinfo === '/caja/ejecutadevolucion') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_i52_ltpv_frontend_ejecutadevolucion;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DevolucionController::devolucionAction',  '_route' => 'i52_ltpv_frontend_ejecutadevolucion',);
                }
                not_i52_ltpv_frontend_ejecutadevolucion:

            }

            if (0 === strpos($pathinfo, '/caja/datos')) {
                if (0 === strpos($pathinfo, '/caja/datos/todos')) {
                    // i52_ltpv_frontend_apiTodosProductos
                    if ($pathinfo === '/caja/datos/todosProductos.json') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_i52_ltpv_frontend_apiTodosProductos;
                        }

                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::todosproductosAction',  '_route' => 'i52_ltpv_frontend_apiTodosProductos',);
                    }
                    not_i52_ltpv_frontend_apiTodosProductos:

                    // i52_ltpv_frontend_apiTodosClientes
                    if ($pathinfo === '/caja/datos/todosClientes.json') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_i52_ltpv_frontend_apiTodosClientes;
                        }

                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::todosclientesAction',  '_route' => 'i52_ltpv_frontend_apiTodosClientes',);
                    }
                    not_i52_ltpv_frontend_apiTodosClientes:

                }

                // i52_ltpv_frontend_apiRecibirVenta
                if ($pathinfo === '/caja/datos/recibirVenta') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_i52_ltpv_frontend_apiRecibirVenta;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::recibirventaAction',  '_route' => 'i52_ltpv_frontend_apiRecibirVenta',);
                }
                not_i52_ltpv_frontend_apiRecibirVenta:

                if (0 === strpos($pathinfo, '/caja/datos/cierre')) {
                    // i52_ltpv_frontend_apiCierreVentas
                    if ($pathinfo === '/caja/datos/cierreVentas.json') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_i52_ltpv_frontend_apiCierreVentas;
                        }

                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::cierreventasAction',  '_route' => 'i52_ltpv_frontend_apiCierreVentas',);
                    }
                    not_i52_ltpv_frontend_apiCierreVentas:

                    // i52_ltpv_frontend_apiCierreLineas
                    if ($pathinfo === '/caja/datos/cierreLineas.json') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_i52_ltpv_frontend_apiCierreLineas;
                        }

                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::cierrelineasAction',  '_route' => 'i52_ltpv_frontend_apiCierreLineas',);
                    }
                    not_i52_ltpv_frontend_apiCierreLineas:

                }

                // i52_ltpv_frontend_apiUltimoCierre
                if ($pathinfo === '/caja/datos/ultimoCierre.json') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_i52_ltpv_frontend_apiUltimoCierre;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::ultimocierreAction',  '_route' => 'i52_ltpv_frontend_apiUltimoCierre',);
                }
                not_i52_ltpv_frontend_apiUltimoCierre:

                // i52_ltpv_frontend_apiRecibirCierre
                if ($pathinfo === '/caja/datos/recibirCierre') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_i52_ltpv_frontend_apiRecibirCierre;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::recibircierreAction',  '_route' => 'i52_ltpv_frontend_apiRecibirCierre',);
                }
                not_i52_ltpv_frontend_apiRecibirCierre:

                if (0 === strpos($pathinfo, '/caja/datos/busca')) {
                    // i52_ltpv_frontend_apiBuscaVenta
                    if (0 === strpos($pathinfo, '/caja/datos/buscaVenta.json') && preg_match('#^/caja/datos/buscaVenta\\.json/(?P<idventa>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_i52_ltpv_frontend_apiBuscaVenta;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'i52_ltpv_frontend_apiBuscaVenta')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::buscaventaAction',));
                    }
                    not_i52_ltpv_frontend_apiBuscaVenta:

                    // i52_ltpv_frontend_apiBuscaListaVenta
                    if (0 === strpos($pathinfo, '/caja/datos/buscaListaVenta.json') && preg_match('#^/caja/datos/buscaListaVenta\\.json/(?P<idventa>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_i52_ltpv_frontend_apiBuscaListaVenta;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'i52_ltpv_frontend_apiBuscaListaVenta')), array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::buscalistaventaAction',));
                    }
                    not_i52_ltpv_frontend_apiBuscaListaVenta:

                }

                // i52_ltpv_frontend_apiRecibirModificada
                if ($pathinfo === '/caja/datos/recibirModificada') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_i52_ltpv_frontend_apiRecibirModificada;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::recibirmodificadaAction',  '_route' => 'i52_ltpv_frontend_apiRecibirModificada',);
                }
                not_i52_ltpv_frontend_apiRecibirModificada:

                // i52_ltpv_frontend_apiTodosClientesCuotas
                if ($pathinfo === '/caja/datos/todosClientesCuotas.json') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_i52_ltpv_frontend_apiTodosClientesCuotas;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::todosclientescuotasAction',  '_route' => 'i52_ltpv_frontend_apiTodosClientesCuotas',);
                }
                not_i52_ltpv_frontend_apiTodosClientesCuotas:

                // i52_ltpv_frontend_apiRecibirCuotas
                if ($pathinfo === '/caja/datos/recibirCuotas') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_i52_ltpv_frontend_apiRecibirCuotas;
                    }

                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::recibircuotasAction',  '_route' => 'i52_ltpv_frontend_apiRecibirCuotas',);
                }
                not_i52_ltpv_frontend_apiRecibirCuotas:

                if (0 === strpos($pathinfo, '/caja/datos/login')) {
                    // i52_ltpv_frontend_apiLogin
                    if ($pathinfo === '/caja/datos/login') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_i52_ltpv_frontend_apiLogin;
                        }

                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DatosController::loginAction',  '_route' => 'i52_ltpv_frontend_apiLogin',);
                    }
                    not_i52_ltpv_frontend_apiLogin:

                    // api_login_check
                    if ($pathinfo === '/caja/datos/login_check') {
                        return array('_route' => 'api_login_check');
                    }

                }

            }

            if (0 === strpos($pathinfo, '/caja/log')) {
                if (0 === strpos($pathinfo, '/caja/login')) {
                    // login_route
                    if ($pathinfo === '/caja/login') {
                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login_route',);
                    }

                    // login_check
                    if ($pathinfo === '/caja/login_check') {
                        return array('_route' => 'login_check');
                    }

                }

                // logout
                if ($pathinfo === '/caja/logout') {
                    return array('_route' => 'logout');
                }

            }

        }

        if (0 === strpos($pathinfo, '/a')) {
            // homepage
            if ($pathinfo === '/app/example') {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            }

            if (0 === strpos($pathinfo, '/admin')) {
                // sonata_admin_redirect
                if (rtrim($pathinfo, '/') === '/admin') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'sonata_admin_redirect');
                    }

                    return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'sonata_admin_dashboard',  'permanent' => 'true',  '_route' => 'sonata_admin_redirect',);
                }

                // sonata_admin_dashboard
                if ($pathinfo === '/admin/dashboard') {
                    return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'sonata_admin_dashboard',);
                }

                if (0 === strpos($pathinfo, '/admin/core')) {
                    // sonata_admin_retrieve_form_element
                    if ($pathinfo === '/admin/core/get-form-field-element') {
                        return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_route' => 'sonata_admin_retrieve_form_element',);
                    }

                    // sonata_admin_append_form_element
                    if ($pathinfo === '/admin/core/append-form-field-element') {
                        return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_route' => 'sonata_admin_append_form_element',);
                    }

                    // sonata_admin_short_object_information
                    if (0 === strpos($pathinfo, '/admin/core/get-short-object-description') && preg_match('#^/admin/core/get\\-short\\-object\\-description(?:\\.(?P<_format>html|json))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'sonata_admin_short_object_information')), array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_format' => 'html',));
                    }

                    // sonata_admin_set_object_field_value
                    if ($pathinfo === '/admin/core/set-object-field-value') {
                        return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_route' => 'sonata_admin_set_object_field_value',);
                    }

                }

                // sonata_admin_search
                if ($pathinfo === '/admin/search') {
                    return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::searchAction',  '_route' => 'sonata_admin_search',);
                }

                // sonata_admin_retrieve_autocomplete_items
                if ($pathinfo === '/admin/core/get-autocomplete-items') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveAutocompleteItemsAction',  '_route' => 'sonata_admin_retrieve_autocomplete_items',);
                }

            }

        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _demo_security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_demo_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
