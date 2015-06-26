<?php

namespace i52gagrj\LaTejedora\TPVBackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Venta;

/**
 * Venta controller.
 *
 */
class VentaController extends Controller
{

    /**
     * Lists all Venta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('i52LTPVFrontendBundle:Venta')->findAll();

        return $this->render('i52LTPVBackendBundle:Venta:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Venta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('i52LTPVFrontendBundle:Venta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Venta entity.');
        }

        return $this->render('i52LTPVBackendBundle:Venta:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
