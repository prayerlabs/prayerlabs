<?php

namespace Prayerlabs\MyprofileBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Prayerlabs\MyprofileBundle\Entity\Prayed;
use Prayerlabs\MyprofileBundle\Form\PrayedType;

/**
 * Prayed controller.
 *
 */
class PrayedController extends Controller
{

    /**
     * Lists all Prayed entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrayerlabsMyprofileBundle:Prayed')->findAll();

        return $this->render('PrayerlabsMyprofileBundle:Prayed:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Prayed entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Prayed();
        $form = $this->createForm(new PrayedType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_prayed_show', array('id' => $entity->getId())));
        }

        return $this->render('PrayerlabsMyprofileBundle:Prayed:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Prayed entity.
     *
     */
    public function newAction()
    {
        $entity = new Prayed();
        $form   = $this->createForm(new PrayedType(), $entity);

        return $this->render('PrayerlabsMyprofileBundle:Prayed:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Prayed entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Prayed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prayed entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Prayed:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Prayed entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Prayed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prayed entity.');
        }

        $editForm = $this->createForm(new PrayedType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Prayed:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Prayed entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Prayed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Prayed entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PrayedType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_prayed_edit', array('id' => $id)));
        }

        return $this->render('PrayerlabsMyprofileBundle:Prayed:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Prayed entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrayerlabsMyprofileBundle:Prayed')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Prayed entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prayerlabs_prayed'));
    }

    /**
     * Creates a form to delete a Prayed entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
