<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GymBuddysController extends AbstractController
{
    #[Route('/dashboard', name: 'app_gym_buddys')]
    public function index(): Response
    {
        return $this->render('gym_buddys/index.html.twig', [
            'controller_name' => 'GymBuddysController',
        ]);
    }
}


