<?php

namespace i52gagrj\LaTejedora\TPVBackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use \Doctrine\Common\Collections\ArrayCollection;

use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio;

class CuotasController extends Controller
{
  public function cuotasAction(){
    $request = $this->getRequest(); // equivalente a $this->get('request');
    $session = $this->get('session');
    $ruta = $request->get('_route');
    $listado = array();
    $finalizado = false; 

    switch ($ruta) {
      case 'i52_ltpv_backend_cuotas':
        $listado = $this->llenaListado();
        $session->set('listado', $listado);
      break;

      case 'i52_ltpv_backend_cambiacuota':
        //Llamada para cambiar un artículo.
        $listado = $this->cambiaCuota($request->get('cuota'), $request->get('idsocio'));        
      break;

      case 'i52_ltpv_backend_finalizacuotas':
        //Llamada para terminar el proceso de devolución
        $listado = $this->finalizaCuotas();
        $finalizado = true; 
      break;
    }

    return $this->render('i52LTPVBackendBundle:Cuotas:cuotas.html.twig', 
      array(
        'listado' => $listado,
        'finalizado' => $finalizado,
      )); 
    
  }

  protected function devuelveTodosSocios(){ 
    $em = $this->getDoctrine()->getEntityManager();    
    $socios = $em->getRepository('i52LTPVFrontendBundle:Socio')->findAll();  	
    return $socios;
  }

  protected function devuelveSocio($idsocio){ 
    $em = $this->getDoctrine()->getEntityManager();    
    $socio = $em->getRepository('i52LTPVFrontendBundle:Socio')->find($idsocio);  	
    return $socio;
  }  

  public function llenaListado(){
    $clientes=array();
    $socios=$this->devuelveTodosSocios(); 

    foreach($socios as $socio)
    { if($socio->getId()!='1'){
        $cliente = array(
          'id' => $socio->getId(), 
          'nombre' => $socio->getNombre(),
          'cuota' => 20,
          'saldo' => $socio->getSaldo()  
        );
        array_push($clientes, $cliente);
      }
    }  
    return $clientes;       
  }

  public function cambiaCuota($cuota, $idsocio){
    $socios=array();
    $session = $this->get('session');    
    $listado = $session->get('listado');

    foreach($listado as $cliente)
    {
      if($cliente['id'] == $idsocio){
        $socio = array(
          'id' => $cliente['id'], 
          'nombre' => $cliente['nombre'],
          'cuota' => $cuota,
          'saldo' => $cliente['saldo']  
        );
      }
      else{
        $socio = array(
          'id' => $cliente['id'], 
          'nombre' => $cliente['nombre'],
          'cuota' => $cliente['cuota'],
          'saldo' => $cliente['saldo'] 
        );

      }   
      array_push($socios, $socio);      
    }
    $session->set('listado', $socios);
    return $socios;
  }

  public function finalizaCuotas(){    
    $em = $this->getDoctrine()->getEntityManager();
    $session = $this->get('session');    
    $listado = $session->get('listado');

    foreach($listado as $cliente)
    {
      $socio = $this->devuelveSocio($cliente['id']);
      $socio->setSaldo($socio->getSaldo() + $cliente['cuota']);
      $em->flush();         
    }
    return $this->devuelveTodosSocios();    
  } 
}
