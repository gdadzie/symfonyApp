<?php

namespace App\Controller;

use App\Entity\Apiclients;
use App\Form\ApiclientsType;
use App\Repository\ApiclientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/apiclients')]
class ApiclientsController extends AbstractController
{
    #[Route('/', name: 'app_apiclients_index', methods: ['GET'])]
    public function index(ApiclientsRepository $apiclientsRepository): Response
    {
        return $this->render('apiclients/index.html.twig', [
            'apiclients' => $apiclientsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_apiclients_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ApiclientsRepository $apiclientsRepository): Response
    {
        $apiclient = new Apiclients();
        $form = $this->createForm(ApiclientsType::class, $apiclient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $apiclientsRepository->save($apiclient, true);

            return $this->redirectToRoute('app_apiclients_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('apiclients/new.html.twig', [
            'apiclient' => $apiclient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_apiclients_show', methods: ['GET'])]
    public function show(Apiclients $apiclient): Response
    {
        return $this->render('apiclients/show.html.twig', [
            'apiclient' => $apiclient,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_apiclients_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Apiclients $apiclient, ApiclientsRepository $apiclientsRepository): Response
    {
        $form = $this->createForm(ApiclientsType::class, $apiclient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $apiclientsRepository->save($apiclient, true);

            return $this->redirectToRoute('app_apiclients_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('apiclients/edit.html.twig', [
            'apiclient' => $apiclient,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_apiclients_delete', methods: ['POST'])]
    public function delete(Request $request, Apiclients $apiclient, ApiclientsRepository $apiclientsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$apiclient->getId(), $request->request->get('_token'))) {
            $apiclientsRepository->remove($apiclient, true);
        }

        return $this->redirectToRoute('app_apiclients_index', [], Response::HTTP_SEE_OTHER);
    }
}
