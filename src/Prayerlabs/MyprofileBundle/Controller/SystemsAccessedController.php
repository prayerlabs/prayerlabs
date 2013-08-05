<?php

namespace Prayerlabs\MyprofileBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Prayerlabs\MyprofileBundle\Entity\SystemsAccessed;
use Prayerlabs\MyprofileBundle\Form\SystemsAccessedType;

/**
 * SystemsAccessed controller.
 *
 */
class SystemsAccessedController extends Controller
{

    /**
     * Lists all SystemsAccessed entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrayerlabsMyprofileBundle:SystemsAccessed')->findAll();

        return $this->render('PrayerlabsMyprofileBundle:SystemsAccessed:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SystemsAccessed entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new SystemsAccessed();
        $form = $this->createForm(new SystemsAccessedType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_systems_accessed_show', array('id' => $entity->getId())));
        }

        return $this->render('PrayerlabsMyprofileBundle:SystemsAccessed:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new SystemsAccessed entity.
     *
     */
    public function newAction()
    {
        $entity = new SystemsAccessed();
        $form   = $this->createForm(new SystemsAccessedType(), $entity);

        return $this->render('PrayerlabsMyprofileBundle:SystemsAccessed:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SystemsAccessed entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:SystemsAccessed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SystemsAccessed entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:SystemsAccessed:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing SystemsAccessed entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:SystemsAccessed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SystemsAccessed entity.');
        }

        $editForm = $this->createForm(new SystemsAccessedType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:SystemsAccessed:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing SystemsAccessed entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:SystemsAccessed')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SystemsAccessed entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SystemsAccessedType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_systems_accessed_edit', array('id' => $id)));
        }

        return $this->render('PrayerlabsMyprofileBundle:SystemsAccessed:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SystemsAccessed entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrayerlabsMyprofileBundle:SystemsAccessed')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SystemsAccessed entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prayerlabs_systems_accessed'));
    }

    /**
     * Creates a form to delete a SystemsAccessed entity by id.
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
