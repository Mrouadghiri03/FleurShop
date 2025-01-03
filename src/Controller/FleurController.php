<?php

namespace App\Controller;

use App\Entity\Fleur;
use App\Form\FleurType;
use App\Repository\FleurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/fleur')]
final class FleurController extends AbstractController
{
    #[Route(name: 'app_fleur_index', methods: ['GET'])]
    public function index(FleurRepository $fleurRepository): Response
    {
        return $this->render('fleur/index.html.twig', [
            'fleurs' => $fleurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_fleur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $fleur = new Fleur();
        $form = $this->createForm(FleurType::class, $fleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($fleur);
            $entityManager->flush();

            return $this->redirectToRoute('app_fleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fleur/new.html.twig', [
            'fleur' => $fleur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fleur_show', methods: ['GET'])]
    public function show(Fleur $fleur): Response
    {
        return $this->render('fleur/show.html.twig', [
            'fleur' => $fleur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_fleur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Fleur $fleur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FleurType::class, $fleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_fleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('fleur/edit.html.twig', [
            'fleur' => $fleur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_fleur_delete', methods: ['POST'])]
    public function delete(Request $request, Fleur $fleur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fleur->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($fleur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_fleur_index', [], Response::HTTP_SEE_OTHER);
    }
}
