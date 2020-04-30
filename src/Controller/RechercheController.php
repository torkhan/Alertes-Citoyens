<?php

namespace App\Controller;

use App\Entity\Destinataire;
use App\Entity\Message;
use Exception;
use App\Form\RechercheType;
use App\Repository\DestinataireRepository;
use App\Repository\MessageRepository;
use App\Repository\ValidationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
        $message = $messageRepository->findAll(['id','DESC']);

        $formRecherche = $this->createForm(RechercheType::class, $recherche);
        $formRecherche->handleRequest($request);


        $nomDestinataire = $recherche->getNomDestinataire();
        $rueDestinataire = $recherche->getNomRueDestinataire1();
        $villeDestinataire = $recherche->getIdAdresse();

        $results = $destinataireRepository->RechercheDestinataire($nomDestinataire, $rueDestinataire, $villeDestinataire );


        return $this->render('recherche/index.html.twig', [
            'controller_name' => 'RechercheController',
            'form' => $formRecherche->createView(),
            'results' => $results,
            'selectMessage' => $message,

        ]);

    }

    /**
     * @Route("/recherche/envoyer", name="envoi_message")
     * @param Request $request
     * @param Message $message
     * @param Destinataire $destinataire
     * @param DestinataireRepository $destinataireRepository
     * @return RedirectResponse
     * @throws Exception
     */
    public function selectMess( Request $request, \Swift_Mailer $mailer, MessageRepository $messageRepository, DestinataireRepository $destinataireRepository): Response{

       /* if (!isset($_POST["checkboxes"])) {
            echo "Checkbox was left unchecked.";
            dd($_POST);
        } else {
            echo "Checkbox was checked.";
            dump($_POST["checkboxes"]);
        }*/

/*
        if (is_array($_POST['checkboxes'])){

            $todo = $_POST['checkboxes'];
dd($todo);
        } else {

            $todo = array();
            dd($todo);
        }*/
        if (isset($_POST['checkboxes[]'])) {
            echo 'checked';dd($_POST['']);
        } else {
            echo 'not checked';dd($_POST);
        }


      /*  //récupérer les destinataires concernés
        $destinataire = $this->getDoctrine()->getRepository(Destinataire::class)->find('$id');//trouver la bonne façon

        $nom = $destinataire->getNomDestinataire();
        $prenom = $destinataire->getPrenomDestinataire();
        $email = $destinataire->getAdresseMailDestinataire();

        //récuprérer les items du message

        $message = $this->getDoctrine()->getRepository(Message::class)->find('$id');

        $titre1 = $message->getIdTypeMessage();
        $titre2 = $message->getIdIntervention();
        $titre3 = $message->getIdTypeIntervention();
        $titre4 = $message->getContenuMessage();
        $titre5 = $message->getDateDebutIntervention();
        $titre6 = $message->getDateFinIntervention();
        $titre7 = $message->getImage1();
        $titre8 = $message->getImage2();
        $titre9 = $message->getImage3();
        $titre10 = $message->getCommentaireMessage();

        $date = new \DateTime('now');
        $date->setTimezone(new \DateTimeZone('Europe/Paris'));
        $message -> setDateEnvoi($date);

//création du message
        $alerte= (new \Swift_Message('Nouvelle alerte'))
            ->setTo([$email => $nom." ".$prenom])
            ->setFrom('torkhan2706@gmail.com')

            ->setBody("<html lang=><head><meta charset='UTF-8'><title></title></head><body>Envoyé le" ." ".$date->format('d/m/y').'<br/>'.$titre1.'<br/>'.$titre2.'<br/>'.$titre3.'<br/>'.$titre4.'<br/>'.$titre5.'<br/>'.$titre6.'<br/>'.$titre7.'<br/>'.$titre8.'<br/>'.$titre9.'<br/>'.$titre10.'<br/>'."</body></html>")
        ;
// Send the message
        $alerte->setContentType("text/html");
        $mailer->send($alerte);
        /*$this->getDoctrine()->getManager()->flush();*/

        return $this->redirectToRoute('plateforme_admin');
    }

}
