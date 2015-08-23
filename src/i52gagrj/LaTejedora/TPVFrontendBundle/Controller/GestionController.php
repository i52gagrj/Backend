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

class GestionController extends Controller
{
//////////////////////////PROVEEDORES////////////////////////////////

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


  /*public function recibeproveedorAction()
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
        if($data['id']{
          $respuesta=$this->modificaProveedor($data['id'], $data['nombre'], $data['nif'], $data['direccion'], $data['poblacion'], $data['provincia'], $data['cp'], $data['telefijo'], $data['telemovil'], $data['email']);
        }
        else{
          $respuesta=$this->persisteProveedor($data['nombre'], $data['nif'], $data['direccion'], $data['poblacion'], $data['provincia'], $data['cp'], $data['telefijo'], $data['telemovil'], $data['email']);
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
  
  protected function persisteProveedor($nombre, $nif, $direccion, $poblacion, $provincia, $cp, $telefijo, $telemovil, $email)
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

      $em->persist($proveedor);
      $em->flush();
      return "El proveedor se ha guardado correctamente"; 
    } 
  }

  protected function modificaProveedor($id, $nombre, $nif, $direccion, $poblacion, $provincia, $cp, $telefijo, $telemovil, $email)
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
      
    $em->flush();
    return "El proveedor se ha modificado correctamente";
  }*/


//////////////////////////PRODUCTOS//////////////////////////////////

//////////////////////////SOCIOS/////////////////////////////////////

//////////////////////////USUARIOS///////////////////////////////////

//////////////////////////TIPOS//////////////////////////////////////
  
}
