<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Post;
use BlogBundle\Managers\PostManager;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * DefaultController
 */
class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @param PostManager $postManager
     * @param int $page
     * @return mixed
     */
    public function indexAction(Request $request, PostManager $postManager, $page = 1)
    {

        $posts = $postManager->setSearchString($request->get('s'))->getPosts($page);

        return $this->render('BlogBundle:Default:index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function viewAction(Post $post)
    {
        return $this->render('BlogBundle:default:view.html.twig', ['post' => $post]);
    }
}
