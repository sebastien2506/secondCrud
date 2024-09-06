<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'Homepage')]
    public function index(): Response
    {
        return $this->render('public/index.html.twig', [
            'titre' => 'MyCrudV2',
        ]);
    }
}
