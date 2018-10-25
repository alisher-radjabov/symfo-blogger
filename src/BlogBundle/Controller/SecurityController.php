<?php
/**
 * Created by PhpStorm.
 * User: Alisher advaster@gmail.com
 */

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class SecurityController extends Controller
{
    /**
     * @param AuthenticationUtils $authenticationUtils
     * @return mixed
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        return $this->render('BlogBundle:Security:login.html.twig', [
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'last_username' => $authenticationUtils->getLastUsername()
        ]);
    }

    /**
     * @return Response
     */
    public function logoutAction()
    {
        return new Response();
    }
}
