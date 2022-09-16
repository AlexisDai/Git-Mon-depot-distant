<?php

namespace App\Controller;

use App\Form\ProdType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddController extends AbstractController
{
    #[Route('/add1', name: 'add1')]
    public function index(Request $request): Response
    {
        if ($request->isMethod("post")) {
            $nom = $request->request->get("nom");
            dd($nom);
        }

        return $this->render('add/add1.html.twig', [
            'controller_name' => 'AddController',
        ]);
    }

    #[Route('/add2', name: 'add2')]
    public function add2(Request $request): Response
    {
        $form = $this->createForm(ProdType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $nom = $form->get("nom")->getData();
            dd($nom);
        }

        return $this->render('add/add2.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
