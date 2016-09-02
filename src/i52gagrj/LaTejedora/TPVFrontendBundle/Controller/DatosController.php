<?php 

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use \Doctrine\Common\Collections\ArrayCollection;
use FOS\RestBundle\Controller\Annotations\View;

use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Proveedor;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Lineaventa;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Producto;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Diario;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Usuario;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Tipo;

class DatosController extends Controller
{

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////VENTA//////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

  public function todosproductosAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {  
        $em = $this->getDoctrine()->getEntityManager();
        $productos = $em->getRepository('i52LTPVFrontendBundle:Producto')->
          findAll();
        foreach($productos as $producto)
        {
          if($producto->getActivo())
          { 
            $elemento = array(
              'id' => $producto->getId(),
              'nombre' => $producto->getNombre(),
              'precio' => $producto->getPrecio(),
              'iva' => $producto->getIva(),
              'tipo' => $producto->getTipo()->getNombre());
            array_push($respuesta, $elemento);    
          }
        }     
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
          'token' => $jwt, 
          'productos' => $respuesta))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  
      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    }
  } 

  public function todosclientesAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los tipos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {  
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
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
          'token' => $jwt, 
          'socios' => $respuesta))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  
      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    }
  }

  public function todostiposAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los tipos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {  
        $em = $this->getDoctrine()->getEntityManager();
        $tipos = $em->getRepository('i52LTPVFrontendBundle:Tipo')->
          findAll();
        foreach($tipos as $tipo)
        {
          $elemento = array(
            'id' => $tipo->getId(),
            'nombre' => $tipo->getNombre(),
            'padre' => $tipo->getPadre());
          array_push($respuesta, $elemento);    
        }     
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
          'token' => $jwt, 
          'tipos' => $respuesta))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  
      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    }
  }

  public function recibirventaAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      //Si los datos del token son correctos, se guarda la venta
      if($this->comprobarToken($tokend->id, $tokend->username))
      { 
        $fechahoy = date_format(new \DateTime("now"),'Y-m-d');
        if($this->devuelveUltimaFecha()<$fechahoy)
        {  
          // Recuperar el json recibido
          $content = $this->get("request")->getContent();
          // decodificarlo con json decode
          $data = json_decode($content, true);
          // Mandar los datos para persistir
          $this->persisteCompra($data['cliente'], $data['contado'], $data['cesta'], $tokend->id);
          $tokend->iat = time();
  	      $tokend->exp = time() + 900;
  	      $jwt = JWT::encode($tokend, '');
          $mandar = new Response(json_encode(array(
            'code' => 0,
            'response'=> array(
              'respuesta'=> "Venta almacenada correctamente",
              'token' => $jwt))));
          $mandar->headers->set('Content-Type', 'application/json');
          return $mandar;
        }
        else
        {
          $tokend->iat = time();
          $tokend->exp = time() + 900;
          $mandar = new Response(json_encode(array(
            'code' => 1,
            'response'=> array(
              'respuesta' => "La venta no se almaceno, la caja por hoy ya está cerrada"))));
          $mandar->headers->set('Content-Type', 'application/json');
          return $mandar; 
        }
        //return $this->render('i52LTPVFrontendBundle:Data:Data.html.twig');
      }
      else{
        $mandar = new Response(json_encode(array(
    	    'code' => 1,
	        'response'=> array(
            'respuesta' => "La clave no es correcta"))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar; 
      } 
    } 
    else{
      $mandar = new Response(json_encode(array(
	      'code' => 2,
	      'response'=> array(
          'respuesta' => "No existe el usuario"))));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    } 
  }
  
  protected function persisteCompra($cliente, $contado, $cesta, $vendedor)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $usuario = $em->getRepository('i52LTPVFrontendBundle:Usuario')->
      find($vendedor);
    $socio = $em->getRepository('i52LTPVFrontendBundle:Socio')->
      find($cliente);  
    $venta = new Venta();
    
    $fecha = new \DateTime("now");
    $venta->setFechaventa($fecha);    
    $hora = new \DateTime("now");
    $venta->setHoraventa($hora);    
    $venta->setUsuario($usuario);    
    $venta->setSocio($socio);
    if($contado=="true"){ 
      $venta->setContado(true);  
    }
    else{ 
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
      if($venta->getContado()==0){        
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

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////FIN VENTA////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//////////////////////////////CIERRE/////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

  public function cierreventasAction(){    
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      $fechac; 
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      { 
        $fechahoy = date_format(new \DateTime("now"),'Y-m-d');
        if($this->devuelveUltimaFecha()<$fechahoy)
        {          
          //Primero buscar la fecha del último cierre
          //Después pedir las ventas desde esa fecha   
          $ultimoDiario=$this->devuelveUltimaFecha();    
          $ventas = $this->devuelveVentas($ultimoDiario);
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
          $tokend->iat = time();
  	      $tokend->exp = time() + 900;
  	      $jwt = JWT::encode($tokend, '');
          $mandar = new Response(json_encode(array(
            'code' => 0,
            'response'=> array(
            'token' => $jwt, 
            'ventas' => $respuesta))));
          $mandar->headers->set('Content-Type', 'application/json');
          return $mandar;
        }
        else
        {
          $tokend->iat = time();
          $tokend->exp = time() + 900;
          $mandar = new Response(json_encode(array(
            'code' => 1,
            'response'=> array(
              'respuesta' => "El proceso de cierre ya se ha realizado"))));
          $mandar->headers->set('Content-Type', 'application/json');
          return $mandar; 
        }        
      }  
      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    } 
  }

  public function cierrelineasAction(){
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {  
        $em = $this->getDoctrine()->getEntityManager();
        $ultimoDiario=$this->devuelveUltimaFecha();         
        $ventas = $this->devuelveVentas($ultimoDiario); 
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
        $tokend->iat = time();
	      $tokend->exp = time() + 900;
	      $jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
          'token' => $jwt, 
          'lineas' => $respuesta))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  

      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    } 
  }

  public function ultimocierreAction(){
    $fechac; 
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {   
        $ultimocierre = $this->devuelveUltimaFecha();
        $em = $this->getDoctrine()->getEntityManager();
        $cierre = $em->getRepository('i52LTPVFrontendBundle:Diario')->
          findOneByFecha($ultimocierre);  	
        $tokend->iat = time();
	      $tokend->exp = time() + 900;
	      $jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'token' => $jwt, 
            'dejado' => $cierre->getDejado()))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  

      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    } 
  }

  private function devuelveVentas($fecha){
    //Devuelve el listado de todas las ventas realizadas tras la fecha indicada.
    $em = $this->getDoctrine()->getEntityManager();
    $query = $em->createQuery(
      'SELECT p
      FROM i52LTPVFrontendBundle:Venta p
      WHERE p.fechaventa > :fecha'
    )->setParameter('fecha', $fecha);	
    return $query->getResult();
  }

  private function devuelveUltimaFecha(){
    //Devuelve la fecha del último cierre de caja.
    $em = $this->getDoctrine()->getEntityManager();
    $query = $em->createQuery(
      'SELECT p
      FROM i52LTPVFrontendBundle:Diario p
      WHERE p.fecha=(SELECT MAX(q.fecha) 
      from i52LTPVFrontendBundle:Diario q)'
    );  	
    return $query->getResult()[0]->getFecha();
  }

  public function recibircierreAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      //Si los datos del token son correctos, se guarda la venta
      if($this->comprobarToken($tokend->id, $tokend->username))
      {
        // Recuperar el json recibido
        $content = $this->get("request")->getContent();
        // decodificarlo con json decode
        $data = json_decode($content, true);
        // Mandar los datos para persistir
        $this->persisteCierre($data['dejado']);
        $tokend->iat = time();
	      $tokend->exp = time() + 900;
	      $jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'respuesta' => 'Cierre realizado correctamente',
            'token' => $jwt))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }
      else{
        $mandar = new Response(json_encode(array(
    	  'code' => 1,
	      'response'=> array(
            'respuesta' => "La clave no es correcta"))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar; 
      } 
    } 
    else{
      $mandar = new Response(json_encode(array(
	'code' => 2,
	'response'=> array(
          'respuesta' => "No existe el usuario"))));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    } 
  }
  
  protected function persisteCierre($dejado)
  { 
    $em = $this->getDoctrine()->getEntityManager();
    $venta = new Diario();
    
    $fecha = new \DateTime("now");
    $venta->setFecha($fecha);       
    $venta->setDejado($dejado * 1);  

    $em->persist($venta);
    $em->flush();
  }

