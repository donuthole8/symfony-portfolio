<?php

namespace App\Controller\Portfolio;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/portfolio/about', name: 'about_index')]
    public function index(): Response
    {
        return $this->render('portfolio/about/index.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }
}
