<?php

namespace App\Controller;

use App\Entity\Country;
use App\Repository\CountryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_index", methods={"GET"})
     */
    public function index(CountryRepository $countryRepository)
    {
        $countrys = $countryRepository->findAll();
        return $this->render('app/index.html.twig', [
            'countrys' => $this->getDoctrine()->getRepository(Country::class)->findAll(),
        ]);
    }
}
