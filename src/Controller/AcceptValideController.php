<?php

namespace App\Controller;

use App\Entity\Destinataire;
use App\Entity\Validation;
use App\Form\DestinataireType;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceptValideController extends AbstractController
{
    /**
     * @Route("/accept/valide/", name="accept_valide", methods={"GET","POST"})
     * @param Destinataire $destinataire
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function index(Request $request) : Response
    {
        $destinataire = new Destinataire();
        $form = $this->createForm(DestinataireType::class, $destinataire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          /*  if(isset($_Post['checkboxes'])){
                $form->getData();*/

                $date = new \DateTime('now');
                $date->setTimezone(new \DateTimeZone('Europe/Paris'));
                $destinataire -> setDateValidationDestinataire($date);

                $destinataire ->setIdValidation(2);
                $this->getDoctrine()->getManager()->flush();



                return $this->redirectToRoute('plateforme_index');
            }


        return $this->render('accept_valide/index.html.twig', [

            'controller_name' => 'AcceptValideController',
        ]);
    }
}
