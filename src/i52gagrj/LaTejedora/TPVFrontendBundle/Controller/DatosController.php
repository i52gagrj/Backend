<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use \Doctrine\Common\Collections\ArrayCollection;
use FOS\RestBundle\Controller\Annotations\View;

use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Diario;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Usuario;

class DatosController extends Controller
{

//////////////////////////VENTA////////////////////////////////

  public function todosproductosAction()
  {
    $respuesta = array();  
    $em = $this->getDoctrine()->getEntityManager();
    $productos = $em->getRepository('i52LTPVFrontendBundle:Producto')->
      findAll();
    foreach($productos as $producto)
    {
      $elemento = array(
        'id' => $producto->getId(),
        'nombre' => $producto->getNombre(),
        'precio' => $producto->getPrecio(),
        'iva' => $producto->getIva());
      array_push($respuesta, $elemento);    
    }   
    $mandar = new Response(json_encode($respuesta));
    $mandar->headers->set('Content-Type', 'application/json');
    return $mandar;
  }

  public function todosclientesAction()
  {
    $respuesta = array();
    $em = $this->getDoctrine()->getEntityManager();
    $socios = $em->getRepository('i52LTPVFrontendBundle:Socio')->
      findAll();
    foreach($socios as $socio)
    {
      $elemento = array(
        'id' => $socio->getId(),
        'nombre' => $socio->getNombre(),
        'dni' => $socio->getDni(),
        'direccion' => $socio->getDireccion(),
        'poblacion' => $socio->getPoblacion(),     
        'saldo' => $socio->getSaldo());
      array_push($respuesta, $elemento);        
    }    
    $mandar = new Response(json_encode($respuesta));
    $mandar->headers->set('Content-Type', 'application/json');
    return $mandar; 
  }

  public function recibirventaAction()
  {
    // Recuperar el json recibido
    $content = $this->get("request")->getContent();
    // decodificarlo con json decode
    $data = json_decode($content, true);
    // Mandar los datos para persistir
    $this->persisteCompra($data['cliente'], $data['contado'], $data['cesta']);

    return $this->render('i52LTPVFrontendBundle:Data:Data.html.twig');
  }
  
  protected function persisteCompra($cliente, $contado, $cesta)
  {
    //Provisionalmente todas las ventas se asignarán al usuario 1.
    //Cuando se implemente la autentificación las ventas se asignarán al usuario
    //autentificado.  
    $uno = 1;
    $em = $this->getDoctrine()->getEntityManager();
    $usuario = $em->getRepository('i52LTPVFrontendBundle:Usuario')->
      find($uno);
    $socio = $em->getRepository('i52LTPVFrontendBundle:Socio')->
      find($cliente);  
    $venta = new Venta();
    
    $fecha = new \DateTime("now");
    $venta->setFechaventa($fecha);    
    $hora = new \DateTime("now");
    $venta->setHoraventa($hora);    
    $venta->setUsuario($usuario);    
    $venta->setSocio($socio);  
    if($contado){
      $venta->setContado(true); 
    } else {
      $venta->setContado(false); 
    }  

    $em->persist($venta);

    foreach($cesta as $linea)
    {
      
      $lineaventa = new Lineaventa();
      $producto = $this->devuelveProducto($linea['id']);  
      $lineaventa->setPrecio($producto->getPrecio()); 
      $lineaventa->setIva($producto->getIva());
      $lineaventa->setCantidad($linea['cantidad']);
      $lineaventa->setVenta($venta);
      $lineaventa->setProducto($producto);
      if(!$contado){        
        $socio->setSaldo( $socio->getSaldo()-
          ( ( $producto->getPrecio() * (1 + ($producto->getIva()/100) ) ) 
          * $linea['cantidad'] )
        );
      }
      $producto->setStock(($producto->getStock())-($linea['cantidad']));

      $em->persist($lineaventa);       
      $em->flush();
    }
  }

  protected function devuelveProducto($idpro)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $producto = $em->getRepository('i52LTPVFrontendBundle:Producto')->
      find($idpro);  	
    return $producto;
  }

////////////////////////////FIN VENTA////////////////////////////



