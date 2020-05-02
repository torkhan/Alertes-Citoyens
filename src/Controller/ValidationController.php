<?php

namespace App\Controller;

use App\Entity\Validation;
use App\Form\ValidationType;
use App\Repository\ValidationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/validation")
 */
class ValidationController extends AbstractController
{
    /**
     * @Route("/", name="validation_index", methods={"GET"})
     */
    public function index(ValidationRepository $validationRepository): Response
    {
        return $this->render('validation/index.html.twig', [
            'validations' => $validationRepository->findAll(),
        ]);

    }

    /**
     * @Route("/new", name="validation_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $validation = new Validation();
        $form = $this->createForm(ValidationType::class, $validation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($validation);
            $entityManager->flush();

            return $this->redirectToRoute('validation_index');
        }

        return $this->render('validation/new.html.twig', [
            'validation' => $validation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="validation_show", methods={"GET"})
     */
    public function show(Validation $validation): Response
    {
        return $this->render('validation/question.html.twig', [
            'validation' => $validation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="validation_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Validation $validation): Response
    {
        $form = $this->createForm(ValidationType::class, $validation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('validation_index');
        }

        return $this->render('validation/edit.html.twig', [
            'validation' => $validation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="validation_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Validation $validation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$validation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($validation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('validation_index');
    }
}
