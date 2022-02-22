<?php

namespace App\Controller;

use App\Form\EditUserType;
use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
 /**
     * @Route("/admin", name="admin_")
     */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
     /**
     * Liste des utilisateurs
     * @Route("/utilisateurs", name="utilisateurs")
     */

    public function usersList(UsersRepository $users){
        return $this->render('admin/utilisateurs.html.twig',[

            'users'=>$users->findAll()
        ]);
    }

    /**
     * modifier utilisateur
     * @Route("/utilisateur/modifier/{id}", name="modifier_utilisateur")
     */


    public function edituser (Users $user, Request $request){
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid() ){
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($user);
         $entityManager->flush();
         $this->addFlash('message', 'utilisateur modifie avec succes' );
         return $this->redirectToRoute('admin_utilisateurs');
        }

        return $this->render('admin/edituser.html.twig', [
            'userForm' => $form->createView()
        ]);
    }
    
}

