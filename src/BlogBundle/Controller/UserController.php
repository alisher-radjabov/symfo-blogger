<?php

namespace BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Route("/", name="blog_user_index")
     */
    public function indexAction(Request $request)
    {
        return new Response('User controller');
    }

    /**
     * @Route("/list" name="blog_user_list")
     */
    public function listAction()
    {

    }
}
