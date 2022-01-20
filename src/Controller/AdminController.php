<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\Category;
use App\Form\EditRoleType;
use App\Form\AddArticleType;
use App\Form\AddCategoryType;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'adminUser')]
    public function usersList(CategoryRepository $category, UserRepository $users, ArticleRepository $article)
    {
        return $this->render('admin/listUser.html.twig', [
            'users' => $users->findAll(),
            'category' => $category->findAll(),
            'article' => $article->findAll()
        ]);
    }

/**
 * @Route("admin/modifier/{id}", name="adminModifRole")
 */
public function editUser(CategoryRepository $category, User $user, Request $request, ManagerRegistry $doctrine)
{
    $form = $this->createForm(EditRoleType::class, $user);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $doctrine->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $this->addFlash('message', 'Utilisateur modifié avec succès');
        return $this->redirectToRoute('adminUser');
    }
    
    return $this->render('admin/modifRole.html.twig', [
        'userForm' => $form->createView(),
        'category' => $category->findAll()
    ]);
}

/**
 * @Route("admin/addCategory", name="addCategory")
 */
public function addCategory(CategoryRepository $categorys, Request $request, ManagerRegistry $doctrine) :Response
{

    $category = new Category();
    $form = $this->createForm(AddCategoryType::class, $category);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);
        $entityManager->flush();

        $this->addFlash('message', 'Catégorie ajoutée avec succès!');
        return $this->redirectToRoute('addCategory');
    }

    return $this->render('admin/addCategory.html.twig',[
        'form' => $form->createView(),
        'category' => $categorys->findAll()
    ]);
}

/**
 * @Route("admin/modifCategory/{id}", name="modifCategory")
 */
public function modifCategory(CategoryRepository $categorys,Category $category, Request $request, ManagerRegistry $doctrine) :Response
{
    $form = $this->createForm(AddCategoryType::class, $category);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $doctrine->getManager();
        $entityManager->persist($category);
        $entityManager->flush();

        $this->addFlash('message', 'Catégorie modifiée avec succès!');
    }

    return $this->render('admin/modifCategory.html.twig',[
        'form' => $form->createView(),
        'category' => $categorys->findAll()
    ]);
}


    /**
     * @Route("admin/addArticle", name="addArticle")
     */
    public function addArticle(CategoryRepository $category,Request $request, ManagerRegistry $doctrine) :Response
    {

        $Article = new Article();
        $form = $this->createForm(AddArticleType::class, $Article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($Article);
            $entityManager->flush();

            $this->addFlash('message', 'Catégorie ajoutée avec succès!');
            return $this->redirectToRoute('addArticle');
        }

        return $this->render('admin/addArticle.html.twig',[
            'form' => $form->createView(),
            'category' => $category->findAll()
        ]);
    }

/**
 * @Route("admin/modifArticle/{id}", name="modifArticle")
 */
public function modifArticle(CategoryRepository $categorys,Article $article, Request $request, ManagerRegistry $doctrine) :Response
{
    $form = $this->createForm(AddArticleType::class, $article);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $doctrine->getManager();
        $entityManager->persist($article);
        $entityManager->flush();

        $this->addFlash('message', 'Article modifié avec succès!');
    }

    return $this->render('admin/modifArticle.html.twig',[
        'form' => $form->createView(),
        'category' => $categorys->findAll()
    ]);
}
}
?>