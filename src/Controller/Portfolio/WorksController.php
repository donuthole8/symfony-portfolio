<?php

namespace App\Controller\Portfolio;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WorksController extends AbstractController
{
    #[Route('/portfolio/works', name: 'works_index')]
    public function index(): Response
    {
        return $this->render('portfolio/works/index.html.twig', [
            'controller_name' => 'WorksController',
        ]);
    }
}
