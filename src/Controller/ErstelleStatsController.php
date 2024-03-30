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
    private $entityManager;

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
            $yourEntity->setUebungId($id);
            $this->entityManager->persist($yourEntity);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_meine_uebungen', ['id' => $yourEntity->getUebungId()]);
            
        }
       

        return $this->render('erstelle_stats/index.html.twig', [
            'form' => $form->createView(),

        ]);
    }
}

