<?php

namespace App\Controller;

use App\Entity\Comm;
use App\Form\CommType;
use App\Repository\CommRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Service\CommentFilterService;



class CommController extends AbstractController
{
    #[Route('/', name: 'app_comm_index', methods: ['GET'])]
    public function index(CommRepository $commRepository): Response
    {
        return $this->render('comm/index.html.twig', [
            'comms' => $commRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_comm_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comm = new Comm();
        $commForm = $this->createForm(CommType::class, $comm);
        $commForm->handleRequest($request);

        if ($commForm->isSubmitted() && $commForm->isValid()) {
            $entityManager->persist($comm);
            $entityManager->flush();

            return $this->redirectToRoute('app_comm_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comm/new.html.twig', [
            'comm' => $comm,
            'comm_form' => $commForm,
        ]);
    }

    #[Route('aff-comm/{id}', name: 'app_comm_show', methods: ['GET'])]
    public function show(Comm $comm): Response
    {
        return $this->render('comm/show.html.twig', [
            'comm' => $comm,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_comm_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Comm $comm, EntityManagerInterface $entityManager): Response
    {
        $commForm = $this->createForm(CommType::class, $comm);
        $commForm->handleRequest($request);

        if ($commForm->isSubmitted() && $commForm->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_comm_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comm/edit.html.twig', [
            'comm' => $comm,
            'commform' => $commForm,
        ]);
    }

    #[Route('/{id}', name: 'app_comm_delete', methods: ['GET','POST'])]
    public function delete(Request $request, Comm $comm, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comm->getId(), $request->request->get('_token'))) {
            $entityManager->remove($comm);
            $entityManager->flush();
        }

        return $this->redirectToRoute('alist-blog'); }
}
