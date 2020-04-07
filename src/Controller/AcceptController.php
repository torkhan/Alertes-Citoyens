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
        $recherche = new AcceptType();

        $formAccept = $this->createForm(AcceptType::class);
        $formAccept->handleRequest($request);
        $idValidation = $recherche->getIdValidation();
        $results = $destinataireRepository->findByExampleField();

        return $this->render('accept/index.html.twig', [
            'controller_name' => 'acceptController',
            'form' => $formAccept->createView(),
            'results' => $results,

        ]);
    }
}
