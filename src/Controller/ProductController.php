<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
    public function index(ArticleRepository $articles, CategoryRepository $category): Response
    {
        return $this->render('pages/products.html.twig', [
            'products' => $articles->findAll(),
            'category' => $category->findAll()
        ]);
    }

    #[Route('/product/{id}', name: 'detailProduct')]
    public function detailProduct(ArticleRepository $articles, CategoryRepository $category, int $id): Response
    {
        return $this->render('pages/detailProduct.html.twig', [
            'product' => $articles->find($id),
            'category' => $category->findAll()
        ]);
    }
}
