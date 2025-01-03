<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestIslamController extends AbstractController
{
    #[Route('/test/islam', name: 'app_test_islam')]
    public function index(): Response
    {
        return $this->render('test_islam/index.html.twig', [
            'controller_name' => 'TestIslamController',
        ]);
    }
}
