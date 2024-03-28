<?php

namespace App\Controller;

use App\Entity\Uebungen;
use App\Form\NeueUebungFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NeueUebungController extends AbstractController
{
    private $entityManager; // Deklariere eine Variable für den EntityManager

    // Injiziere den EntityManager durch den Konstruktor
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/neue_uebung/{id}', name: 'app_neue_uebung')]
    public function index(Request $request,$id): Response
    {
        $yourEntity = new Uebungen();
        $form = $this->createForm(NeueUebungFormType::class,$yourEntity);
        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) 
            {
                // Daten des Formulars speichern oder verarbeiten
                $formdata = $form->getData();
                $formdata->setPlanId($id);
                $this->entityManager->persist($form->getData());
                $this->entityManager->flush();
    
                // Weiterleitung oder Erfolgsmeldung anzeigen
            }
    
        return $this->render('neue_uebung/index.html.twig', [
            'form' => $form->createView(),
            'id' => $id,
        ]);
    }
}
