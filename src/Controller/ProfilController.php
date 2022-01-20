<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditRoleType;
use App\Form\InfoUserType;
use App\Repository\UserRepository;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    #[Route('/profile/{id}', name: 'profileUser')]
    public function usersList(CategoryRepository $category, User $users, Request $request, ManagerRegistry $doctrine)
    {

        $form = $this->createForm(InfoUserType::class, $users);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){


            $entityManager = $doctrine->getManager();
            $entityManager->persist($users);
            $entityManager->flush();

        $this->addFlash('message', 'Utilisateur modifié avec succès');
        }
        return $this->render('profile/user.html.twig', [
            'form' => $form->createView(),
            'category' => $category->findAll()
        ]);
    }
}

?>