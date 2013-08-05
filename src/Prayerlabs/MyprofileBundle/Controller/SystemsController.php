<?php

namespace Prayerlabs\MyprofileBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Prayerlabs\MyprofileBundle\Entity\Systems;
use Prayerlabs\MyprofileBundle\Form\SystemsType;

/**
 * Systems controller.
 *
 */
class SystemsController extends Controller
{

    /**
     * Lists all Systems entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrayerlabsMyprofileBundle:Systems')->findAll();

        return $this->render('PrayerlabsMyprofileBundle:Systems:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Systems entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Systems();
        $form = $this->createForm(new SystemsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_systems_show', array('id' => $entity->getId())));
        }

        return $this->render('PrayerlabsMyprofileBundle:Systems:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Systems entity.
     *
     */
    public function newAction()
    {
        $entity = new Systems();
        $form   = $this->createForm(new SystemsType(), $entity);

        return $this->render('PrayerlabsMyprofileBundle:Systems:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Systems entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Systems')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Systems entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Systems:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Systems entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Systems')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Systems entity.');
        }

        $editForm = $this->createForm(new SystemsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Systems:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Systems entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Systems')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Systems entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SystemsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_systems_edit', array('id' => $id)));
        }

        return $this->render('PrayerlabsMyprofileBundle:Systems:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Systems entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrayerlabsMyprofileBundle:Systems')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Systems entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prayerlabs_systems'));
    }

    /**
     * Creates a form to delete a Systems entity by id.
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
