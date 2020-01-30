<?php

namespace App\Controller;

use App\Entity\Empresas;
use App\Form\EmpresasType;
use App\Repository\EmpresasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/empresas")
 */
class EmpresasController extends AbstractController
{
    /**
     * @Route("/", name="empresas_index", methods={"GET"})
     */
    public function index(EmpresasRepository $empresasRepository): Response
    {
        return $this->render('empresas/index.html.twig', [
            'empresas' => $empresasRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="empresas_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $empresa = new Empresas();
        $form = $this->createForm(EmpresasType::class, $empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($empresa);
            $entityManager->flush();

            return $this->redirectToRoute('empresas_index');
        }

        return $this->render('empresas/new.html.twig', [
            'empresa' => $empresa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="empresas_show", methods={"GET"})
     */
    public function show(Empresas $empresa): Response
    {
        return $this->render('empresas/show.html.twig', [
            'empresa' => $empresa,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="empresas_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Empresas $empresa): Response
    {
        $form = $this->createForm(EmpresasType::class, $empresa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('empresas_index');
        }

        return $this->render('empresas/edit.html.twig', [
            'empresa' => $empresa,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="empresas_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Empresas $empresa): Response
    {
        if ($this->isCsrfTokenValid('delete'.$empresa->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($empresa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('empresas_index');
    }
}
