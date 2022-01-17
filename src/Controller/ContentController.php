<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContentController extends AbstractController
{
    #[Route('/footer/{title}', name: 'footer')]
    public function cgv(string $title): Response
    {
        return $this->render('content/cgv.html.twig', [
            'controller_name' => 'ContentController',
            'title' => $title,
        ]);
    }

    #[Route('/footer/{title}', name: 'footer')]
    public function mentionLegale(string $title): Response
    {
        return $this->render('content/mentionLegale.html.twig', [
            'controller_name' => 'ContentController',
            'title' => $title,
        ]);
    }

    #[Route('/footer/{title}', name: 'footer')]
    public function politique(string $title): Response
    {
        return $this->render('content/politique.html.twig', [
            'controller_name' => 'ContentController',
            'title' => $title,
        ]);
    }
}
