<?php

namespace App\Controller\Portfolio;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LinksController extends AbstractController
{
    #[Route('/portfolio/links', name: 'links_index')]
    public function index(): Response
    {
        return $this->render('portfolio/links/index.html.twig', [
            'controller_name' => 'LinksController',
        ]);
    }
}
