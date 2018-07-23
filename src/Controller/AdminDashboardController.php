<?php

namespace App\Controller;
use App\Entity\Lead;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminDashboardController extends Controller
{
  /**
   * @Route("/dashboard", methods={"GET"}, name="admin_dashboard")
   */
  public function index()
  {
    $repository = $this->getDoctrine()->getRepository(Lead::Class);

    $leads = $repository->findAll();

    return $this->render('admin_dashboard/index.html.twig', ['leads' => $leads]);
  }
}
