<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'title' => 'Bienvenidos a mi página',
            'facebook' => $this->getParameter('facebook_url'),
            'twitter' => 'https://www.twitter.com',
            'instagram' => 'https://www.instagram.com',
        ]);
    }
}
