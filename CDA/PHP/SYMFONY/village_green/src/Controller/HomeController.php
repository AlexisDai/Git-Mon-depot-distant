<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HomeController extends AbstractController
{
    #[Route('/catalogue', name: 'catalogue')]
    public function index(CategorieRepository $repo): Response
    {
        $categories = $repo->findAll();
        
        return $this->render('home/catalogue.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/catalogue_categorie/{categorie}', name: 'catalogue_categorie')]
    public function catalogue_categorie(Categorie $categorie): Response
    {
        
        return $this->render('home/catalogue_categorie.html.twig', [
            'categorie' => $categorie
        ]);
    }

    #[Route('/test1', name: 'test1')]
    public function test1(SessionInterface $session): Response
    {
        $panier = $session->get("panier", []);

        $panier[] = "toto";

        $session->set("panier", $panier);

        $panier = $session->get("panier", []);

        dd($panier);

        return new Response("ok");
    }

    #[Route('/test2', name: 'test2')]
    public function test2(SessionInterface $session): Response
    {
        $panier = $session->get("panier", []);

        dd($panier);

        return new Response("ok");
    }
}
