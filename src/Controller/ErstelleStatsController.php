<?php

namespace App\Controller;

use App\Entity\Stats;
use App\Form\AddStatsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ErstelleStatsController extends AbstractController

{
    private $entityManager; // Deklariere eine Variable für den EntityManager

    // Injiziere den EntityManager durch den Konstruktor
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/stats/{id}', name: 'app_erstelle_stats')]
    public function index(Request $request,$id): Response
    {
        $yourEntity = new Stats();
        $form = $this->createForm(AddStatsType::class, $yourEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Hier kannst du die User-ID setzen
            $yourEntity->setUebungId($id);
            // Das Entity persistieren
            $this->entityManager->persist($yourEntity);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_meine_uebungen', ['id' => $yourEntity->getUebungId()]);
            
        }
       

        return $this->render('erstelle_stats/index.html.twig', [
            'controller_name' => 'ErstelleStatsController',
            'form' => $form->createView(),

        ]);
    }
}

