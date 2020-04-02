<?php

namespace App\Controller;

use App\Entity\TypeDestinataire;
use App\Form\TypeDestinataireType;
use App\Repository\TypeDestinataireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/destinataire")
 */
class TypeDestinataireController extends AbstractController
{
    /**
     * @Route("/", name="type_destinataire_index", methods={"GET"})
     */
    public function index(TypeDestinataireRepository $typeDestinataireRepository): Response
    {
        return $this->render('type_destinataire/index.html.twig', [
            'type_destinataires' => $typeDestinataireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_destinataire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeDestinataire = new TypeDestinataire();
        $form = $this->createForm(TypeDestinataireType::class, $typeDestinataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeDestinataire);
            $entityManager->flush();

            return $this->redirectToRoute('type_destinataire_index');
        }

        return $this->render('type_destinataire/new.html.twig', [
            'type_destinataire' => $typeDestinataire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_destinataire_show", methods={"GET"})
     */
    public function show(TypeDestinataire $typeDestinataire): Response
    {
        return $this->render('type_destinataire/show.html.twig', [
            'type_destinataire' => $typeDestinataire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_destinataire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeDestinataire $typeDestinataire): Response
    {
        $form = $this->createForm(TypeDestinataireType::class, $typeDestinataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_destinataire_index');
        }

        return $this->render('type_destinataire/edit.html.twig', [
            'type_destinataire' => $typeDestinataire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_destinataire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeDestinataire $typeDestinataire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeDestinataire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeDestinataire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_destinataire_index');
    }
}
