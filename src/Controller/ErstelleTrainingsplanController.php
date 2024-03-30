<?php

namespace App\Controller;

use App\Entity\TrainingsPlan;
use App\Form\ErstelleTrainingsplanType;
use Doctrine\ORM\EntityManagerInterface; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ErstelleTrainingsplanController extends AbstractController
{
    private $entityManager;

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
            $yourEntity->setUserId($this->getUser()->getId());

            $this->entityManager->persist($yourEntity);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_gym_buddys');
        }
        return $this->render('erstelle_trainingsplan/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
