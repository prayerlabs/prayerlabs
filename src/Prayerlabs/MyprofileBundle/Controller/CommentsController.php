<?php

namespace Prayerlabs\MyprofileBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Prayerlabs\MyprofileBundle\Entity\Comments;
use Prayerlabs\MyprofileBundle\Form\CommentsType;

/**
 * Comments controller.
 *
 */
class CommentsController extends Controller
{

    /**
     * Lists all Comments entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrayerlabsMyprofileBundle:Comments')->findAll();

        return $this->render('PrayerlabsMyprofileBundle:Comments:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Comments entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Comments();
        $form = $this->createForm(new CommentsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_comments_show', array('id' => $entity->getId())));
        }

        return $this->render('PrayerlabsMyprofileBundle:Comments:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Comments entity.
     *
     */
    public function newAction()
    {
        $entity = new Comments();
        $form   = $this->createForm(new CommentsType(), $entity);

        return $this->render('PrayerlabsMyprofileBundle:Comments:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Comments entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Comments')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comments entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Comments:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Comments entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Comments')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comments entity.');
        }

        $editForm = $this->createForm(new CommentsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Comments:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Comments entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Comments')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Comments entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CommentsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_comments_edit', array('id' => $id)));
        }

        return $this->render('PrayerlabsMyprofileBundle:Comments:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Comments entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrayerlabsMyprofileBundle:Comments')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Comments entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prayerlabs_comments'));
    }

    /**
     * Creates a form to delete a Comments entity by id.
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
