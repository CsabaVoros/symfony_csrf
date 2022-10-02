<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/plain-html', name: 'csrf_token')]
    public function index(Request $request): Response
    {
        $name = $request->request->get('name');

        if (!empty($name)) {
            dd($name);
        }

        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }
}
