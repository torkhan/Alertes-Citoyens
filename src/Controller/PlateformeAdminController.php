<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PlateformeAdminController extends AbstractController
{
    /**
     * @Route("/plateforme/admin", name="plateforme_admin")
     */
    public function index()
    {
        return $this->render('plateforme_admin/index.html.twig', [
            'controller_name' => 'PlateformeAdminController',
        ]);
    }
}
