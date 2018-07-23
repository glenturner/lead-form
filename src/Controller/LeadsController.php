<?php

namespace App\Controller;

use App\Entity\Lead;
use App\Entity\Phone;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LeadsController extends Controller
{
  /**
   * @Route("/leads/create", methods={"GET"}, name="leads_create")
   * @param Request $request
   * @return \Symfony\Component\HttpFoundation\RediretResponse
   */

  public function create()
  {
    return $this->render('leads/create.html.twig', [
      'controller_name' => 'LeadsController',
    ]);
  }

  /**
   * @Route("/leads", methods={"POST"}, name="leads_store"))
   * @param Request $request
   * @return \Symfony\Component\HttpFoundation\RedirectResponse
   */
  public function store(Request $request)
  {
    $requestData = $request->request->all();

    // TODO: Validate request data here.

    $submittedToken = $request->request->get('_token');

    if (!$this->isCsrfTokenValid('save-lead', $submittedToken)) {
      $this->get('session')->getFlashBag()->add('message', 'Unable to process that request.');

      return $this->redirectToRoute('leads_create');
    }

    $newPhone = new Phone();
    $newPhone->setNumber($requestData['phone']);

    $newLead = new Lead();
    $newLead->setName($requestData['name']);
    $newLead->setEmail($requestData['email']);
    $newLead->setPostalCode($requestData['postal_code']);

    $newLead->setPhone($newPhone);

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->persist($newPhone);
    $entityManager->persist($newLead);
    $entityManager->flush();

    $this->get('session')->getFlashBag()->add('message', 'Successfully submitted lead.');

    return $this->redirectToRoute('leads_create');
  }

 /**
   * @Route("/leads/{lead}", methods={"POST"}, name="leads_destroy")
   * @param Request $request
   * @param Lead $lead
   * @return void
   */
                      //Route model binding Lead $lead
  public function destroy(Request $request, Lead $lead)
  {
    $submittedToken = $request->request->get('_token');

    if (!$this->isCsrfTokenValid('destroy-lead', $submittedToken)) {
      $this->get('session')->getFlashBag()->add('message', 'Unable to process that request.');

      return $this->redirectToRoute('admin_dashboard');
    }

    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($lead);
    $entityManager->flush();

    $this->get('session')->getFlashBag()->add('message', 'Successfully deleted lead.');

    return $this->redirectToRoute('admin_dashboard');
  }
}