///////////////////////////FIN CIERRE////////////////////////////



///////////////////////////DEVOLUCIÓN////////////////////////////

  public function buscaventaAction(){  
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {    
        $request = $this->getRequest(); 
        $idventa=$request->get('idventa');
        $venta = $this->devuelveVenta($idventa);  	   
        if($venta)
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
            'dni' => $venta->getSocio()->getDni(),
            'usuario' => $venta->getUsuario()->getNombre(),
            'contado' => $contado);     
          $tokend->iat = time();
	        $tokend->exp = time() + 900;
  	      $jwt = JWT::encode($tokend, '');
          $mandar = new Response(json_encode(array(
            'code' => 0,
            'response'=> array(
              'token' => $jwt, 
              'venta' => $elemento))));
          $mandar->headers->set('Content-Type', 'application/json');
          return $mandar;   
        }
        else
        {
          $tokend->iat = time();
	  $tokend->exp = time() + 900;
  	  $jwt = JWT::encode($tokend, '');
          $mandar = new Response(json_encode(array(
            'code' => 3,
            'response'=> array( 
              'respuesta' => "El número de venta indicado no existe"))));
          $mandar->headers->set('Content-Type', 'application/json');
          return $mandar;  
        } 
      }  

      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }

    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    } 
  }

  public function buscalistaventaAction(){   
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      { 
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
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'token' => $jwt, 
            'lineas' => $respuesta))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;   
      }  

      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }

    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    } 
  }

  public function devuelveVenta($idventa){
    $em = $this->getDoctrine()->getEntityManager();
    $venta = $em->getRepository('i52LTPVFrontendBundle:Venta')->find($idventa);  	
    return $venta;
  }


  public function recibirmodificadaAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      //Si los datos del token son correctos, se guarda la venta
      if($this->comprobarToken($tokend->id, $tokend->username))
      {
        // Recuperar el json recibido
        $content = $this->get("request")->getContent();
        // decodificarlo con json decode
        $data = json_decode($content, true);
        // Mandar los datos para persistir
        $this->persisteModificada($data['modificada'], $data['diferencia'], $data['socio'], $data['contado']);
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'respuesta' => 'Modificación realizada correctamente',
            'token' => $jwt))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }
      else{
        $mandar = new Response(json_encode(array(
    	  'code' => 1,
	  'response'=> array(
            'respuesta' => "La clave no es correcta"))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar; 
      } 
    } 
    else{
      $mandar = new Response(json_encode(array(
	'code' => 2,
	'response'=> array(
          'respuesta' => "No existe el usuario"))));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    } 
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

////////////////////////////LOGIN////////////////////////////////

  public function loginAction()
  {    
    // Recuperar el json recibido
    $content = $this->get("request")->getContent();
    // decodificarlo con json decode
    $data = json_decode($content, true);

    $user=$data['username'];
    $pass=$data['password'];
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
          'username' => $usuario->getUsername()); 
        $jwt = JWT::encode($elemento, '');

	$mandar = new Response(json_encode(array(
	  'code' => 0,
	  'response'=> array( 
            'token' => $jwt))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  
      else{
        $mandar = new Response(json_encode(array(
    	  'code' => 1,
	  'response'=> array(
            'respuesta' => "La clave no es correcta"))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar; 
      } 
    } 
    else{
      $mandar = new Response(json_encode(array(
	'code' => 2,
	'response'=> array(
          'respuesta' => "No existe el usuario"))));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    }

  }

  private function comprobarToken($id, $username)
  {
    //Comprueba la validez del token, y devuelve true o false
    $em = $this->getDoctrine()->getEntityManager();
    $usuario = $em->getRepository('i52LTPVFrontendBundle:Usuario')->
      find($id);
    if($usuario->getUsername()==$username) return true;
    else return false;
  }

  public function devuelveUsuario($user){
    $em = $this->getDoctrine()->getEntityManager();
    $usuario = $em->getRepository('i52LTPVFrontendBundle:Usuario')->
      findOneByUsername($user);
    return $usuario;
  }  

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//////////////////////////////GESTION///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////SOCIOS//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

  public function listadosociosAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {  
        $em = $this->getDoctrine()->getEntityManager();
        $socios = $em->getRepository('i52LTPVFrontendBundle:Socio')->
          findAll();   
        foreach($socios as $socio)
        {
          if($socio->getId()!=1)
          {
            $elemento = array(
              'id' => $socio->getId(),
              'nombre' => $socio->getNombre(),
              'direccion' => $socio->getDireccion(),
              'poblacion' => $socio->getPoblacion(),
              'cp' => $socio->getCp(),
              'provincia' => $socio->getProvincia(),
              'dni' => $socio->getDni(),
              'email' => $socio->getEmail(),
              'fijo' => $socio->getTelefijo(),
              'movil' => $socio->getTelemovil(),
              'saldo' => $socio->getSaldo(),
              'activo' => $socio->getActivo(),
              'fechainactivo' => date_format($socio->getFechainactivo(),'Y-m-d'));
            array_push($respuesta, $elemento);   
          } 
        }             
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
          'token' => $jwt, 
          'socios' => $respuesta
        ))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  
      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    }
  }

  public function recibesocioAction()
  {
    ///Extraer la cabecera de la petición
    //Si contiene el token, en la sección Authorization
    //$headers=apache_request_headers();   
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      //Si los datos del token son correctos, se guarda la venta
      if($this->comprobarToken($tokend->id, $tokend->username))
      { 
        // Recuperar el json recibido
        $content = $this->get("request")->getContent();
        // decodificarlo con json decode
        $data = json_decode($content, true);
        // Mandar los datos para persistir
        if($data['id']!=0){
          $respuesta=$this->modificaSocio($data['id'], $data['nombre'], $data['dni'], $data['direccion'], $data['poblacion'], $data['provincia'], $data['cp'], $data['fijo'], $data['movil'], $data['email'], $data['activo'], $data['saldo'], $data['baja']);
        }
        else{
          $respuesta=$this->persisteSocio($data['nombre'], $data['dni'], $data['direccion'], $data['poblacion'], $data['provincia'], $data['cp'], $data['fijo'], $data['movil'], $data['email'],$data['activo'], $data['saldo']);
        } 
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'respuesta'=> $respuesta,
            'token' => $jwt))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }
      else{
        $mandar = new Response(json_encode(array(
    	  'code' => 1,
	  'response'=> array(
            'respuesta' => "La clave no es correcta"))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar; 
      } 
    } 
    else{
      $mandar = new Response(json_encode(array(
	'code' => 2,
	'response'=> array(
          'respuesta' => "No existe el usuario"))));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    } 
  }
  
  protected function persisteSocio($nombre, $dni, $direccion, $poblacion, $provincia, $cp, $telefijo, $telemovil, $email, $activo, $saldo)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $existe = $em->getRepository('i52LTPVFrontendBundle:Socio')->
      findByDni($dni);
    if($existe)
    {
      return "El socio indicado ya existe";
    }
    else  
    {
      $socio = new Socio();    
      $socio->setNombre($nombre);        
      $socio->setDni($dni);
      $socio->setDireccion($direccion);
      $socio->setPoblacion($poblacion);
      $socio->setProvincia($provincia);
      $socio->setCp($cp);
      $socio->setTelefijo($telefijo);       
      $socio->setTelemovil($telemovil);
      $socio->setEmail($email);
      $socio->setActivo($activo);
      $socio->setSaldo($saldo);
      $fecha = new \DateTime("00-00-0000");
      $socio->setFechainactivo($fecha);
  
      $em->persist($socio);
      $em->flush();
      return "El socio se ha guardado correctamente"; 
    } 
  }

  protected function modificaSocio($id, $nombre, $dni, $direccion, $poblacion, $provincia, $cp, $telefijo, $telemovil, $email, $activo, $saldo, $baja)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $socio = $em->getRepository('i52LTPVFrontendBundle:Socio')->
      find($id);
    
    $socio->setNombre($nombre);        
    $socio->setDni($dni);
    $socio->setDireccion($direccion);
    $socio->setPoblacion($poblacion);
    $socio->setProvincia($provincia);
    $socio->setCp($cp);
    $socio->setTelefijo($telefijo);       
    $socio->setTelemovil($telemovil);
    $socio->setEmail($email);
    $socio->setActivo($activo);
    $socio->setSaldo($saldo);
    if($baja)
    {
      $fecha = new \DateTime("now");
      $socio->setFechainactivo($fecha);
    }
    else
    {
      $fecha = new \DateTime("00-00-0000");
      $socio->setFechainactivo($fecha);
    }   
    $em->flush();
    return "El socio se ha modificado correctamente";
  }

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////FIN SOCIOS//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////CUOTAS/////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
  public function todosclientescuotasAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
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
              'saldo' => $socio->getSaldo(),
              'cuota' => 25); 
            array_push($respuesta, $elemento); 
          }       
        }    
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'token' => $jwt, 
            'socios' => $respuesta))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  

      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }

    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    } 
  }

  public function recibircuotasAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      //Si los datos del token son correctos, se guarda la venta
      if($this->comprobarToken($tokend->id, $tokend->username))
      {
        // Recuperar el json recibido
        $content = $this->get("request")->getContent();
        // decodificarlo con json decode
        $data = json_decode($content, true);
        // Mandar los datos para persistir
        $this->finalizaCuotas($data['socios']);
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'respuesta' => 'Cuotas almacenadas correctamente',
            'token' => $jwt))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }
      else{
        $mandar = new Response(json_encode(array(
    	  'code' => 1,
	  'response'=> array(
            'respuesta' => "La clave no es correcta"))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar; 
      } 
    } 
    else{
      $mandar = new Response(json_encode(array(
	'code' => 2,
	'response'=> array(
          'respuesta' => "No existe el usuario"))));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    } 
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
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////FIN CUOTAS////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////PRODUCTOS/////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

  public function listadoproductosAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {  
        $em = $this->getDoctrine()->getEntityManager();
        $productos = $em->getRepository('i52LTPVFrontendBundle:Producto')->
          findAll();   
        foreach($productos as $producto)
        {
          $elemento = array(
            'id' => $producto->getId(),
            'nombre' => $producto->getNombre(),
            'descripcion' => $producto->getDescripcion(),
            'precio' => $producto->getPrecio(),
            'iva' => $producto->getIva(),
            'stock' => $producto->getStock(),
            'activo' => $producto->getActivo(),
            'fechainactivo' => date_format($producto->getFechainactivo(),'Y-m-d'),
            'proveedor' => $producto->getProveedor()->getId(),
            'tipo' => $producto->getTipo()->getId());
          array_push($respuesta, $elemento);    
        }             
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
          'token' => $jwt, 
          'productos' => $respuesta))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  
      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    }
  }

  public function recibeproductoAction()
  {
    //Extraer la cabecera de la petición
    //Si contiene el token, en la sección Authorization
    //$headers=apache_request_headers();   
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      //Si los datos del token son correctos, se guarda la venta
      if($this->comprobarToken($tokend->id, $tokend->username))
      { 
        // Recuperar el json recibido
        $content = $this->get("request")->getContent();
        // decodificarlo con json decode
        $data = json_decode($content, true);
        // Mandar los datos para persistir
        if($data['id']!=0){
          $respuesta=$this->modificaProducto($data['id'], $data['nombre'], $data['tipo'], $data['descripcion'], $data['stock'], $data['precio'], $data['iva'], $data['activo'], $data['proveedor'], $data['baja']);
        }
        else{
          $respuesta=$this->persisteProducto($data['nombre'], $data['tipo'], $data['descripcion'], $data['stock'], $data['precio'], $data['iva'], $data['activo'], $data['proveedor']);
        } 
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'respuesta'=> $respuesta,
            'token' => $jwt))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }
      else{
        $mandar = new Response(json_encode(array(
    	  'code' => 1,
	  'response'=> array(
            'respuesta' => "La clave no es correcta"))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar; 
      } 
    } 
    else{
      $mandar = new Response(json_encode(array(
	'code' => 2,
	'response'=> array(
          'respuesta' => "No existe el usuario"))));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    } 
  }
  
  protected function persisteProducto($nombre, $id_tipo, $descripcion, $stock, $precio, $iva, $activo, $id_proveedor)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $existe = $em->getRepository('i52LTPVFrontendBundle:Producto')->
      findByNombre($nombre);
    if($existe)
    {
      return "El producto indicado ya existe";
    }
    else  
    {
      $proveedor = $em->getRepository('i52LTPVFrontendBundle:Proveedor')->
        find($id_proveedor);
      $tipo = $em->getRepository('i52LTPVFrontendBundle:Tipo')->
        find($id_tipo);  
      $producto = new Producto();    
      $producto->setNombre($nombre);        
      $producto->setDescripcion($descripcion);
      $producto->setStock($stock);
      $producto->setPrecio($precio);
      $producto->setIva($iva);
      $producto->setActivo($activo);
      $producto->setProveedor($proveedor);
      $producto->setTipo($tipo);
      $fecha = new \DateTime("00-00-0000");
      $producto->setFechainactivo($fecha);

      $em->persist($producto);
      $em->flush();
      return "El producto se ha guardado correctamente"; 
    } 
  }

  protected function modificaProducto($id, $nombre, $id_tipo, $descripcion, $stock, $precio, $iva, $activo, $id_proveedor, $baja)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $producto = $em->getRepository('i52LTPVFrontendBundle:Producto')->
      find($id);
    $proveedor = $em->getRepository('i52LTPVFrontendBundle:Proveedor')->
        find($id_proveedor);
    $tipo = $em->getRepository('i52LTPVFrontendBundle:Tipo')->
        find($id_tipo); 
    
    $producto->setNombre($nombre);        
    $producto->setDescripcion($descripcion);
    $producto->setStock($stock);
    $producto->setPrecio($precio);
    $producto->setIva($iva);
    $producto->setActivo($activo);
    $producto->setProveedor($proveedor);
    $producto->setTipo($tipo);
    if($baja)
    {
      $fecha = new \DateTime("now");
      $producto->setFechainactivo($fecha);
    }
    else
    {
      $fecha = new \DateTime("00-00-0000");
      $producto->setFechainactivo($fecha);
    }
      
    $em->flush();
    return "El producto se ha modificado correctamente";
  }


