<?php

namespace App\Controller;

use App\Form\SavType;
use \Mailjet\Resources;
use App\Form\ContactType;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function formContact(Request $request, CategoryRepository $category) :response
    {
        $api_key='e8483e8de8cdffe50746cc0cd44cadd6';
        $api_key_private='123be90b204e75d9037e869df42c89b5';
        $mj = new \Mailjet\Client($api_key,$api_key_private,true,['version' => 'v3.1']);
        

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contactFormData = $form->getData();
            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => $contactFormData['email'],
                            'Name' => $contactFormData['nom'].' '.$contactFormData['prenom']
                        ],
                        'To' => [
                            [
                            'Email' => 'mathieu.laurent1995@gmail.com',
                            'Name' => 'Mathieu Laurent'
                            ]
                        ],
                        'Subject' => $contactFormData['objet'],
                        'TextPart' => $contactFormData['contenu'],
                        ]
                    ]
                ];
                $mj->post(Resources::$Email,['body' => $body]);
                $this->addFlash('success', 'Votre message a été envoyé!');
                return $this->redirectToRoute('contact');
        }

        return $this->render('content/form/contact.html.twig', [
            'form' => $form->createView(),
            'category' => $category->findAll()
        ]);
    }

    #[Route('/sav', name: 'sav')]
    public function formSav(Request $request, CategoryRepository $category) :response
    {
        
        $api_key='e8483e8de8cdffe50746cc0cd44cadd6';
        $api_key_private='123be90b204e75d9037e869df42c89b5';
        $mj = new \Mailjet\Client($api_key,$api_key_private,true,['version' => 'v3.1']);


        $formSav = $this->createForm(SavType::class);
        $formSav->handleRequest($request);

        if($formSav->isSubmitted() && $formSav->isValid()){
            $savFormData = $formSav->getData();
            $body = [
                [
                'Messages' => [
                    'From' => [
                        'Email' => $savFormData['email'],
                    ],
                    'To' => [
                        [
                        'Email' => 'mathieu.laurent1995@gmail.com',
                        'Name' => 'Mathieu Laurent'
                        ]
                    ],
                    'Subject' => $savFormData['numcommande'],
                    'TextPart' => $savFormData['motif'].' '.$savFormData['message']
                    ]
                ]
            ];
                $mj->post(Resources::$Email,['body' => $body]);
                $this->addFlash('success', 'Votre message a été envoyé!');
                return $this->redirectToRoute('sav');
        }

        return $this->render('content/form/sav.html.twig', [
            'form' => $formSav->createView(),
            'category' => $category->findAll()
        ]);
    }
    
}
