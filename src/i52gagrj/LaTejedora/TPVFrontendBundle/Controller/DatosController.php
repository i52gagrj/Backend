<?php 

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
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

  /*public function todosproductosAction()
  {
    //Extraer la cabecera de la petición
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
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
  }*/

  public function todosproductosAction()
  {
    $respuesta = array();    
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
    $mandar = new Response(json_encode(array(
      'code' => 0,
      'response'=> array(
        'productos' => $respuesta))));
    $mandar->headers->set('Content-Type', 'application/json');
    return $mandar;
  }  

  public function todosclientesAction()
  {
    //Extraer la cabecera de la petición
    $request=$this->getRequest();
    $headers=$request->headers->all()
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los socios
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
            'respuesta' => "El usuario no se ha identificado correctamente",
            'cabecera' => $tokend))));      
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
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
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
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
      $tokend=JWT::decode(trim($token[1],'"'));
      //Si los datos del token son correctos, se guarda la venta
      if($this->comprobarToken($tokend->id, $tokend->username))
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
    $venta->setContado($contado);

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

////////////////////////////FIN VENTA////////////////////////////



//////////////////////////////CIERRE/////////////////////////////

  public function cierreventasAction(){    
    //Devuelve todas las ventas realizadas hoy.
    //Hay que tratar el listado para que devuelva una consulta JSON.
    //Extraer la cabecera de la petición
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      $fechac; 
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
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
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
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
    //Devuelve el diario (cierre) del dia anterior  
    //Extraer la cabecera de la petición
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
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
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
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
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
      $tokend=JWT::decode(trim($token[1],'"'));
      $respuesta = array();
      //Si los datos del token son correctos, se cargan los productos
      if($this->comprobarToken($tokend->id, $tokend->username))
      {    
        $request = $this->getRequest(); 
        $idventa=$request->get('idventa');
        $venta = $this->devuelveVenta($idventa);  	
        /////////Aquí: condicional si no existe la venta///////
        /////////AÑADIR//////////////////    
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
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
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
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
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



/////////////////////////////CUOTAS//////////////////////////////
  public function todosclientescuotasAction()
  {
    //Extraer la cabecera de la petición
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
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
    $headers=apache_request_headers();
    //Si contiene el token, en la sección Authorization
    if(isset($headers["Authorization"]))
    {
      $token=explode(" ", $headers["Authorization"]);
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
///////////////////////////FIN CUOTAS////////////////////////////

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
    /*foreach($usuarios as $usuario)
    {
      if($usuario->getUsername()==$user) return $usuario;   
    }*/
  }  

  public function apache_request_headers2() 
{
        $arh = array();
        $rx_http = '/\AHTTP_/';

        foreach($_SERVER as $key => $val) {
            if( preg_match($rx_http, $key) ) {
                $arh_key = preg_replace($rx_http, '', $key);
                $rx_matches = array();
           // do some nasty string manipulations to restore the original letter case
           // this should work in most cases
                $rx_matches = explode('_', $arh_key);

                if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
                    foreach($rx_matches as $ak_key => $ak_val) {
                        $rx_matches[$ak_key] = ucfirst($ak_val);
                    }

                    $arh_key = implode('-', $rx_matches);
                }

                $arh[$arh_key] = $val;
            }
        }

        return( $arh );
    }
  
}
