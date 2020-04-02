<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccordCguController extends AbstractController
{
    /**
     * @Route("/accord/cgu", name="accord_cgu")
     */
    public function index()
    {
        return $this->render('accord_cgu/index.html.twig', [
            'controller_name' => 'AccordCguController',
        ]);
    }
}