//////////////////////////////CIERRE/////////////////////////////

  public function cierreventasAction(){    
    //Devuelve todas las ventas realizadas hoy.
    //Hay que tratar el listado para que devuelva una consulta JSON.
    $respuesta = array(); 
    $ventas = $this->devuelveVentasHoy();  	    
    foreach($ventas as $venta)
    {
      if($venta->getContado()) 
        $contado="Si";
      else
        $contado="No";  
      $elemento = array(
        'id' => $venta->getId(),
        'fechaventa' => date_format($venta->getFechaventa(),'Y-m-d'),
        'horaventa' => date_format($venta->getHoraventa(),'H:i:s'),
        'socio' => $venta->getSocio()->getNombre(),
        'contado' => $contado);
      array_push($respuesta, $elemento);        
    }    
    $mandar = new Response(json_encode($respuesta));
    $mandar->headers->set('Content-Type', 'application/json');
    return $mandar; 
  }

  public function cierrelineasAction(){
    $respuesta = array();
    $em = $this->getDoctrine()->getEntityManager();
    $ventas = $this->devuelveVentasHoy(); 
    foreach($ventas as $venta)
    {
      $lineas = $em->getRepository('i52LTPVFrontendBundle:Lineaventa')->
        findByVenta($venta->getId());
      foreach($lineas as $linea)
      {
        $elemento = array(
          'venta' =>  $linea->getVenta()->getId(),
          'nombre' => $linea->getProducto()->getNombre(),
          'precio' => $linea->getPrecio(),
          'iva' => $linea->getIva(),
          'cantidad' => $linea->getCantidad());
        array_push($respuesta, $elemento);    
      }          
    } 
    $mandar = new Response(json_encode($respuesta));
    $mandar->headers->set('Content-Type', 'application/json');
    return $mandar; 
  }

  public function ultimocierreAction(){
    //Devuelve el diario (cierre) del dia anterior    
    $fechahoy = new \DateTime("now"); 
    $fecha = $fechahoy->modify('-1 day');
    $em = $this->getDoctrine()->getEntityManager();
    $cierre = $em->getRepository('i52LTPVFrontendBundle:Diario')->
      findOneByFecha($fecha);  	
    $respuesta=array(
      'dejado' => $cierre->getDejado()); 
    $mandar = new Response(json_encode($respuesta));
    $mandar->headers->set('Content-Type', 'application/json');
    return $mandar;   
  }

  private function devuelveVentasHoy(){
    //Devuelve el listado de todas las ventas realizadas hoy.
    $hoy = new \DateTime("now");
    $em = $this->getDoctrine()->getEntityManager();
    $ventas = $em->getRepository('i52LTPVFrontendBundle:Venta')->
      findByFechaventa($hoy);  	
    return $ventas;
  }

  public function recibircierreAction()
  {
    // Recuperar el json recibido
    $content = $this->get("request")->getContent();
    // decodificarlo con json decode
    $data = json_decode($content, true);
    // Mandar los datos para persistir
    $this->persisteCierre($data['dejado']);

    return $this->render('i52LTPVFrontendBundle:Data:Data.html.twig');
  }
  
  protected function persisteCierre($dejado)
  { 
    $em = $this->getDoctrine()->getEntityManager();
    $venta = new Diario();
    
    $fecha = new \DateTime("now");
    $venta->setFecha($fecha);       
    $venta->setDejado($dejado);  

    $em->persist($venta);
    $em->flush();
  }

///////////////////////////FIN CIERRE////////////////////////////



///////////////////////////DEVOLUCIÓN////////////////////////////

  public function buscaventaAction(){    
    $request = $this->getRequest(); 
    $idventa=$request->get('idventa');
    $venta = $this->devuelveVenta($idventa);  	    
    if($venta->getContado()) 
      $contado="Si";
    else
      $contado="No";  
    $elemento = array(
      'id' => $venta->getId(),
      'fechaventa' => date_format($venta->getFechaventa(),'Y-m-d'),
      'horaventa' => date_format($venta->getHoraventa(),'H:i:s'),
      'socio' => $venta->getSocio()->getNombre(),
      'dni' => $venta->getSocio()->getDni(),
      'usuario' => $venta->getUsuario()->getNombre(),
      'contado' => $contado);        
    $mandar = new Response(json_encode($elemento));
    $mandar->headers->set('Content-Type', 'application/json');
    return $mandar; 
  }

  public function buscalistaventaAction(){    
    $respuesta = array();    
    $request = $this->getRequest(); 
    $idventa=$request->get('idventa');
    $em = $this->getDoctrine()->getEntityManager();
    $listaventa  = $em->getRepository('i52LTPVFrontendBundle:Lineaventa')->
      findByVenta($idventa);  
    foreach($listaventa as $linea)
    {
      $elemento = array(
        'idlinea' => $linea->getId(),
        'venta' =>  $linea->getVenta()->getId(),
        'idproducto' => $linea->getProducto()->getId(),
        'nombre' => $linea->getProducto()->getNombre(),
        'precio' => $linea->getPrecio(),
        'iva' => $linea->getIva(),
        'cantidad' => $linea->getCantidad(),
        'borrar' => false);
      array_push($respuesta, $elemento);    
    }    	         
    $mandar = new Response(json_encode($respuesta));
    $mandar->headers->set('Content-Type', 'application/json');
    return $mandar; 
  }

  public function devuelveVenta($idventa){
    $em = $this->getDoctrine()->getEntityManager();
    $venta = $em->getRepository('i52LTPVFrontendBundle:Venta')->find($idventa);  	
    return $venta;
  }


  public function recibirmodificadaAction()
  {
    // Recuperar el json recibido
    $content = $this->get("request")->getContent();
    // decodificarlo con json decode
    $data = json_decode($content, true);
    // Mandar los datos para persistir
    $this->persisteModificada($data['modificada'], $data['diferencia'], $data['socio'], $data['contado']);
    return $this->render('i52LTPVFrontendBundle:Data:Data.html.twig');
  }

  private function persisteModificada($venta, $diferencia, $idsocio, $contado){
    //Modifica la venta una vez realizada la devolución.
    //Repasamos toda la cesta. 
    //Si la cantidad es 0, se borra la linea.
    //Si la cantidad de la cesta es diferente a la cantidad de la linea, se modifica la linea.
    //Si la venta ha sido mediante prepago, el saldo del socio se actualizará. 
    //Habria que modificar las existencias de productos, cosa que no se ha hecho.
     
    $em = $this->getDoctrine()->getEntityManager();


    foreach($venta as $lineamodificada)
    {
      $lineaoriginal = $this->devuelveLineaventa($lineamodificada['idlinea']);

      if($lineaoriginal->getCantidad() != $lineamodificada['cantidad'])
      {
        $lineaoriginal->setCantidad($lineamodificada['cantidad']);       
        $em->flush();   
      } 

      if($lineamodificada['cantidad']==0)
      { 
        //Borrar la linea
        $em->remove($lineaoriginal);
        $em->flush();       
      }

      if($lineaoriginal->getProducto()->getId()!=$lineamodificada['idproducto'])
      {
        //Falta modificar las existencias del producto original y del nuevo producto
        $producto=$this->devuelveProducto($lineamodificada['idproducto']);
        $lineaoriginal->setProducto($producto);
        $em->flush();
      }      
    }     

    if ($contado==false)
    {
      $socio = $this->devuelveSocio($idsocio);
      $socio->setSaldo($socio->getSaldo() - ($diferencia));
      $em->flush();
    }
  } 

  public function devuelveLineaventa($idlinea){
    $em = $this->getDoctrine()->getEntityManager();
    $linea = $em->getRepository('i52LTPVFrontendBundle:Lineaventa')->
      find($idlinea);
    return $linea;
  }

  public function devuelveSocio($idsocio){
    $em = $this->getDoctrine()->getEntityManager();
    $socio = $em->getRepository('i52LTPVFrontendBundle:Socio')->
      find($idsocio);
    return $socio;
  }  

