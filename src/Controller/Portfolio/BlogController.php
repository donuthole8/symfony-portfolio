<?php

namespace App\Controller\Portfolio;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
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
    public function showContentPage(EntityManagerInterface $em, $id)
    {
        $blog = $em->getRepository(Blog::class)->find($id);

        if (!$blog) {
            throw $this->createNotFoundException(
                '指定されたブログは見つかりませんでした'
            );
        }

        return $this->render('portfolio/blog/content.html.twig', [
            'blog' => $blog,
        ]);
    }

    /**
     * @Route("/portfolio/blog/post", name="blog_post")
     */
    public function postNewBlog(Request $request, EntityManagerInterface $em)
    {
        $blog = new Blog();
        $form = $this->createFormBuilder($blog)
            ->add('title')
            ->add('content')
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $blog->setCreatedAt(new \DateTime());
            
            // エンティティを永続化
            $em->persist($blog);
            $em->flush();
        
            // 一覧へリダイレクト
            return $this->redirectToRoute('blog_index');
        }

        return $this->render('portfolio/blog/post.html.twig', [
            'blog' => $blog,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/portfolio/blog/{id}/edit", name="blog_edit", requirements={"id"="\d+"})
     */
    public function editContentPage(Request $request, EntityManagerInterface $em, $id)
    {
        $blog = $em->getRepository(Blog::class)->find($id);

        if (!$blog) {
            throw $this->createNotFoundException(
                '指定されたブログは見つかりませんでした'
            );
        }

        $form = $this->createFormBuilder($blog)
            ->add('title')
            ->add('content')
            ->getForm();
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('blog_index');
        }

        return $this->render('portfolio/blog/post.html.twig', [
            'blog' => $blog,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/portfolio/blog/{id}/delete", name="blog_delete", requirements={"id"="\d+"})
     */
    public function deleteContentPage(EntityManagerInterface $em, $id)
    {
        $blog = $em->getRepository(Blog::class)->find($id);

        if (!$blog) {
            throw $this->createNotFoundException(
                '指定されたブログは見つかりませんでした'
            );
        }

        $em->remove($blog);
        $em->flush();

        return $this->redirectToRoute('blog_index');
    }
}
