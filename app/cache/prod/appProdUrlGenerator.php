<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'i52_ltpv_backend_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin2/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_backend_gestion' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\DefaultController::gestionAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin2/gestion',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_backend_usuarios' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuariosController::menuAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin2/gestion/usuarios/form_usuario',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_backend_usuarios_alta' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\UsuariosController::formUsuarioAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin2/gestion/usuarios/form_usuario',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_backend_socios' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\SociosController::menuAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin2/gestion/usuarios',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_backend_productos' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProductosController::menuAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin2/gestion/productos',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_backend_proveedores' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\ProveedoresController::menuAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin2/gestion/proveedores',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_backend_informes' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\DefaultController::informesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin2/informes',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_backend_cuotas' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVBackendBundle\\Controller\\DefaultController::cuotasAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin2/cuotas',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'proveedor' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\ProveedorController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/caja/proveedor/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'proveedor_show' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\ProveedorController::showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/caja/proveedor',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'proveedor_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\ProveedorController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/caja/proveedor/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'proveedor_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\ProveedorController::createAction',  ),  2 =>   array (    '_method' => 'post',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/caja/proveedor/create',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'proveedor_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\ProveedorController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/caja/proveedor',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'proveedor_update' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\ProveedorController::updateAction',  ),  2 =>   array (    '_method' => 'post|put',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/caja/proveedor',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'proveedor_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\ProveedorController::deleteAction',  ),  2 =>   array (    '_method' => 'post|delete',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/delete',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/caja/proveedor',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_frontend_homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/caja/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_frontend_venta' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\VentaController::ventaAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/caja/venta',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_frontend_cierre' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DefaultController::cierreAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/caja/cierre',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'i52_ltpv_frontend_devolucion' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'i52gagrj\\LaTejedora\\TPVFrontendBundle\\Controller\\DefaultController::devolucionAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/caja/devolucion',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/app/example',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sonata_admin_redirect' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',    'route' => 'sonata_admin_dashboard',    'permanent' => 'true',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sonata_admin_dashboard' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/dashboard',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sonata_admin_retrieve_form_element' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/core/get-form-field-element',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sonata_admin_append_form_element' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/core/append-form-field-element',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sonata_admin_short_object_information' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',    '_format' => 'html',  ),  2 =>   array (    '_format' => 'html|json',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'html|json',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/admin/core/get-short-object-description',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sonata_admin_set_object_field_value' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/core/set-object-field-value',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sonata_admin_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'sonata_admin_retrieve_autocomplete_items' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'sonata.admin.controller.admin:retrieveAutocompleteItemsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/core/get-autocomplete-items',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
