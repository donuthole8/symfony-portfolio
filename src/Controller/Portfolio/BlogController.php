<?php

namespace App\Controller\Portfolio;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Blog;

class BlogController extends AbstractController
{
    /**
     * @Route("/portfolio/blog", name="blog_index")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $blogs = $em->getRepository(Blog::class)->findAll();

        return $this->render('portfolio/blog/index.html.twig', [
            'blogs' => $blogs,
        ]);
    }
    
    /**
     * @Route("/portfolio/blog/{id}", name="blog_content", requirements={"id"="\d+"})
     */
    public function showContentPage($id, EntityManagerInterface $em)
    {
        $blog = $em->getRepository(Blog::class)->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('The post does not exist');
        }

        return $this->render('portfolio/blog/content.html.twig', [
            'blog' => $blog,
        ]);
    }

    /**
     * @Route("/portfolio/blog/post", name="blog_post")
     */
    public function postNewBlog()
    {
        $form = $this->createFormBuilder(new Blog())
            ->add('title')
            ->add('content')
            ->getForm();

        return $this->render('portfolio/blog/post.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
