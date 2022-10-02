<?php

namespace App\Controller;

use App\Form\CsrfTokenType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/plain-html', name: 'plain_html')]
    public function plainHTML(Request $request): Response
    {
        $name = $request->request->get('name');

        if (!empty($name)) {
            dd($name);
        }

        return $this->render('base/plain_html.html.twig');
    }

    #[Route('/csrf-token', name: 'csrf_token')]
    public function CSRFToken(Request $request): Response
    {
        $form = $this->createForm(CsrfTokenType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            dump($request->request->get('name'));
        }

        return $this->renderForm('base/csrf_token.html.twig', [
            'form' => $form,
        ]);
    }
}
