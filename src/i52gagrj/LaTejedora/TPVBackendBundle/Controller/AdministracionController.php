<?php

namespace i52gagrj\LaTejedora\TPVBackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdministracionController extends Controller
{

     public function indexAction()
     {
         $params = array(
             'mensaje' => 'Bienvenido a la administración de datos',
             'fecha' => date('d-m-y'),
         );

         return
           $this->render(
             'i52LTPVBackendBundle:Gestion:index.html.twig',
             $params
           );
     }

     public function gestionAction()
     {
         return
           $this->render(
             'i52LTPVBackendBundle:Gestion:gestion.html.twig'
           );
     }

     public function informesAction()
     {
         $params = array(
             'mensaje1' => 'Listado de informes',
             'mensaje2' => 'Realización, con posibilidad de impresión, de una serie de informes prefijados.',
	     'mensaje3' => 'Existe la posibilidad de crear una interfaz para generar nuevos informes.',
         );

         return
           $this->render(
             'i52LTPVBackendBundle:Gestion:informes.html.twig',
             $params
           );
     }

}
