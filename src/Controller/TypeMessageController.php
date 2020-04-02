<?php

namespace App\Controller;

use App\Entity\TypeMessage;
use App\Form\TypeMessageType;
use App\Repository\TypeMessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/message")
 */
class TypeMessageController extends AbstractController
{
    /**
     * @Route("/", name="type_message_index", methods={"GET"})
     */
    public function index(TypeMessageRepository $typeMessageRepository): Response
    {
        return $this->render('type_message/index.html.twig', [
            'type_messages' => $typeMessageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_message_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeMessage = new TypeMessage();
        $form = $this->createForm(TypeMessageType::class, $typeMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeMessage);
            $entityManager->flush();

            return $this->redirectToRoute('type_message_index');
        }

        return $this->render('type_message/new.html.twig', [
            'type_message' => $typeMessage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_message_show", methods={"GET"})
     */
    public function show(TypeMessage $typeMessage): Response
    {
        return $this->render('type_message/show.html.twig', [
            'type_message' => $typeMessage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_message_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeMessage $typeMessage): Response
    {
        $form = $this->createForm(TypeMessageType::class, $typeMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_message_index');
        }

        return $this->render('type_message/edit.html.twig', [
            'type_message' => $typeMessage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_message_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeMessage $typeMessage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeMessage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeMessage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_message_index');
    }
}
