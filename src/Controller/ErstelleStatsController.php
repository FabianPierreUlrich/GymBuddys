<?php

namespace App\Controller;

use App\Entity\Stats;
use App\Entity\TrainingsPlan;
use App\Entity\Uebungen;
use App\Form\AddStatsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ErstelleStatsController extends AbstractController

{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/stats/{id}', name: 'app_erstelle_stats')]
    public function index(Request $request,$id): Response
    {
        $statsEntity = new Stats();
        $uebungenRepository = $this->entityManager->getRepository(Uebungen::class);
        $form = $this->createForm(AddStatsType::class, $statsEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statsEntity->setUebungId($id);
            $this->entityManager->persist($statsEntity);
            $this->entityManager->flush();
            $uebung = $uebungenRepository->findBy(["id"=>$statsEntity->getUebungId()]);
            #dd($uebung);
            $id = $uebung[0]->getPlanId();
            return $this->redirectToRoute('app_meine_uebungen', ["id"=>$id]);
        }
       

        return $this->render('erstelle_stats/index.html.twig', [
            'form' => $form->createView(),

        ]);
    }
}

