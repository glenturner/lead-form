<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminAuthController extends Controller
{
  /**
   * @Route("/login", methods={"GET"}, name="login")
   * @param AuthenticationUtils $authenticationUtils
   * @return \Symfony\Component\HttpFoundation\Response
   */
  public function showAdminLogin(AuthenticationUtils $authenticationUtils)
  {
    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('admin_auth/login.html.twig', [
      'lastUsername' => $lastUsername,
      'error' => $error,
    ]);

  }
}
