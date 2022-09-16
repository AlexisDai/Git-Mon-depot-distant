<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/apiv2/produits', name: 'api1', methods: ['get'])]
    public function api1(ProduitRepository $repo): Response
    {
        $liste = $repo->findAll();

        return $this->json($liste, 200, 
            [ "Content-type" => "application/json"],
            [ "groups" => "read:produit" ]);
    }

    #[Route('/apiv2/produits', name: 'api2', methods: ['post'])]
    public function api2(Request $request, EntityManagerInterface $em): Response
    {
        $body = json_decode($request->getContent());

        $prix = $body->prix;
        $nom = $body->nom;

        $p = new Produit();
        $p->setNom($nom);
        $p->setPrix($prix);
        $p->setDescription("");

        $em->persist($p);
        $em->flush();

        return $this->json(
            $p, 
            200, 
            [ ],
            [ "groups" => "read:produit" ]);
    }
}
