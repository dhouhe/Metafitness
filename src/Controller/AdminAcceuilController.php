<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAcceuilController extends AbstractController
{
    /**
     * @Route("/admin/acceuil", name="admin_acceuil")
     */
    public function index(): Response
    {
        return $this->render('admin_acceuil/index.html.twig', [
            'controller_name' => 'AdminAcceuilController',
        ]);
    }
}
