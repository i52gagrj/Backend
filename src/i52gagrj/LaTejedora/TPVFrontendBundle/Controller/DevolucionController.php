<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use \Doctrine\Common\Collections\ArrayCollection;

use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa;

class DevolucionController extends Controller
{
  public function devolucionAction(){
    $request = $this->getRequest(); // equivalente a $this->get('request');
    $session = $this->get('session');
    $ruta = $request->get('_route');
    $venta = '';
    $listaventa = '';
    $cesta = '';
    $finalizado = false; 
    $totaloriginal = 0;
    $totalnuevo = 0;    

    switch ($ruta) {
      case 'i52_ltpv_frontend_devolucion':
        $cesta = array();
        $session->set('cesta', $cesta);
      break;

      case 'i52_ltpv_frontend_buscaventa':
        //Llamada para pedir la venta a modificar.
        //Se debe recuperar la venta original y copiarla en una variante session
        $idventa=$request->get('id-venta');
        $venta = $this->devuelveVenta($idventa);
        $listaventa = $this->devuelveLista($idventa);
        $cesta = $this->llenaCesta($idventa);
        $totaloriginal=$this->devuelveTotal($listaventa);
        $totalnuevo=$this->devuelveTotal($cesta);
        $session->set('idventa', $idventa);
        $session->set('cesta', $cesta);          
      break;

      case 'i52_ltpv_frontend_cambiarproducto':
        //Llamada para cambiar un artículo.
        $idventa=$session->get('idventa');
        $venta = $this->devuelveVenta($idventa);
        $listaventa = $this->devuelveLista($idventa);
        $cesta = $this->cambiaProducto($request->get('id-producto'), $request->get('id-linea'));
        $totaloriginal=$this->devuelveTotal($listaventa);
        $totalnuevo=$this->devuelveTotal($cesta);
        $session->set('totaloriginal', $totaloriginal);
        $session->set('totalnuevo', $totalnuevo); 
        $session->set('cesta', $cesta);
      break;

      case 'i52_ltpv_frontend_cambiarcantidad':
        //Llamada para cambiar la cantidad de un artículo
        //Puede que no sea necesaria, y que se pueda unir a la de cambio de articulo
        $idventa=$session->get('idventa');
        $venta = $this->devuelveVenta($idventa);
        $listaventa = $this->devuelveLista($idventa);
        $cesta = $this->cambiaCantidad($request->get('cantidad'), $request->get('id-linea'));
        $totaloriginal=$this->devuelveTotal($listaventa);
        $totalnuevo=$this->devuelveTotal($cesta);
        $session->set('totaloriginal', $totaloriginal);
        $session->set('totalnuevo', $totalnuevo); 
        $session->set('cesta', $cesta);
      break;

      case 'i52_ltpv_frontend_eliminaarticulo':
        //Llamada para borrar un artículo 
        $idventa=$session->get('idventa');
        $venta = $this->devuelveVenta($idventa);
        $listaventa = $this->devuelveLista($idventa);
        $cesta = $this->borraArticulo($request->get('id-linea'));
        $totaloriginal=$this->devuelveTotal($listaventa);
        $totalnuevo=$this->devuelveTotal($cesta);
        $session->set('totaloriginal', $totaloriginal);
        $session->set('totalnuevo', $totalnuevo);      
        $session->set('cesta', $cesta);
      break;

      case 'i52_ltpv_frontend_ejecutadevolucion':
        //Llamada para terminar el proceso de devolución
        $idventa=$session->get('idventa');
        $venta = $this->devuelveVenta($idventa);
        $listaventa = $this->devuelveLista($idventa);
        $totaloriginal=$session->get('totaloriginal');
        $totalnuevo=$session->get('totalnuevo');
        $cesta = $this->modificaVenta($venta, $totaloriginal, $totalnuevo);
        $finalizado = true; 
      break;
    }

    return $this->render('i52LTPVFrontendBundle:Devolucion:devolucion.html.twig', 
      array(
        'venta' => $venta,
        'listaventa' => $listaventa, 
        'cesta' => $cesta,
        'finalizado' => $finalizado,
        'totaloriginal' => $totaloriginal,
        'totalnuevo' => $totalnuevo,
      )); 
    
  }

