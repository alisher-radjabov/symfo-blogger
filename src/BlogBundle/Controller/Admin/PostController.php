<?php
/**
 * Created by PhpStorm.
 * User: Alisher advaster@gmail.com
 */

namespace BlogBundle\Controller\Admin;

use BlogBundle\Entity\Post;
use BlogBundle\Form\PostType;
use BlogBundle\Managers\PostManager;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * PostController
 */
class PostController extends Controller
{
    /**
     * @param Request     $request
     * @param PostManager $postManager
     * @param int         $page
     *
     * @return Response
     */
    public function indexAction(Request $request, PostManager $postManager, int $page = 1)
    {
        $posts = $postManager->setSearchString($request->get('s'))->getPosts($page);

        return $this->render('BlogBundle:Admin/Post:index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @param Request $request
     * @param PostManager $postManager
     * @return mixed
     * @throws \BlogBundle\Managers\ORMInvalidArgumentException
     * @throws \BlogBundle\Managers\OptimisticLockException
     */
    public function addAction(Request $request, PostManager $postManager)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $postManager->save($post);
            $this->addFlash('notice', 'Post created');

            return $this->redirectToRoute('admin_add_post');
        }

        return $this->render('BlogBundle:Admin/Post:add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @param PostManager $postManager
     * @return mixed
     * @throws \BlogBundle\Managers\ORMInvalidArgumentException
     * @throws \BlogBundle\Managers\OptimisticLockException
     */
    public function updateAction(Request $request, Post $post, PostManager $postManager)
    {
        /* @var Form $form */
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $postManager->save($post);

            $this->addFlash('notice', 'Post updated');
            return $this->redirectToRoute('admin_update_post', ['id' => $post->getId()]);
        }

        return $this->render('BlogBundle:Admin/Post:update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return mixed
     */
    public function deleteAction()
    {
        $this->addFlash('notice', 'Post deleted');

        return $this->redirectToRoute('admin_index');
    }
}
