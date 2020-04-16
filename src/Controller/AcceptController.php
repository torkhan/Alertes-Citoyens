<?php

namespace App\Controller;

use App\Entity\Destinataire;
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

    /**
     * @Route("utilisateur/{id}/valider", name="valider_destinataire")
     * @param Destinataire $destinataire
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function validerDestinataire($id, Request $request,Destinataire $destinataire, ValidationRepository $validationRepository, \Swift_Mailer $mailer)
    {
        $destinataire = $this->getDoctrine()->getRepository(Destinataire::class)->find($id);
        $date = new \DateTime('now');
        $date->setTimezone(new \DateTimeZone('Europe/Paris'));
        $destinataire -> setDateModificationDestinataire($date);
        $destinataire -> setDateValidationDestinataire($date);
        $validation = $validationRepository->find(2);
        $destinataire->setIdValidation($validation);

        $nom = $destinataire->getNomDestinataire();
        $prenom = $destinataire->getPrenomDestinataire();
        $email = $destinataire->getAdresseMailDestinataire();
        $messageEnvoye = 'Votre demande de souscription à été acceptée';

        $message = (new \Swift_Message('Réponse à votre demande de souscription à nos alertes'))
            ->setTo([$email => $nom." ".$prenom])
            ->setFrom('torkhan2706@gmail.com')

            ->setBody("<html lang=><head><meta charset='UTF-8'><title></title></head><body>Envoyé le" ." ".$date->format('d/m/y').'<br/>'.$messageEnvoye."</body></html>")
        ;
// Send the message
        $message->setContentType("text/html");
        $mailer->send($message);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('accept');
    }

    /**
     * @Route("utilisateur/{id}/refuser", name="refuser_destinataire")
     * @param Destinataire $destinataire
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function refuserDestinataire($id, Request $request,Destinataire $destinataire, ValidationRepository $validationRepository, \Swift_Mailer $mailer)
    {
        $destinataire = $this->getDoctrine()->getRepository(Destinataire::class)->find($id);
        $date = new \DateTime('now');
        $date->setTimezone(new \DateTimeZone('Europe/Paris'));
        $destinataire -> setDateModificationDestinataire($date);
        $destinataire -> setDateValidationDestinataire($date);
        $validation = $validationRepository->find(3);
        $destinataire->setIdValidation($validation);

        $nom = $destinataire->getNomDestinataire();
        $prenom = $destinataire->getPrenomDestinataire();
        $email = $destinataire->getAdresseMailDestinataire();
        $messageEnvoye = 'Votre demande de souscription à été refusée';

        $message = (new \Swift_Message('Réponse à votre demande de souscription à nos alertes'))
            ->setTo([$email => $nom." ".$prenom])
            ->setFrom('torkhan2706@gmail.com')

            ->setBody("<html lang=><head><meta charset='UTF-8'><title></title></head><body>Envoyé le" ." ".$date->format('d/m/y').'<br/>'.$messageEnvoye."</body></html>")
        ;
// Send the message
        $message->setContentType("text/html");
        $mailer->send($message);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute('accept');
    }
}
