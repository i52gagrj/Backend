<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/admin2')) {
            // i52_ltpv_backend_homepage
            if (rtrim($pathinfo, '/') === '/admin2') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'i52_ltpv_backend_homepage');
                }

                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\DefaultController::indexAction',  '_route' => 'i52_ltpv_backend_homepage',);
            }

            if (0 === strpos($pathinfo, '/admin2/gestion')) {
                // i52_ltpv_backend_gestion
                if ($pathinfo === '/admin2/gestion') {
                    return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\DefaultController::gestionAction',  '_route' => 'i52_ltpv_backend_gestion',);
                }

                if (0 === strpos($pathinfo, '/admin2/gestion/usuarios')) {
                    if (0 === strpos($pathinfo, '/admin2/gestion/usuarios/form_usuario')) {
                        // i52_ltpv_backend_usuarios
                        if ($pathinfo === '/admin2/gestion/usuarios/form_usuario') {
                            return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuariosController::menuAction',  '_route' => 'i52_ltpv_backend_usuarios',);
                        }

                        // i52_ltpv_backend_usuarios_alta
                        if ($pathinfo === '/admin2/gestion/usuarios/form_usuario') {
                            return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuariosController::formUsuarioAction',  '_route' => 'i52_ltpv_backend_usuarios_alta',);
                        }

                    }

                    // i52_ltpv_backend_socios
                    if ($pathinfo === '/admin2/gestion/usuarios') {
                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\SociosController::menuAction',  '_route' => 'i52_ltpv_backend_socios',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin2/gestion/pro')) {
                    // i52_ltpv_backend_productos
                    if ($pathinfo === '/admin2/gestion/productos') {
                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProductosController::menuAction',  '_route' => 'i52_ltpv_backend_productos',);
                    }

                    // i52_ltpv_backend_proveedores
                    if ($pathinfo === '/admin2/gestion/proveedores') {
                        return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProveedoresController::menuAction',  '_route' => 'i52_ltpv_backend_proveedores',);
                    }

                }

            }

            // i52_ltpv_backend_informes
            if ($pathinfo === '/admin2/informes') {
                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\DefaultController::informesAction',  '_route' => 'i52_ltpv_backend_informes',);
            }

            // i52_ltpv_backend_cuotas
            if ($pathinfo === '/admin2/cuotas') {
                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\DefaultController::cuotasAction',  '_route' => 'i52_ltpv_backend_cuotas',);
            }

        }

        if (0 === strpos($pathinfo, '/caja')) {
            // i52_ltpv_frontend_homepage
            if (rtrim($pathinfo, '/') === '/caja') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'i52_ltpv_frontend_homepage');
                }

                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DefaultController::indexAction',  '_route' => 'i52_ltpv_frontend_homepage',);
            }

            // i52_ltpv_frontend_venta
            if ($pathinfo === '/caja/venta') {
                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\VentaController::ventaAction',  '_route' => 'i52_ltpv_frontend_venta',);
            }

            // i52_ltpv_frontend_lista
            if ($pathinfo === '/caja/lista') {
                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\VentaController::listaAction',  '_route' => 'i52_ltpv_frontend_lista',);
            }

            // i52_ltpv_frontend_cierre
            if ($pathinfo === '/caja/cierre') {
                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DefaultController::cierreAction',  '_route' => 'i52_ltpv_frontend_cierre',);
            }

            // i52_ltpv_frontend_devolucion
            if ($pathinfo === '/caja/devolucion') {
                return array (  '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DefaultController::devolucionAction',  '_route' => 'i52_ltpv_frontend_devolucion',);
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

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
