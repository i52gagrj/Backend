<?php

namespace i52gagrj\LaTejedora\TPVBackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio;
use i52gagrj\LaTejedora\TPVFrontendBundle\Form\SocioType;

/**
 * Socio controller.
 *
 */
class SocioController extends Controller
{
     public function menuAction()
     {
         $params = array(
             'mensaje' => 'Gestion de Socios',
             'rutaCrear' => 'socio_new',  
             'rutaListado' => 'socio',  
         );

         return $this->render(
          'i52LTPVBackendBundle:Gestion:menu.html.twig',
           $params
         );
     }


    /**
     * Lists all Socio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('i52LTPVFrontendBundle:Socio')->findAll();

        return $this->render('i52LTPVBackendBundle:Socio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Socio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Socio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('socio_show', array('id' => $entity->getId())));
        }

        return $this->render('i52LTPVBacktendBundle:Socio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Socio entity.
     *
     * @param Socio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Socio $entity)
    {
        $form = $this->createForm(new SocioType(), $entity, array(
            'action' => $this->generateUrl('socio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Socio entity.
     *
     */
    public function newAction()
    {
        $entity = new Socio();
        $form   = $this->createCreateForm($entity);

        return $this->render('i52LTPVBackendBundle:Socio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Socio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('i52LTPVFrontendBundle:Socio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Socio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('i52LTPVBackendBundle:Socio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Socio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('i52LTPVFrontendBundle:Socio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Socio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('i52LTPVBackendBundle:Socio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Socio entity.
    *
    * @param Socio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Socio $entity)
    {
        $form = $this->createForm(new SocioType(), $entity, array(
            'action' => $this->generateUrl('socio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Socio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('i52LTPVFrontendBundle:Socio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Socio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('socio_edit', array('id' => $id)));
        }

        return $this->render('i52LTPVFrontendBundle:Socio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Socio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('i52LTPVFrontendBundle:Socio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Socio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('socio'));
    }

    /**
     * Creates a form to delete a Socio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('socio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
