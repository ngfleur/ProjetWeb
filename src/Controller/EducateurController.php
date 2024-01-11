<?php

namespace App\Controller;

use App\Entity\Educateur;
use App\Form\EducateurType;
use App\Repository\EducateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/educateur')]
class EducateurController extends AbstractController
{
    #[Route('/', name: 'app_educateur_index', methods: ['GET'])]
    public function index(EducateurRepository $educateurRepository): Response
    {
        return $this->render('educateur/index.html.twig', [
            'educateurs' => $educateurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_educateur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $educateur = new Educateur();
        $form = $this->createForm(EducateurType::class, $educateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($educateur);
            $entityManager->flush();

            return $this->redirectToRoute('app_educateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('educateur/new.html.twig', [
            'educateur' => $educateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_educateur_show', methods: ['GET'])]
    public function show(Educateur $educateur): Response
    {
        return $this->render('educateur/show.html.twig', [
            'educateur' => $educateur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_educateur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Educateur $educateur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EducateurType::class, $educateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_educateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('educateur/edit.html.twig', [
            'educateur' => $educateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_educateur_delete', methods: ['POST'])]
    public function delete(Request $request, Educateur $educateur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$educateur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($educateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_educateur_index', [], Response::HTTP_SEE_OTHER);
    }
}
