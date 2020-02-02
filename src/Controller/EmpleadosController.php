<?php

namespace App\Controller;

use App\Entity\Empleados;
use App\Form\EmpleadosType;
use App\Repository\EmpleadosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * @Route("/empleados")
 */
class EmpleadosController extends AbstractController
{
    /**
     * @Route("/", name="empleados_index", methods={"GET"})
     */
    public function index(EmpleadosRepository $empleadosRepository): Response
    {
        return $this->render('empleados/index.html.twig', [
            'empleados' => $empleadosRepository->findAll(),
        ]);
    }

    /**
     * @Route("/", name="empleados_getCount", methods={"GET"})
     */
    public function getCount(EmpleadosRepository $empleadosRepository): Response
    {
        return $this->render('base.html.twig', [
            'getCount' => $empleadosRepository->getCount(),
        ]);
    }

    /**
     * @Route("/new", name="empleados_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $empleado = new Empleados();
        $form = $this->createForm(EmpleadosType::class, $empleado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form['Imagen']->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
                try {
                    $imageFile->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }

                $empleado->setImagen($newFilename);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($empleado);
            $entityManager->flush();

            return $this->redirectToRoute('empleados_index');
        }

        return $this->render('empleados/new.html.twig', [
            'empleado' => $empleado,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="empleados_show", methods={"GET"})
     */
    public function show(Empleados $empleado): Response
    {
        return $this->render('empleados/show.html.twig', [
            'empleado' => $empleado,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="empleados_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Empleados $empleado): Response
    {
        $form = $this->createForm(EmpleadosType::class, $empleado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('empleados_index');
        }



        return $this->render('empleados/edit.html.twig', [
            'empleado' => $empleado,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="empleados_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Empleados $empleado): Response
    {
        if ($this->isCsrfTokenValid('delete'.$empleado->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($empleado);
            $entityManager->flush();
        }

        return $this->redirectToRoute('empleados_index');
    }
}
