<?php

namespace App\Controller;

use App\Entity\Stats;
use App\Entity\Uebungen;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MeineUebungenController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/uebungen/{id}', name: 'app_meine_uebungen')]
    public function index($id): Response
    {
        $repository = $this->entityManager->getRepository(Uebungen::class);
        $uebungen = $repository->findBy(['plan_id' => $id]);
        $statsRepository = $this->entityManager->getRepository(Stats::class);
        $stats = [];
        foreach ($uebungen as $uebung){
            $newstat= $statsRepository->findBy(['uebung_id' => $uebung->getId()]);
        foreach ($newstat as $new){
            array_push($stats, $new);
        }
        }
        return $this->render('meine_uebungen/index.html.twig', [
            'uebungen' => $uebungen,
            'planId' => $id,
            'stats' => $stats ?? [],
        ]);
    }
}