  public function devuelveVenta($idventa){
    $em = $this->getDoctrine()->getEntityManager();
    $venta = $em->getRepository('i52LTPVFrontendBundle:Venta')->find($idventa);  	
    return $venta;
  }

  public function devuelveLista($idventa){
    $em = $this->getDoctrine()->getEntityManager();
    $lineas = $em->getRepository('i52LTPVFrontendBundle:Lineaventa')->
      findByVenta($idventa);
    return $lineas;
  }  

  

  public function llenaCesta($idventa){
    $cesta=$this->devuelveLista($idventa);     
    return $cesta; 
  }

  public function cambiaProducto($idproducto, $idlinea){
    //Modifica la venta una vez realizada la devolución.
    $producto= $this->devuelveProducto($idproducto);  
    $canasta = array(); 
    $session = $this->get('session'); 
    $cesta = $session->get('cesta');
    foreach($cesta as $linea)
    {
       
      if($linea->getId()==$idlinea)
      {
        $linea->setProducto($producto);
        $linea->setPrecio($producto->getPrecio());
        $linea->setIva($producto->getIva());  
      } 
      array_push($canasta, $linea);  
    }
    $session->set('cesta', $canasta);   
    return $canasta;
  }

  public function cambiaCantidad($cantidad, $idlinea){
    //Modifica la venta una vez realizada la devolución.
    $canasta = array(); 
    $session = $this->get('session'); 
    $cesta = $session->get('cesta');
    foreach($cesta as $linea)
    {
       
      if($linea->getId()==$idlinea)
      {
        $linea->setCantidad($cantidad);
      } 
      array_push($canasta, $linea);  
    }
    $session->set('cesta', $canasta);   
    return $canasta;
  }

  public function borraArticulo($idlinea){
    $canasta=array(); 
    $session = $this->get('session');    
    $cesta = $session->get('cesta');
    foreach($cesta as $linea)
    {
      if($linea->getId()==$idlinea)
      {
        $linea->setCantidad(0);  
      } 
      array_push($canasta, $linea);
    }
    $session->set('cesta', $canasta);
    return $canasta;     
  }

  public function modificaVenta($venta, $totaloriginal, $totalmodificado){
    //Modifica la venta una vez realizada la devolución.
    //Repasamos toda la cesta. 
    //Si la cantidad es 0, se borra la linea.
    //Si la cantidad de la cesta es diferente a la cantidad de la linea, se modifica la linea.
    //Si la venta ha sido mediante prepago, el saldo del socio se actualizará. 
    //Habria que modificar las existencias de productos, cosa que no se ha hecho.
     
    $em = $this->getDoctrine()->getEntityManager();
    $session = $this->get('session');    
    $cesta = $session->get('cesta');

    foreach($cesta as $lineamodificada)
    {
      $lineaoriginal = $this->devuelveLineaventa($lineamodificada->getId());

      if($lineaoriginal->getCantidad() != $lineamodificada->getCantidad())
      {
        $lineaoriginal->setCantidad($lineamodificada->getCantidad());       
        $em->flush();   
      } 

      if($lineamodificada->getcantidad()==0)
      { 
        //Borrar la linea
        $em->remove($lineaoriginal);
        $em->flush();       
      }

      if($lineaoriginal->getProducto()->getId()!=$lineamodificada->getProducto()->getId())
      {
        $producto=$this->devuelveProducto($lineamodificada->getProducto()->getId());
        $lineaoriginal->setProducto($producto);
        $em->flush();
      }      
    }     

    if ($venta->getContado()==false)
    {
      $socio = $venta->getSocio();
      $socio->setSaldo($socio->getSaldo() + ($totaloriginal - $totalmodificado));
      $em->flush();
    }

    return $cesta;    
  } 

  public function devuelveTotal($lista){
    $total = 0;
    foreach($lista as $item){        
      $total = $total + (($item->getPrecio() * (1+($item->getIva()/100))) * $item->getCantidad() );       	      
    }
    return $total;
  }
  
  protected function devuelveProducto($idpro)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $producto = $em->getRepository('i52LTPVFrontendBundle:Producto')->
      find($idpro);  	
    return $producto;
  }

  public function devuelveLineaventa($idlinea){
    $em = $this->getDoctrine()->getEntityManager();
    $linea = $em->getRepository('i52LTPVFrontendBundle:Lineaventa')->
      find($idlinea);
    return $linea;
  }  

  
}
