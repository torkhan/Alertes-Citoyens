<?php

namespace App\Controller;

use App\Form\DestinataireType;
use App\Repository\DestinataireRepository;
use App\Repository\ValidationRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AcceptController extends AbstractController
{
    /**
     * @Route("/accept", name="accept")
     */
    public function index(Request $request, DestinataireRepository $destinataireRepository, ValidationRepository $validationRepository)
    {


        $formAccept = $this->createForm(DestinataireType::class);
        $formAccept->handleRequest($request);
        $results = $destinataireRepository->findOneBySomeField($validationRepository->find(1));


        return $this->render('accept/index.html.twig', [
            'controller_name' => 'acceptController',
            'form' => $formAccept->createView(),
            'results' => $results,


        ]);
    }
}
