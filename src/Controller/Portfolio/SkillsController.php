<?php

namespace App\Controller\Portfolio;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SkillsController extends AbstractController
{
    #[Route('/portfolio/skills', name: 'skills_index')]
    public function index(): Response
    {
        return $this->render('portfolio/skills/index.html.twig', [
            'controller_name' => 'SkillsController',
        ]);
    }
}
