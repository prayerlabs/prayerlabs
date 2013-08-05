<?php

namespace Prayerlabs\MyprofileBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Prayerlabs\MyprofileBundle\Entity\Freequency;
use Prayerlabs\MyprofileBundle\Form\FreequencyType;

/**
 * Freequency controller.
 *
 */
class FreequencyController extends Controller
{

    /**
     * Lists all Freequency entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrayerlabsMyprofileBundle:Freequency')->findAll();

        return $this->render('PrayerlabsMyprofileBundle:Freequency:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Freequency entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Freequency();
        $form = $this->createForm(new FreequencyType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_freequency_show', array('id' => $entity->getId())));
        }

        return $this->render('PrayerlabsMyprofileBundle:Freequency:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Freequency entity.
     *
     */
    public function newAction()
    {
        $entity = new Freequency();
        $form   = $this->createForm(new FreequencyType(), $entity);

        return $this->render('PrayerlabsMyprofileBundle:Freequency:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Freequency entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Freequency')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Freequency entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Freequency:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Freequency entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Freequency')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Freequency entity.');
        }

        $editForm = $this->createForm(new FreequencyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Freequency:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Freequency entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Freequency')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Freequency entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FreequencyType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_freequency_edit', array('id' => $id)));
        }

        return $this->render('PrayerlabsMyprofileBundle:Freequency:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Freequency entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrayerlabsMyprofileBundle:Freequency')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Freequency entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prayerlabs_freequency'));
    }

    /**
     * Creates a form to delete a Freequency entity by id.
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
