<?php

namespace App\Controller;

use App\Entity\Destinataire;
use App\Form\AcceptType;
use App\Repository\DestinataireRepository;
use App\Repository\ValidationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceptController extends AbstractController
{
    /**
     * @Route("/accept", name="accept")
     */
    public function index(Request $request, DestinataireRepository $destinataireRepository): Response
    {
        $accept = new Destinataire();

        $formAccept = $this->createForm(AcceptType::class, $accept);
        $formAccept->handleRequest($request);

        $idValidation = $accept->getIdValidation(1);


        $results = $destinataireRepository->RechercheAccept($idValidation);


        return $this->render('accept/index.html.twig', [
            'controller_name' => 'acceptController',
            'form' => $formAccept->createView(),
            'results' => $results,
        ]);
    }
}
