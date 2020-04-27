<?php

namespace App\Controller;

use App\Entity\Destinataire;
use App\Form\RechercheType;
use App\Repository\DestinataireRepository;
use App\Repository\ValidationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RechercheController extends AbstractController
{
    /**
     * @Route("/recherche", name="recherche")
     */
    public function index(Request $request, DestinataireRepository $destinataireRepository, ValidationRepository $validationRepository): Response
    {
        $recherche = new Destinataire();

        $formRecherche = $this->createForm(RechercheType::class, $recherche);
        $formRecherche->handleRequest($request);


        $nomDestinataire = $recherche->getNomDestinataire();
        $rueDestinataire = $recherche->getNomRueDestinataire1();
        $villeDestinataire = $recherche->getIdAdresse();




        $results = $destinataireRepository->RechercheDestinataire($nomDestinataire, $rueDestinataire, $villeDestinataire);


        return $this->render('recherche/index.html.twig', [
            'controller_name' => 'RechercheController',
            'form' => $formRecherche->createView(),
            'results' => $results,
        ]);

    }

}
