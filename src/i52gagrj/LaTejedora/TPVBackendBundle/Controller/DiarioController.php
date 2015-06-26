<?php

namespace i52gagrj\LaTejedora\TPVBackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Diario;

/**
 * Diario controller.
 *
 */
class DiarioController extends Controller
{

    /**
     * Lists all Diario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('i52LTPVFrontendBundle:Diario')->findAll();

        return $this->render('i52LTPVBackendBundle:Diario:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Diario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('i52LTPVFrontendBundle:Diario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diario entity.');
        }

        return $this->render('i52LTPVBackendBundle:Diario:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
