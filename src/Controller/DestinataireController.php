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


class DestinataireController extends AbstractController
{
    /**
     * @Route("/admin/destinataire", name="admin/destinataire_index", methods={"GET"})
     */
    public function index(DestinataireRepository $destinataireRepository): Response
    {
        return $this->render('admin/destinataire/index.html.twig', [
            'destinataires' => $destinataireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/uniqueMail", name="uniqueMail", methods={"GET","POST"})
     * @param DestinataireRepository $destinataireRepository
     * @param Destinataire $destinataire
     */

    public function uniqueMail(Request $request, DestinataireRepository $destinataireRepository):Response
    {
        $sql = $request->get('email');
        // dd($sql);
        $results = $destinataireRepository->findUserByEmail($sql);
        // dd($results);
        if (count($results) > 0) {
            return $this->json(
                'taken',

                200);

        }else{
            return $this->json(
                'not_taken',

                200);

        }

    }


    /**
     * @Route("/new", name="destinataire_new", methods={"GET","POST"})
     * @param DestinataireRepository $destinataireRepository
     * @param Destinataire $destinataire
     */


    public function new(Request $request, ValidationRepository $validationRepository, DestinataireRepository $destinataireRepository): Response
    {
        $destinataire = new Destinataire();
        $form = $this->createForm(DestinataireType::class, $destinataire);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $date = new \DateTime('now');
            $date->setTimezone(new \DateTimeZone('Europe/Paris'));
            $destinataire -> setDateEnregistrementDestinataire($date);
            $validation = $validationRepository->find(1);
            $destinataire->setIdValidation($validation);

            $entityManager->persist($destinataire);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('destinataire/new.html.twig', [
            'destinataire' => $destinataire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/admin/show", name="destinataire_show", methods={"GET"})
     */
    public function show(Destinataire $destinataire): Response
    {
        return $this->render('admin/destinataire/show.html.twig', [
            'destinataire' => $destinataire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin/destinataire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Destinataire $destinataire, ValidationRepository $validationRepository): Response
    {
        $form = $this->createForm(DestinataireType::class, $destinataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $date = new \DateTime('now');
            $date->setTimezone(new \DateTimeZone('Europe/Paris'));
            $destinataire -> setDateModificationDestinataire($date);
            $destinataire -> setDateValidationDestinataire($date);
            $validation = $validationRepository->find(2);
            $destinataire->setIdValidation($validation);
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

        return $this->render('admin/destinataire/edit.html.twig', [
            'destinataire' => $destinataire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin/destinataire_delete", methods={"DELETE"})
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
