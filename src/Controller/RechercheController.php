<?php

namespace App\Controller;

use App\Entity\Destinataire;
use App\Form\RechercheType;
use App\Repository\DestinataireRepository;
use App\Repository\InterventionRepository;
use App\Repository\MessageRepository;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class RechercheController extends AbstractController
{
    /**
     * @Route("/admin/recherche", name="recherche")

     * @return Response
     */
    public function index(Request $request, InterventionRepository $interventionRepository, MessageRepository $messageRepository, DestinataireRepository $destinataireRepository): Response
    {
        $recherche = new Destinataire();
        $messages = $messageRepository->getMessages();

        $formRecherche = $this->createForm(RechercheType::class, $recherche);
        $formRecherche->handleRequest($request);

        $nomDestinataire = $recherche->getNomDestinataire();
        $rueDestinataire = $recherche->getNomRueDestinataire1();
        $villeDestinataire = $recherche->getIdAdresse();

        $results = $destinataireRepository->RechercheDestinataire($nomDestinataire, $rueDestinataire, $villeDestinataire );

        return $this->render('admin/recherche/index.html.twig', [
            'controller_name' => 'RechercheController',
            'form' => $formRecherche->createView(),
            'results' => $results,
            'messages' => $messages ,
        ]);

    }

    /**
     * @Route("admin/envoyerRecherche", name="envoyerRecherche")
     * @param Request $request
     * @param DestinataireRepository $destinataireRepository
     * @param Swift_Mailer $mailer
     * @param MessageRepository $messageRepository
     * @return Response
     */
    function envoyerRecherche(Request $request,
                              DestinataireRepository $destinataireRepository,
                              Swift_Mailer $mailer,
                              MessageRepository $messageRepository):Response{
        // recupération des données de la page recherche (les ids)
        $idUsers = $request->request->get('idUsers');
        // transformation du string vers tableau
        $listeDestinataires = array();

        foreach ($idUsers as $key=>$idUtilisateur) {
            $coordoneeDestinataires = $destinataireRepository->getDestinataires(intval($idUtilisateur));

            array_push($listeDestinataires, $coordoneeDestinataires);
        }

        // recupération des données de la page recherche (le message selectionné)
        $idMessage = $request->request->get('idMessage');

        $contentMessage = $messageRepository->getContentMessage(intval($idMessage));

        // recup message
        $messageRecup = $contentMessage[0]->getContenuMessage();

        $messageDateEnvoie = new \DateTime('now');
        $messageDateEnvoie-> setTimezone(new \DateTimeZone('Europe/Paris'));
        $dateformatEnvoie = date_format($messageDateEnvoie, "d-m-Y");


        // recup type message
        $messageTypeMessage = $contentMessage[0]->getIdTypeMessage()->getMessageType();
        $messageTypeIntervention = $contentMessage[0]->getIdIntervention()->getIdTypeIntervention()->getInterventionType();
        // recup info intervention
        $nomIntervention = $contentMessage[0]->getIdIntervention()->getNomIntervention();
        $villeIntervention = $contentMessage[0]->getIdIntervention()->getVilleIntervention();
        $rueIntervention = $contentMessage[0]->getIdIntervention()->getRueIntervention();
        $dateDebutIntervention = date_format($contentMessage[0]->getIdIntervention()->getDateDebutIntervention(), "d-M-Y") ;
        $dateFinIntervention = date_format($contentMessage[0]->getIdIntervention()->getDateFinIntervention(), "d-M-Y") ;

        // corps du message
        $corpsMessage= "";
        $corpsMessage .= "<H1>Alertes Citoyens vous informe</H1>";
        $corpsMessage .= "<h2>".$nomIntervention."</h2>";
        $corpsMessage .= "<p>".$messageTypeMessage.": ".$messageTypeIntervention."</p>";
        $corpsMessage .= "<p>Date debut de l'intervention : ".$dateDebutIntervention."</p>";
        $corpsMessage .= "<p>Date de fin de l'intervention : ".$dateFinIntervention."</p>";
        $corpsMessage .= "<p>Voie concernée :".$rueIntervention."</p>";
        $corpsMessage .= "<p>Dans la ville de :".$villeIntervention."</p>";

        $corpsMessage .= "<p>".$messageRecup."</p><p>Date d'envoi du message : ".$dateformatEnvoie."</p>";

        foreach ($listeDestinataires as $destinataires) {
            foreach ($destinataires as $key=>$destinataire) {
                //envoie des messages

                $message = (new \Swift_Message($nomIntervention))
                    ->setFrom('xxxxx@gmail.com')
                    ->setTo($destinataire['adresseMailDestinataire'])
                    ->setBody($corpsMessage, 'text/html', 'utf-8');
                $mailer->send($message);
            }
        }
        return $this->json([
            "code" => 200,
            "envoye" => "ok"
        ], 200);

    }


}
