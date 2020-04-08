<?php

namespace App\Controller;

use App\Entity\Destinataire;
use App\Entity\Validation;
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
     * @param Request $request
     * @param DestinataireRepository $destinataireRepository
     * @param ValidationRepository $validationRepository
     * @return Response
     */
    public function index(Request $request, DestinataireRepository $destinataireRepository, ValidationRepository $validationRepository): Response
    {
       $recherche = new AcceptType();

        $formAccept = $this->createForm(AcceptType::class);
        $formAccept->handleRequest($request);
        $results = $destinataireRepository->findOneBySomeField($validationRepository->find(1));



        return $this->render('accept/index.html.twig', [
            'controller_name' => 'acceptController',
            'form' => $formAccept->createView(),
            'results' => $results,


        ]);
    }
}
