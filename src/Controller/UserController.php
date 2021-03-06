<?php

namespace App\Controller;

use App\Entity\Destinataire;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\DestinataireRepository;
use App\Repository\UserRepository;
use App\Security\SecurityAuthenticator;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;



/**
 * @Route("/admin/user")
 */

class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('admin/user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     * @throws Exception
     */
    public function new(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $user -> setRoles(['ROLE_ADMIN']);
/*            $user -> setRoles(['ROLE_SUPER_ADMIN']);*/

            $date = new \DateTime('now');
            $date->setTimezone(new \DateTimeZone('Europe/Paris'));
            $user -> setCreateAt($date);

            $passwordEncoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($passwordEncoded);


            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('admin/user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('admin/user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $date = new \DateTime('now');
            $date->setTimezone(new \DateTimeZone('Europe/Paris'));
            $user -> setDateModificationUtilisateur($date);

            /*$encoder = 0;
            $hash = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);*/

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * @Route("/uniqueMailUser", name="uniqueMailUser", methods={"GET","POST"})
     * @param UserRepository $userRepository
     * @param User $user
     */

    public function uniqueMailUser(Request $request, UserRepository $userRepository):Response
    {
        $sql = $request->get('email');
        // dd($sql);
        $results = $userRepository->findUserByEmail($sql);
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
}
