<?php

namespace App\Controller;

use App\Entity\TrainingsPlan;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MeineTrainingsplaeneController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/trainingsplaene/{id}', name: 'app_trainingsplaene')]
    public function index($id): Response
    {
        $repository = $this->entityManager->getRepository(TrainingsPlan::class);
        $plaene = $repository->findBy(['user_id' => $id]);

        return $this->render('meine_trainingsplaene/index.html.twig', [
            'plaene' => $plaene,
        ]);
    }

}
