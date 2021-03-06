<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use \Doctrine\Common\Collections\ArrayCollection;

use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Diario;

class CierreController extends Controller
{
  public function cierreAction()
  {
    $request = $this->getRequest(); // equivalente a $this->get('request');
    $session = $this->get('session');
    
    //Consultamos todas las ventas del dia
    $ventas = $this->devuelveVentas(new \DateTime("now"));

    //Calculo de los totales, distinguiendo entre ventas al contado y ventas en prepago  
    list($prepago, $contado) = $this->devuelveTotales($ventas);

    //Realiza el deglose del IVA
    list($base21, $base10, $base4) = $this->devuelveIva($ventas); 

    //Se devuelve el cierre del dia anterior
    $fechahoy = new \DateTime("now"); 
    $anterior = $this->devuelveCierre($fechahoy->modify('-1 day'));

    //En la caja debe haber una cantidad igual a las ventas al contado más el resto
    //del dia anterior.
    $listaventa=''; 
    $productos = $this->devuelveTodosProductos(); 
    $socios = $this->devuelveTodosSocios();
    $hoy=$this->devuelveCierre(new \DateTime("now"));
    $ruta = $request->get('_route');
    $numventa='';

    switch ($ruta) {

      case 'i52_ltpv_frontend_cierre':
           
      break;

      case 'i52_ltpv_frontend_muestraventa':
        //buscar la venta que se quiere mostrar
        //devolverla (parametro $listaventa)
        $numventa = $request->get('num-venta');
        $listaventa = $this->devuelveLista($numventa);
      break;
        
      case 'i52_ltpv_frontend_ejecutacierre':
        //Recuperar la cantidad para cerrar
        //almacenarla en la tabla diario         
        $hoy = $this->ejecutaCierre($request->get('resto'));
      break; 
    }

    return $this->render('i52LTPVFrontendBundle:Cierres:cierres.html.twig', 
      array(
        'productos' => $productos,
        'ventas' => $ventas, 
        'prepago' => $prepago,
        'contado' => $contado,
        'base21' => $base21,
        'base10' => $base10, 
        'base4' => $base4,  
        'listaventa' => $listaventa,
        'hoy' => $hoy,
        'anterior' => $anterior,
        'socios' => $socios,
        'numventa' => $numventa,
      ));
  }

  private function devuelveVentas($hoy){
    //Devuelve el listado de todas las ventas realizadas hoy.
    $em = $this->getDoctrine()->getEntityManager();
    $ventas = $em->getRepository('i52LTPVFrontendBundle:Venta')->
      findByFechaventa($hoy);  	
    return $ventas;
  }

  private function devuelveCierre($fecha){
    //Devuelve el diario (cierre) de la fecha indicada
    $em = $this->getDoctrine()->getEntityManager();
    $cierre = $em->getRepository('i52LTPVFrontendBundle:Diario')->
      findOneByFecha($fecha);  	
    return $cierre;    
  }

  private function devuelveIva($ventas){
    $em = $this->getDoctrine()->getEntityManager();
    $base21 = 0;
    $base10 = 0;
    $base4 = 0;
    foreach($ventas as $venta){        
      $lineas = $em->getRepository('i52LTPVFrontendBundle:Lineaventa')->
        findByVenta($venta->getId());
      foreach($lineas as $linea){
        if($linea->getIva()==21){
          $base21 = $base21 + ($linea->getPrecio() * $linea->getCantidad());  
        }
        if($linea->getIva()==10){
          $base10 = $base10 + ($linea->getPrecio() * $linea->getCantidad());  
        }
        if($linea->getIva()==4){
          $base4 = $base4 + ($linea->getPrecio() * $linea->getCantidad());  
        } 
      }      	      
    }
    return array ($base21, $base10, $base4);
  }

  private function devuelveTotales($ventas){
    $em = $this->getDoctrine()->getEntityManager();
    $contado = 0;
    $prepago = 0;
    foreach($ventas as $venta){        
      $lineas = $em->getRepository('i52LTPVFrontendBundle:Lineaventa')->
        findByVenta($venta->getId());
      foreach($lineas as $linea){
        if($venta->getContado()==true){
          $contado = $contado + (($linea->getPrecio() * (1+($linea->getIva()/100))) * $linea->getCantidad() );  
        }
        else {
          $prepago = $prepago + (($linea->getPrecio() * (1+($linea->getIva()/100))) * $linea->getCantidad() );
        }
      }      	      
    }
    return array ($prepago, $contado);
  }

  private function ejecutaCierre($resto){
    $em = $this->getDoctrine()->getEntityManager();
    $hoy = new Diario();
    $fecha = new \DateTime("now");
    $hoy->setFecha($fecha);  
    $hoy->setDejado($resto);
    $em->persist($hoy);       
    $em->flush();  
    return $hoy;        
  }  

  private function devuelveLista($venta){
    $em = $this->getDoctrine()->getEntityManager();
    $lineas = $em->getRepository('i52LTPVFrontendBundle:Lineaventa')->
      findByVenta($venta);
    return $lineas;
  }  

  protected function devuelveTodosProductos()
  {
    $em = $this->getDoctrine()->getEntityManager();
    $productos = $em->getRepository('i52LTPVFrontendBundle:Producto')->
      findAll();  	
    return $productos;
  } 

  protected function devuelveTodosSocios()
  { 
    $em = $this->getDoctrine()->getEntityManager();    
    $socios = $em->getRepository('i52LTPVFrontendBundle:Socio')->findAll();  	
    return $socios;
  }
}
