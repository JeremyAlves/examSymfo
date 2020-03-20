<?php

namespace App\Controller;

use App\Entity\Stat;
use App\Form\StatType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatController extends AbstractController
{
/**
* Affiche le formulaire de création de statistique
* @Route("/stat/new", name="stat_new", methods={"GET", "POST"})
*/
public function new(Request $request)
{
    $stat = new Stat();

    $form = $this->createForm(StatType::class, $stat);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $stat = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($stat);
        $entityManager->flush();

        return $this->redirectToRoute('app_index');
    }

    return $this->render('stat/form.html.twig', [
        'form' => $form->createView()
    ]);
}
}
