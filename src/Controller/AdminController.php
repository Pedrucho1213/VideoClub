<?php

namespace App\Controller;

use App\Entity\Films;
use App\Form\SaveFilmType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{

    /**
     * @Route("/admin/home", name="homeAdmin")
     */
    public function home () {
        $repo = $this->getDoctrine()->getRepository(Films::class);
        $films = $repo->findByCategory("films");
        $series = $repo->findByCategory('series');
        return $this->render('admin/home.html.twig', [
            'films' => $films,
            'series' => $series
        ]);
    }
    /**
     * @Route("/admin/createfilm", name="saveFilm")
     * @Route("/admin/editFilm/{id}", name="editer")
     */
    public function form(Films $film = null, Request $request, EntityManagerInterface $manager)
    {
        if(!$film) {
            $film = new Films();
        }
        $form = $this->createForm(SaveFilmType::class, $film);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form ->isValid()){
            $manager->persist($film);
            $manager->flush();
            return $this->redirectToRoute('homeAdmin');
        }
        return $this->render('admin/createFilm.html.twig', [
            'formFilms' => $form->createView(),
            'editMode' => $film->getId() !== null
        ]);
    }

    /**
     * @Route("/admin/createuser", name="user")
     */
    public function user () {
        return $this->render('admin/createUser.html.twig');
    }
}
