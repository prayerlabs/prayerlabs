<?php

namespace Prayerlabs\MyprofileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Prayerlabs\MyprofileBundle\Entity\Posts;
use Prayerlabs\MyprofileBundle\Entity\Comments;
use Prayerlabs\MyprofileBundle\Entity\Prayed;
use Prayerlabs\MyprofileBundle\Form\PostsType;
use Prayerlabs\MyprofileBundle\Entity\Accounts;

/**
 * Posts controller.
 *
 */
class PostsController extends Controller
{

    /**
     * Lists all Posts entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PrayerlabsMyprofileBundle:Posts')->findAll();

        return $this->render('PrayerlabsMyprofileBundle:Posts:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Posts entity.
     *
     */
    public function createAction(Request $request)
    {
        $session = $this->getRequest()->getSession();
        $user = $session->get('user');
        $description = $request->request->get('description');
        if(!empty($description))
        {
            $em = $this->getDoctrine()->getManager();

            $entity = new Posts();
            $entity->setDescription($description);
            $user_entity = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->find($user->getId());
            $entity->setAccounts($user_entity);
            
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('prayerlabs_profile'));
            //return new Response("true");
            
        }
        else
        {
           // return new Response("false");
           return $this->redirect($this->generateUrl('prayerlabs_posts_add'));
        }
        /*
        $entity  = new Posts();
        $form = $this->createForm(new PostsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_posts_show', array('id' => $entity->getId())));
        }

        return $this->render('PrayerlabsMyprofileBundle:Posts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));*/
    }

    /**
     * Displays a form to create a new Posts entity.
     *
     */
    public function newAction()
    {
        $entity = new Posts();
        $form   = $this->createForm(new PostsType(), $entity);

        return $this->render('PrayerlabsMyprofileBundle:Posts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    /**
     * Displays a form to create a new Posts entity.
     *
     */
    public function addAction()
    {
        return $this->render('PrayerlabsMyprofileBundle:Posts:add.html.twig');
    }
    
    /**
     * Finds and displays a Posts entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Posts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Posts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Posts:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }
	
	/**
	 * Saves the comment 
	 */
	public function saveCommentAction(Request $request)
	{
		$postId      = $request->get('postId');
		$commentText = $request->get('comment');
		$session     = $request->getSession();
        $user        = $session->get('user');        
		
		$em = $this->getDoctrine()->getManager();

        $comment = new Comments();
		
		$user_entity = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->find($user->getId());
		$post_entity = $em->getRepository('PrayerlabsMyprofileBundle:Posts')->find($postId);
        $comment->setAccounts($user_entity);
        $comment->setPosts($post_entity);

		$comment->setDescription($commentText);
		$em->persist($comment);
		$em->flush();

        return new Response("true");
		
	}
       
/**
	 * Saves the comment 
	 */
	public function savePrayAction(Request $request)
	{
		$postId      = $request->get('postId');
		$session     = $request->getSession();
                $user        = $session->get('user');        
		
		$em = $this->getDoctrine()->getManager();

                $prayed = new Prayed();
		
		$user_entity = $em->getRepository('PrayerlabsMyprofileBundle:Accounts')->find($user->getId());
		$post_entity = $em->getRepository('PrayerlabsMyprofileBundle:Posts')->find($postId);
                
                $prayed->setAccounts($user_entity);
                $prayed->setPosts($post_entity);

		$em->persist($prayed);
		$em->flush();

                return new Response("true");
		
	}    /**
     * Displays a form to edit an existing Posts entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Posts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Posts entity.');
        }

        $editForm = $this->createForm(new PostsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('PrayerlabsMyprofileBundle:Posts:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Posts entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PrayerlabsMyprofileBundle:Posts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Posts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PostsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('prayerlabs_posts_edit', array('id' => $id)));
        }

        return $this->render('PrayerlabsMyprofileBundle:Posts:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Posts entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PrayerlabsMyprofileBundle:Posts')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Posts entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('prayerlabs_posts'));
    }

    /**
     * Creates a form to delete a Posts entity by id.
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
