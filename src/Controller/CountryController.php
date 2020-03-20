<?php

namespace App\Controller;

use App\Entity\Country;
use App\Form\CountryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountryController extends AbstractController
{
    /**
     * @Route("/country", name="country")
     */
    public function index()
    {
        return $this->render('country/index.html.twig', [
            'controller_name' => 'CountryController',
        ]);
    }

    /**
    * Affiche le formulaire de création d'une country'
    * @Route("/country/new", name="country_new", methods={"GET", "POST"})
    */
    public function new(Request $request) {
    $country = new Country();

    $form = $this->createForm(CountryType::class, $country);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $country = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($country);
        $entityManager->flush();

        return $this->redirectToRoute('app_index');
    }

    return $this->render('country/form.html.twig', [
        'form' => $form->createView()
    ]);
}

    /**
     * @Route("/country/{country}", name="country_show", methods={"GET"}, requirements={"country"="\d+"})
     */
    public function show(Country $country): Response
    {
        return $this->render('country/show.html.twig', [
            'country' => $country
        ]);
    }
}
