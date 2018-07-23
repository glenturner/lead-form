<?php

namespace App\Controller;
use App\Entity\Admin;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends Controller
{
  /**
   * @Route("/", methods={"GET"}, name="home")
   */
  public function index(UserPasswordEncoderInterface $encoder)
  
  {
    // $entityManager = $this->getDoctrine()->getManager();

    //   $admin = new Admin();
    //   $admin->setUsername('braves');
    //   $plainPassword = 'secret';
    //   $encoded = $encoder->encodePassword($admin, $plainPassword);
    //   $admin->setPassword($encoded);

    //   // tell Doctrine you want to (eventually) save the Product (no queries yet)
    //   $entityManager->persist($admin);

    //   // actually executes the queries (i.e. the INSERT query)
    //   $entityManager->flush();
    return $this->render('home/index.html.twig');
  }
}
