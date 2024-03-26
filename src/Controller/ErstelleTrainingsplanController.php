<?php

namespace App\Controller;

use App\Entity\TrainingsPlan;
use App\Form\ErstelleTrainingsplanType;
use Doctrine\ORM\EntityManagerInterface; // Importiere EntityManagerInterface
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ErstelleTrainingsplanController extends AbstractController
{
    private $entityManager; // Deklariere eine Variable für den EntityManager

    // Injiziere den EntityManager durch den Konstruktor
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/create_trainingsplan', name: 'app_erstelle_trainingsplan')]
    public function index(Request $request): Response
    {
        $yourEntity = new TrainingsPlan();
        $form = $this->createForm(ErstelleTrainingsplanType::class, $yourEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Hier kannst du die User-ID setzen
            $yourEntity->setUserId($this->getUser()->getId());

            // Das Entity persistieren
            $this->entityManager->persist($yourEntity);
            $this->entityManager->flush();

            // Weiterleitung oder eine Antwort senden
            return $this->redirectToRoute('app_gym_buddys');
        }
        return $this->render('erstelle_trainingsplan/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
