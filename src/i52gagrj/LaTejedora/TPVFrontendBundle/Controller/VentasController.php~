<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use \Doctrine\Common\Collections\ArrayCollection;

use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa;

class VentasController extends Controller
{
  public function ventaAction()
  {
    $request = $this->getRequest(); // equivalente a $this->get('request');
    $session = $this->get('session');
    $ruta = $request->get('_route');
    $concluido = false;

    switch ($ruta) {
      case 'i52_ltpv_frontend_ventas':
        //crear cesta         
        $cesta = array();
        //devolver el socio 1 (venta contado)
        $socio=$this->devuelveSocio(1);
        //introducir "1" en socio en session.
        $session->set('socio', '1');
        //insertar la cesta en session
        $session->set('cesta', $cesta);
      break;

      case 'i52_ltpv_frontend_aniadearticulo':
        // recuperar la id del artículo a buscar        
        // ejecutar la función aniadearticulo para que se añade la id del artículo a la cesta
        $cesta = $this->aniadeArticulo($request->get('id-articulo'));
        $socio = $this->devuelveSocio($session->get('socio'));
      break;

      case 'i52_ltpv_frontend_borraarticulo':
        // recuperar la id del artículo a buscar        
        // ejecutar la función borraarticulo para que se añade la id del artículo a la cesta
        $cesta = $this->borraArticulo($request->get('id-articulo'));
        $socio = $this->devuelveSocio($session->get('socio'));
        // de momento solo se le sumará un artículo, ya lidiaremos con lo de añadirle más 
      break;

      case 'i52_ltpv_frontend_cantidadarticulo':
        // recuperar la id del artículo a buscar        
        // ejecutar la función cambiaCantidad para que se modificar la cantidad del artículo en la cesta
        $cesta = $this->cambiaCantidad($request->get('cantidad'), $request->get('id-articulo'));
        $socio = $this->devuelveSocio($session->get('socio'));
        // de momento solo se le sumará un artículo, ya lidiaremos con lo de añadirle más 
      break;

      case 'i52_ltpv_frontend_aniadecliente':
        // recuperar cesta  
        $cesta = $session->get('cesta');
        // ejecutar la función aniadecliente en caso de no ser una venta al contado
        $socio = $this->devuelveSocio($request->get('id-socio'));
        $session->set('socio', $request->get('id-socio'));  
      break;

      case 'i52_ltpv_frontend_cierraventa':
        // recuperar cesta  
        $socio = $this->devuelveSocio($session->get('socio'));                 
        $cesta = $this->persisteCompra($request->get('tipo-pago'));      
        $concluido=true;  
        // ejecuta la función cierraventa: guarda la venta, cada una de las lineas y
        // modifica los artículos quitando las unidades que se hayan vendido.  	

      break;
    }     

    $productos = $this->devuelveTodosProductos();
    return $this->render('i52LTPVFrontendBundle:Ventas:ventas.html.twig', 
      array(
        'socio' => $socio,
        'productos' => $productos,
        'cesta' => $cesta, 
        'concluido' => $concluido,
      ));    
  }

  public function aniadeArticulo($producto)
  {
    //recibe la id del producto.
    //Añade la id al array $cesta en sessions
    //Devuelve la cesta 
    $session = $this->get('session');    
    $cesta = $session->get('cesta');
    $canasta = array('cantidad' =>'1', 'articulo' => $producto);
    array_push($cesta, $canasta);
    $session->set('cesta', $cesta);
    return $cesta;
  }

  public function borraArticulo($producto)
  {
    //Pasa todo el array a otro, excepto el elemento que tenga el articulo indicado
    //Carga el nuevo array en session
    //recuperar el array
    $canasta=array(); 
    $session = $this->get('session');    
    $cesta = $session->get('cesta');
    foreach($cesta as $linea)
    {
      if($linea['articulo']!=$producto)
      {
        $elemento=array('cantidad'=>$linea['cantidad'], 'articulo' => $linea['articulo']);
        array_push($canasta, $elemento);  
      } 
    }
    $session->set('cesta', $canasta);
    return $canasta;

  }

  public function cambiaCantidad($numero,$producto)
  {
    $canasta = array(); 
    $session = $this->get('session'); 
    $cesta = $session->get('cesta');
    foreach($cesta as $linea)
    {
       
      if($linea['articulo']==$producto)
      {
        $elemento=array('cantidad'=>$numero, 'articulo' => $linea['articulo']);
      } 
      else
      {
        $elemento=array('cantidad'=>$linea['cantidad'], 'articulo' => $linea['articulo']);
      }
      array_push($canasta, $elemento);  
    }
    $session->set('cesta', $canasta);   
    return $canasta; 
  }

  public function persisteCompra($tipopago)
  {
    
    $em = $this->getDoctrine()->getEntityManager();
    $session = $this->get('session');
    $cesta = $session->get('cesta');
    $usuario = $this->get('security.context')->getToken()->getUser();
    $venta = new Venta();
    $socio = $this->devuelveSocio($session->get('socio'));
    
    $fecha = new \DateTime("now");
    $venta->setFechaventa($fecha);    
    $hora = new \DateTime("now");
    $venta->setHoraventa($hora);    
    $venta->setUsuario($usuario);    
    $venta->setSocio($socio);  
    if($tipopago == 'contado'){
      $venta->setContado(true); 
    } else {
      $venta->setContado(false); 
    }  

    $em->persist($venta);

    foreach($cesta as $linea)
    {
      
      $lineaventa = new Lineaventa();
      $producto = $this->devuelveProducto($linea['articulo']);  
      $lineaventa->setPrecio($producto->getPrecio()); 
      $lineaventa->setIva($producto->getIva());
      $lineaventa->setCantidad($linea['cantidad']);
      $lineaventa->setVenta($venta);
      $lineaventa->setProducto($producto);
      if($tipopago == 'prepago'){        
        $socio->setSaldo( $socio->getSaldo()-
          ( ( $producto->getPrecio() * (1 + ($producto->getIva()/100) ) ) 
          * $linea['cantidad'] )
        );
      }
      $producto->setStock(($producto->getStock())-($linea['cantidad']));

      $em->persist($lineaventa);       
      $em->flush();
    }
    
    return $cesta;  
  }

  protected function devuelveTodosProductos()
  {
    $em = $this->getDoctrine()->getEntityManager();
    $productos = $em->getRepository('i52LTPVFrontendBundle:Producto')->
      findAll();  	
    return $productos;
  } 

  protected function devuelveProducto($idpro)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $producto = $em->getRepository('i52LTPVFrontendBundle:Producto')->
      find($idpro);  	
    return $producto;
  }

  protected function devuelveSocio($ident)
  { 
    //Si no hay un socio con esa id, se devuelve el socio 1 (Venta contado)
    $em = $this->getDoctrine()->getEntityManager();
    $socio = $em->getRepository('i52LTPVFrontendBundle:Socio')->find($ident);
    if(!$socio) $socio = $em->getRepository('i52LTPVFrontendBundle:Socio')->find(1);  	
    return $socio;
  }   
}