////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////FIN PRODUCTOS//////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
///////////////////////////////TIPOS PRODUCTOS//////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

  public function listadotiposAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {  
        $em = $this->getDoctrine()->getEntityManager();
        $tipos = $em->getRepository('i52LTPVFrontendBundle:Tipo')->
          findAll();   
        foreach($tipos as $tipo)
        {
          $elemento = array(
            'id' => $tipo->getId(),
            'nombre' => $tipo->getNombre(),
            'padre' => $tipo->getPadre());
          array_push($respuesta, $elemento);    
        }             
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
          'token' => $jwt, 
          'tipos' => $respuesta))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  
      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    }
  }

  public function recibetipoAction()
  {
    //Extraer la cabecera de la petición
    //Si contiene el token, en la sección Authorization
    //$headers=apache_request_headers();   
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      //Si los datos del token son correctos, se guarda la venta
      if($this->comprobarToken($tokend->id, $tokend->username))
      { 
        // Recuperar el json recibido
        $content = $this->get("request")->getContent();
        // decodificarlo con json decode
        $data = json_decode($content, true);
        // Mandar los datos para persistir
        if($data['id']!=0){
          $respuesta=$this->modificaTipo($data['id'], $data['nombre'], $data['padre']);
        }
        else{
          $respuesta=$this->persisteTipo($data['nombre'], $data['padre']);
        } 
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'respuesta'=> $respuesta,
            'token' => $jwt))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }
      else{
        $mandar = new Response(json_encode(array(
    	  'code' => 1,
	  'response'=> array(
            'respuesta' => "La clave no es correcta"))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar; 
      } 
    } 
    else{
      $mandar = new Response(json_encode(array(
	'code' => 2,
	'response'=> array(
          'respuesta' => "No existe el usuario"))));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    } 
  }
  
  protected function persisteTipo($nombre, $padre)
  {
    $padrerevisado=$this->verificaPadre($padre);
    $em = $this->getDoctrine()->getEntityManager();
    $existe = $em->getRepository('i52LTPVFrontendBundle:Tipo')->
      findByNombre($nombre);
    if($existe)
    {
      return "El tipo indicado ya existe";
    }
    else  
    {
      $tipo = new Tipo();    
      $tipo->setNombre($nombre);        
      $tipo->setPadre($padrerevisado);

      $em->persist($tipo);
      $em->flush();
      return "El tipo se ha guardado correctamente"; 
    } 
  }

  protected function modificaTipo($id, $nombre, $padre)
  {
    $padrerevisado=$this->verificaPadre($padre);
    $em = $this->getDoctrine()->getEntityManager();
    $tipo = $em->getRepository('i52LTPVFrontendBundle:Tipo')->
      find($id);
    
    $tipo->setNombre($nombre);        
    $tipo->setPadre($padrerevisado);
      
    $em->flush();
    return "El tipo se ha modificado correctamente";
  }

  protected function verificaPadre($padre)
  {
    if($padre==0) return $padre;
    else{ 
      $em = $this->getDoctrine()->getEntityManager();
      $tipo = $em->getRepository('i52LTPVFrontendBundle:Tipo')->
        find($padre);    
      if($tipo) return $padre;
      else return 0;    
    }
  }

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//////////////////////////FIN TIPOS PRODUCTOS///////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
/////////////////////////////PROVEEDORES////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

  public function listadoproveedoresAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {  
        $em = $this->getDoctrine()->getEntityManager();
        $proveedores = $em->getRepository('i52LTPVFrontendBundle:Proveedor')->
          findAll();   
        foreach($proveedores as $proveedor)
        {
          $elemento = array(
            'id' => $proveedor->getId(),
            'nombre' => $proveedor->getNombre(),
            'nif' => $proveedor->getNif(),
            'direccion' => $proveedor->getDireccion(),
            'poblacion' => $proveedor->getPoblacion(),
            'provincia' => $proveedor->getProvincia(),
            'cp' => $proveedor->getCp(),
            'fijo' => $proveedor->getTelefijo(),
            'movil' => $proveedor->getTelemovil(),
            'email' => $proveedor->getEmail(),
            'activo' => $proveedor->getActivo());
          array_push($respuesta, $elemento);    
        }             
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
          'token' => $jwt, 
          'proveedores' => $respuesta))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  
      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    }
  }

  public function recibeproveedorAction()
  {
    //Extraer la cabecera de la petición
    //Si contiene el token, en la sección Authorization
    //$headers=apache_request_headers();   
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      //Si los datos del token son correctos, se guarda la venta
      if($this->comprobarToken($tokend->id, $tokend->username))
      { 
        // Recuperar el json recibido
        $content = $this->get("request")->getContent();
        // decodificarlo con json decode
        $data = json_decode($content, true);
        // Mandar los datos para persistir
        if($data['id']!=0){
          $respuesta=$this->modificaProveedor($data['id'], $data['nombre'], $data['nif'], $data['direccion'], $data['poblacion'], $data['provincia'], $data['cp'], $data['fijo'], $data['movil'], $data['email'], $data['activo']);
        }
        else{
          $respuesta=$this->persisteProveedor($data['nombre'], $data['nif'], $data['direccion'], $data['poblacion'], $data['provincia'], $data['cp'], $data['fijo'], $data['movil'], $data['email'],$data['activo']);
        } 
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'respuesta'=> $respuesta,
            'token' => $jwt))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }
      else{
        $mandar = new Response(json_encode(array(
    	  'code' => 1,
	  'response'=> array(
            'respuesta' => "La clave no es correcta"))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar; 
      } 
    } 
    else{
      $mandar = new Response(json_encode(array(
	'code' => 2,
	'response'=> array(
          'respuesta' => "No existe el usuario"))));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    } 
  }
  
  protected function persisteProveedor($nombre, $nif, $direccion, $poblacion, $provincia, $cp, $telefijo, $telemovil, $email, $activo)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $existe = $em->getRepository('i52LTPVFrontendBundle:Proveedor')->
      findByNif($nif);
    if($existe)
    {
      return "El proveedor indicado ya existe";
    }
    else  
    {
      $proveedor = new Proveedor();    
      $proveedor->setNombre($nombre);        
      $proveedor->setNif($nif);
      $proveedor->setDireccion($direccion);
      $proveedor->setPoblacion($poblacion);
      $proveedor->setProvincia($provincia);
      $proveedor->setCp($cp);
      $proveedor->setTelefijo($telefijo);       
      $proveedor->setTelemovil($telemovil);
      $proveedor->setEmail($email);
      $proveedor->setActivo($activo);

      $em->persist($proveedor);
      $em->flush();
      return "El proveedor se ha guardado correctamente"; 
    } 
  }

  protected function modificaProveedor($id, $nombre, $nif, $direccion, $poblacion, $provincia, $cp, $telefijo, $telemovil, $email, $activo)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $proveedor = $em->getRepository('i52LTPVFrontendBundle:Proveedor')->
      find($id);
    
    $proveedor->setNombre($nombre);        
    $proveedor->setNif($nif);
    $proveedor->setDireccion($direccion);
    $proveedor->setPoblacion($poblacion);
    $proveedor->setProvincia($provincia);
    $proveedor->setCp($cp);
    $proveedor->setTelefijo($telefijo);       
    $proveedor->setTelemovil($telemovil);
    $proveedor->setEmail($email);
    $proveedor->setActivo($activo);
      
    $em->flush();
    return "El proveedor se ha modificado correctamente";
  }

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
/////////////////////////FIN PROVEEDORES////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////USUARIOS////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

  public function listadousuariosAction()
  {
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {  
        $em = $this->getDoctrine()->getEntityManager();
        $usuarios = $em->getRepository('i52LTPVFrontendBundle:Usuario')->
          findAll();   
        foreach($usuarios as $usuario)
        {
          $elemento = array(
            'id' => $usuario->getId(),
            'nombre' => $usuario->getNombre(),
            'dni' => $usuario->getDni(),
            'password' => $usuario->getPassword(),
            'activo' => $usuario->getIsActive(),
            'username' => $usuario->getUsername(),
            'fechainactivo' => date_format($usuario->getFechainactivo(),'Y-m-d'));
          array_push($respuesta, $elemento);            
        }             
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
          'token' => $jwt, 
          'usuarios' => $respuesta
        ))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }  
      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
    //Si la petición no contiene el token, se manda un codigo de error 2 y un mensaje
    else
    {
      $mandar = new Response(json_encode(array(
        'code' => 2,
        'response'=> array( 
          'respuesta' => "No está autorizado para realizar la consulta"))));      
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar;
    }
  }

  public function recibeusuarioAction()
  {
    ///Extraer la cabecera de la petición
    //Si contiene el token, en la sección Authorization
    //$headers=apache_request_headers();   
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      //Si los datos del token son correctos, se guarda la venta
      if($this->comprobarToken($tokend->id, $tokend->username))
      { 
        // Recuperar el json recibido
        $content = $this->get("request")->getContent();
        // decodificarlo con json decode
        $data = json_decode($content, true);
        // Mandar los datos para persistir
        if($data['id']!=0){     
          //confirmar si se ha de modificar la clave: mandar un flag.
          $clave = $data['password']; 
          if($data['cambioclave']==true) $clave=crypt($data['password']);    
          $respuesta=$this->modificaUsuario($data['id'], $data['nombre'], $data['dni'], $clave, $data['activo'], $data['username'], $data['baja']);
        }
        else{
          //Codificar la clave antes de insertarla
          $clave=crypt($data['password']);
          $respuesta=$this->persisteUsuario($data['nombre'], $data['dni'], $clave, $data['activo'], $data['username']);
        } 
        $tokend->iat = time();
	$tokend->exp = time() + 900;
	$jwt = JWT::encode($tokend, '');
        $mandar = new Response(json_encode(array(
          'code' => 0,
          'response'=> array(
            'respuesta'=> $respuesta,
            'token' => $jwt))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;
      }
      else{
        $mandar = new Response(json_encode(array(
    	  'code' => 1,
	  'response'=> array(
            'respuesta' => "La clave no es correcta"))));
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar; 
      } 
    } 
    else{
      $mandar = new Response(json_encode(array(
	'code' => 2,
	'response'=> array(
          'respuesta' => "No existe el usuario"))));
      $mandar->headers->set('Content-Type', 'application/json');
      return $mandar; 
    } 
  }

  protected function persisteUsuario($nombre, $dni, $password, $isactive, $username)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $existe = $em->getRepository('i52LTPVFrontendBundle:Usuario')->
      findByDni($dni);
    if($existe)
    {
      return "El usuario indicado ya existe";
    }
    else  
    {
      $usuario = new Usuario();    
      $usuario->setNombre($nombre);        
      $usuario->setDni($dni);
      $usuario->setPassword($password);
      $usuario->setIsActive($isactive);
      $usuario->setUsername($username);
      $fecha = new \DateTime("00-00-0000");
      $usuario->setFechainactivo($fecha);
  
      $em->persist($usuario);
      $em->flush();
      return "El usuario se ha guardado correctamente"; 
    } 
  }

  protected function modificaUsuario($id, $nombre, $dni, $password, $isactive, $username, $baja)
  {
    $em = $this->getDoctrine()->getEntityManager();
    $usuario = $em->getRepository('i52LTPVFrontendBundle:Usuario')->
      find($id);
    
    $usuario->setNombre($nombre);        
    $usuario->setDni($dni);
    $usuario->setPassword($password);
    $usuario->setIsActive($isactive);
    $usuario->setUsername($username);
    if($baja)
    {
      $fecha = new \DateTime("now");
      $usuario->setFechainactivo($fecha);
    }
    else
    {
      $fecha = new \DateTime("00-00-0000");
      $usuario->setFechainactivo($fecha);
    }   
    $em->flush();
    return "El usuario se ha modificado correctamente";
  }

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////FIN USUARIOS////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//////////////////////////FIN GESTION///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////  


  public function buscarlistadoventasAction(){  
    //Extraer la cabecera de la petición
    //$headers=apache_request_headers();   
    //Si contiene el token, en la sección Authorization
    //if(isset($headers["Authorization"]))
    //{
    //  $token=explode(" ", $headers["Authorization"]);
    $em = $this->getDoctrine()->getEntityManager();
    $request = Request::createFromGlobals();
    $headers=$request->headers;
    if($headers->get('authorization'))
    {
      $token=explode(" ", $headers->get('authorization'));
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {    
        $request = $this->getRequest(); 
        $fechainicio = date_format(new \DateTime($request->get('fechainicio')),'Y-m-d');
        $fechafin  = date_format(new \DateTime($request->get('fechafin')),'Y-m-d');
        $ventas = $this->devuelveListadoVentas($fechainicio, $fechafin);
        if($ventas){
          //devuelve listado de ventas

          foreach($ventas as $venta)
          {
            $base21=0;
            $base10=0;
            $base4=0;
            $lineas = $em->getRepository('i52LTPVFrontendBundle:Lineaventa')->
              findByVenta($venta->getId());
            foreach($lineas as $linea)
            {
              if($linea->getIva()==21) $base21=$base21+($linea->getPrecio()*$linea->getCantidad());
              if($linea->getIva()==10) $base10=$base10+($linea->getPrecio()*$linea->getCantidad());  
              if($linea->getIva()==4) $base4=$base4+($linea->getPrecio()*$linea->getCantidad());     
            }       
            $elemento = array(
              'id' => $venta->getId(), 
              'base21' => $base21,
              'base10' => $base10,
              'base4' =>  $base4,
              'fechaventa' => date_format($venta->getFechaventa(),'Y-m-d'),
              'horaventa' => date_format($venta->getHoraventa(),'H:i:s'),
              'socio' => $venta->getSocio()->getNombre(),
              'contado' => $contado);
            array_push($respuesta, $elemento);       
          }
          $tokend->iat = time();
	  $tokend->exp = time() + 900;
  	  $jwt = JWT::encode($tokend, '');
          $mandar = new Response(json_encode(array(
            'code' => 0,
            'response'=> array(
              'token' => $jwt, 
              'fechainicio' => $fechainicio,
	      'fechafin' => $fechafin,	
              'ventas' => $respuesta
              ))));
          $mandar->headers->set('Content-Type', 'application/json');
          return $mandar;   
        }
        else
        {
          $mandar = new Response(json_encode(array(
            'code' => 3,
            'response'=> array( 
              'respuesta' => "No hay ventas entre las fechas indicadas"))));
          $mandar->headers->set('Content-Type', 'application/json');
          return $mandar;  
        }
      }  

      //Si los datos del token no son correctos, se manda un codigo de error 1 y un mensaje
      else
      {
        $mandar = new Response(json_encode(array(
          'code' => 1,
          'response'=> array( 
            'respuesta' => "El usuario no se ha identificado correctamente"))));      
        $mandar->headers->set('Content-Type', 'application/json');
        return $mandar;        
      }      
    }
  }

  private function devuelveListadoVentas($fechainicio, $fechafin){
    //Devuelve el listado de todas las ventas realizadas entre las dos fechas.
    $em = $this->getDoctrine()->getEntityManager();
    $query = $em->createQuery(
      'SELECT p
      FROM i52LTPVFrontendBundle:Venta p
      WHERE p.fechaventa >= :fechainicio
      AND p.fechaventa <= :fechafin'
    )->setParameters(array(
      'fechainicio' => $fechainicio,
      'fechafin' => $fechafin,));	
    return $query->getResult();
  }


}
