<?php

namespace App\Controller;

use App\Entity\Destinataire;
use App\Entity\Validation;
use App\Form\DestinataireType;
use App\Repository\DestinataireRepository;
use App\Repository\ValidationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/destinataire")
 */
class DestinataireController extends AbstractController
{
    /**
     * @Route("/", name="destinataire_index", methods={"GET"})
     */
    public function index(DestinataireRepository $destinataireRepository): Response
    {
        return $this->render('destinataire/index.html.twig', [
            'destinataires' => $destinataireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="destinataire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $destinataire = new Destinataire();
        $form = $this->createForm(DestinataireType::class, $destinataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $date = new \DateTime('now');
            $date->setTimezone(new \DateTimeZone('Europe/Paris'));
            $destinataire -> setDateEnregistrementDestinataire($date);


            $entityManager->persist($destinataire);
            $entityManager->flush();

            return $this->redirectToRoute('destinataire_index');
        }

        return $this->render('destinataire/new.html.twig', [
            'destinataire' => $destinataire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="destinataire_show", methods={"GET"})
     */
    public function show(Destinataire $destinataire): Response
    {
        return $this->render('destinataire/show.html.twig', [
            'destinataire' => $destinataire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="destinataire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Destinataire $destinataire): Response
    {
        $form = $this->createForm(DestinataireType::class, $destinataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $date = new \DateTime('now');
            $date->setTimezone(new \DateTimeZone('Europe/Paris'));
            $destinataire -> setDateModificationDestinataire($date);
            /*$destinataire -> setDateValidationDestinataire($date);*/
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('destinataire_index');
        }else{

                if(isset($_Post['checkboxes'])){
                    $form->getData();

                    $date = new \DateTime('now');
                    $date->setTimezone(new \DateTimeZone('Europe/Paris'));
                    $destinataire -> setDateValidationDestinataire($date);

                    $destinataire ->setIdValidation(2);
                    $this->getDoctrine()->getManager()->flush();



                    return $this->redirectToRoute('plateforme_index');
                }

        }

        return $this->render('destinataire/edit.html.twig', [
            'destinataire' => $destinataire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="destinataire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Destinataire $destinataire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$destinataire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($destinataire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('destinataire_index');
    }
}
