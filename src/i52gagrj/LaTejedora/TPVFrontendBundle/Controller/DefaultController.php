<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Doctrine\Common\Collections\ArrayCollection;


class DefaultController extends Controller
{
     public function indexAction()
     {
         $params = array(
             'mensaje' => 'Bienvenido a la caja virtual',
             'fecha' => date('ymd'),
         );

         return
           $this->render(
             'i52LTPVFrontendBundle:Default:index.html.twig',
             $params
           );
     }

     public function devolucionAction()
     {
         $params = array(
             'mensaje1' => 'Realización de una devolución',
             'mensaje2' => 'Se indicaria la venta a corregir, se realizaria la correción',
	     'mensaje3' => 'y se indicaria en la caja, en caso de haber un desfase económico.', 	
         );

         return
           $this->render(
             'i52LTPVFrontendBundle:Default:devolucion.html.twig',
             $params
           );
     }
 
}
