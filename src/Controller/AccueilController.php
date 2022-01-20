<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(CategoryRepository $category): Response
    {
        
        return $this->render('pages/accueil.html.twig', [
            'category' => $category->findAll()
        ]);
    }
}