////////////////////////FIN DEVOLUCIÓN///////////////////////////



/////////////////////////////CUOTAS//////////////////////////////
  public function todosclientescuotasAction()
  {
    $respuesta = array();
    $em = $this->getDoctrine()->getEntityManager();
    $socios = $em->getRepository('i52LTPVFrontendBundle:Socio')->
      findAll();
    foreach($socios as $socio)
    {
      if($socio->getId()!='1'){
        $elemento = array(
          'id' => $socio->getId(),
          'nombre' => $socio->getNombre(),
          'dni' => $socio->getDni(),
          'direccion' => $socio->getDireccion(),
          'poblacion' => $socio->getPoblacion(),     
          'saldo' => $socio->getSaldo(),
          'cuota' => 25); 
        array_push($respuesta, $elemento); 
      }       
    }    
    $mandar = new Response(json_encode($respuesta));
    $mandar->headers->set('Content-Type', 'application/json');
    return $mandar; 
  }

  public function recibircuotasAction()
  {
    // Recuperar el json recibido
    $content = $this->get("request")->getContent();
    // decodificarlo con json decode
    $data = json_decode($content, true);
    // Mandar los datos para persistir
    $this->finalizaCuotas($data['socios']);
    return $this->render('i52LTPVFrontendBundle:Data:Data.html.twig');
  }


  private function finalizaCuotas($socios){    
    $em = $this->getDoctrine()->getEntityManager();
    foreach($socios as $cliente)
    {
      $socio = $this->devuelveSocio($cliente['id']);
      $socio->setSaldo($socio->getSaldo() + $cliente['cuota']);
      $em->flush();         
    }  
  } 
///////////////////////////FIN CUOTAS////////////////////////////

////////////////////////////LOGIN////////////////////////////////

  public function loginAction()
  {
    //$respuesta = array();

    $request = $this->getRequest(); 
    $user=$request->get('username');
    $pass=$request->get('password');
    $usuario=$this->devuelveUsuario($user);

    if($usuario){ 
      if(password_verify($pass, $usuario->getPassword())){
        //$key = $request->get('password');
        $elemento = array(
          'id' => $usuario->getId(),
          'nombre' => $usuario->getNombre(),
          'roles' => $usuario->getRoles(),
          'iat' => time(),
          'exp' => time() + 900,  
          'user' => $user,
          'pass' => $pass); 
        $jwt = JWT::encode($elemento, '');

	$mandar = new Response(json_encode(array(
	  'code' => 0,
	  'response' => array('token' => $jwt))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;

      }  
    } 
    else{
      $elemento = array(
        'user' => $request->get('username'),
        'original' => $pass,        
        'pass' => $pass); 
      $mandar = new Response(json_encode($elemento));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    }

  }

  private function comprobarToken()
  {
    //Comprueba la validez del token, y devuelve true o false
  }

  public function devuelveUsuario($user){
    $em = $this->getDoctrine()->getEntityManager();
    $usuarios = $em->getRepository('i52LTPVFrontendBundle:Usuario')->
      findAll();
    foreach($usuarios as $usuario)
    {
      if($usuario->getUsername()==$user) return $usuario;   
    }
  }  

  
}
