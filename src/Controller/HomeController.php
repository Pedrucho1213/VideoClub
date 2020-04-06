<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Films;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->redirect('/home/films');
    }

    /**
     * @Route("/home/{category}", name="movie")
     */
    public function films($category)
    {
        $repo = $this->getDoctrine()->getRepository(Films::class);
        $films = $repo->findByCategory($category);
        return $this->render('home/home.html.twig', [
            'films' => $films
        ]);
    }

    /**
     * @Route("/movie/detail/{id}", name="detailMovie")
     */
    public function detail($id)
    {
        $repo = $this->getDoctrine()->getRepository(Films::class);
        $detail = $repo->find($id);
        return $this->render('home/detail.html.twig', [
            'detail' => $detail
        ]);
    }

    /**
     * @Route("/about", name="aboutUs")
     */
    public function about()
    {
        return $this ->render('home/about.html.twig');
    }
}
