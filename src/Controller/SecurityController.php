<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;  
use App\Form\RegistrationType;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface; 




class SecurityController extends AbstractController

{










    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        if ($this->getUser()) {
            return $this->redirectToRoute('article_index');
        }

        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('security/login.html.twig' ,  ['error' => $error,]);
    }




    #[Route('/register', name: 'register')]
    public function register(Request $request, EntityManagerInterface $entityManager ,UserPasswordHasherInterface $passwordHasher, ): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setPassword(
                $passwordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );



        // Persistance de l'utilisateur dans la base de données
        $entityManager->persist($user);
        $entityManager->flush();  // Sauvegarde des données


            $this->addFlash('success', 'Inscription réussie !');

            return $this->redirectToRoute('login'); 
        }

        return $this->render('security/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }





#[Route('/logout', name: 'logout')]

    public function logout()
    {
        // Symfony gère la déconnexion automatiquement
    }
}
