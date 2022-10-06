<?php

namespace App\Controller\Portfolio;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Blog;

class BlogController extends AbstractController
{
    #[Route('/portfolio/blog', name: 'app_portfolio_blog')]
    public function index(EntityManagerInterface $em): Response
    {
        $blogs = $em->getRepository(Blog::class)->findAll();

        return $this->render('portfolio/blog/index.html.twig', [
            'blogs' => $blogs,
        ]);
    }
}
