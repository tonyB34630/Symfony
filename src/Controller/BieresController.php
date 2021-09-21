<?php

namespace App\Controller;

use App\Entity\Bieres;
use App\Form\BieresType;
use App\Repository\BieresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bieres')]
class BieresController extends AbstractController
{
    #[Route('', name: 'bieres_index', methods: ['GET'])]
    public function index(BieresRepository $bieresRepository): Response
    {
        return $this->render('bieres/index.html.twig', [
            'bieres' => $bieresRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'bieres_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $biere = new Bieres();
        $form = $this->createForm(BieresType::class, $biere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($biere);
            $entityManager->flush();

            return $this->redirectToRoute('bieres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bieres/new.html.twig', [
            'biere' => $biere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'bieres_show', methods: ['GET'])]
    public function show(Bieres $biere): Response
    {
        return $this->render('bieres/show.html.twig', [
            'biere' => $biere,
        ]);
    }

    #[Route('/{id}/edit', name: 'bieres_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bieres $biere): Response
    {
        $form = $this->createForm(BieresType::class, $biere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bieres_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bieres/edit.html.twig', [
            'biere' => $biere,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'bieres_delete', methods: ['POST'])]
    public function delete(Request $request, Bieres $biere): Response
    {
        if ($this->isCsrfTokenValid('delete'.$biere->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($biere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bieres_index', [], Response::HTTP_SEE_OTHER);
    }
}
