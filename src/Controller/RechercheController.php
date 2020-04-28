<?php

namespace App\Controller;

use App\Entity\Destinataire;
use App\Entity\Message;

use App\Form\RechercheType;
use App\Repository\DestinataireRepository;
use App\Repository\MessageRepository;
use App\Repository\ValidationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RechercheController extends AbstractController
{
    /**
     * @Route("/recherche", name="recherche")

     * @return Response
     */
    public function index(Request $request, MessageRepository $messageRepository, DestinataireRepository $destinataireRepository, ValidationRepository $validationRepository): Response
    {
        $recherche = new Destinataire();

        $formRecherche = $this->createForm(RechercheType::class, $recherche);
        $formRecherche->handleRequest($request);


        $nomDestinataire = $recherche->getNomDestinataire();
        $rueDestinataire = $recherche->getNomRueDestinataire1();
        $villeDestinataire = $recherche->getIdAdresse();

        $results = $destinataireRepository->RechercheDestinataire($nomDestinataire, $rueDestinataire, $villeDestinataire, );

        $selectMessage = $messageRepository->findAll();



        return $this->render('recherche/index.html.twig', [
            'controller_name' => 'RechercheController',
            'form' => $formRecherche->createView(),
            'results' => $results,
            'selectMessage' => $selectMessage ,
            /*dd($selectMessage),*/
        ]);

    }

    /**
     * @Route("message/{id}", name="select_message")
     * @param Message $message
     * @return Response
     */
    public function selectMess(Message $message, MessageRepository $messageRepository): Response{
     /*    $selectMessage = $messageRepository->findBy(['id' => $message]);
       $selectMessage = $this->getDoctrine()->getRepository(MessageRepository::class)->findBy(['id' => $message], ['date_envoi' => 'desc']);

        return $this->render('recherche/index.html.twig', [

            'controller_name' => 'RechercheController',

            'selectMessage' => $selectMessage ,

            dd($selectMessage),
        ]);*/
    }


}
