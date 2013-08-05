<?php

namespace Prayerlabs\MyprofileBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Prayerlabs\MyprofileBundle\Entity\Accounts;
use Prayerlabs\MyprofileBundle\Form\AccountsType;

/**
 * Accounts controller.
 *
 */
class AccountsController extends Controller
{

    /**
     * Lists all Accounts entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->findAll();

        return $this->render('PrayerlabsMyprofileBundle:Accounts:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Accounts entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Accounts();
        $form = $this->createForm(new AccountsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_accounts_show', array('id' => $entity->getId())));
        }

        return $this->render('PrayerlabsMyprofileBundle:Accounts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Accounts entity.
     *
     */
    public function newAction()
    {
        $entity = new Accounts();
        $form   = $this->createForm(new AccountsType(), $entity);

        return $this->render('PrayerlabsMyprofileBundle:Accounts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Accounts entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accounts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Accounts:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Accounts entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accounts entity.');
        }

        $editForm = $this->createForm(new AccountsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Accounts:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Accounts entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Accounts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AccountsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_accounts_edit', array('id' => $id)));
        }

        return $this->render('PrayerlabsMyprofileBundle:Accounts:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Accounts entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Accounts entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prayerlabs_accounts'));
    }

    /**
     * Creates a form to delete a Accounts entity by id.
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
