<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Mailjet\Resources;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContentController extends AbstractController
{
    #[Route('/footer/{title}', name: 'footer')]
    public function cgv(string $title, CategoryRepository $category): Response
    {
        return $this->render('content/cgv.html.twig', [
            'controller_name' => 'ContentController',
            'title' => $title,
            'category' => $category->findAll()
        ]);
    }

    #[Route('/footer/{title}', name: 'footer')]
    public function mentionLegale(string $title, CategoryRepository $category): Response
    {
        return $this->render('content/cgv.html.twig', [
            'controller_name' => 'ContentController',
            'title' => $title,
            'category' => $category->findAll()
        ]);
    }

    #[Route('/footer/{title}', name: 'footer')]
    public function politique(string $title, CategoryRepository $category): Response
    {
        return $this->render('content/cgv.html.twig', [
            'controller_name' => 'ContentController',
            'title' => $title,
            'category' => $category->findAll()
        ]);
    }
}
