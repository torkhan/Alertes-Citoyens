<?php

namespace App\Controller;

use App\Entity\TypeIntervention;
use App\Form\TypeInterventionType;
use App\Repository\TypeInterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/intervention")
 */
class TypeInterventionController extends AbstractController
{
    /**
     * @Route("/", name="type_intervention_index", methods={"GET"})
     */
    public function index(TypeInterventionRepository $typeInterventionRepository): Response
    {
        return $this->render('type_intervention/index.html.twig', [
            'type_interventions' => $typeInterventionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_intervention_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeIntervention = new TypeIntervention();
        $form = $this->createForm(TypeInterventionType::class, $typeIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeIntervention);
            $entityManager->flush();

            return $this->redirectToRoute('type_intervention_index');
        }

        return $this->render('type_intervention/new.html.twig', [
            'type_intervention' => $typeIntervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_intervention_show", methods={"GET"})
     */
    public function show(TypeIntervention $typeIntervention): Response
    {
        return $this->render('type_intervention/show.html.twig', [
            'type_intervention' => $typeIntervention,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_intervention_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeIntervention $typeIntervention): Response
    {
        $form = $this->createForm(TypeInterventionType::class, $typeIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_intervention_index');
        }

        return $this->render('type_intervention/edit.html.twig', [
            'type_intervention' => $typeIntervention,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_intervention_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeIntervention $typeIntervention): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeIntervention->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeIntervention);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_intervention_index');
    }
}
