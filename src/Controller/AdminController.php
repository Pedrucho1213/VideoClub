<?php

namespace App\Controller;

use App\Entity\Films;
use App\Entity\User;
use App\Form\SaveFilmType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
    public function user (Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder) {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();
        }
        return $this->render('admin/createUser.html.twig', [
            'formUser' => $form->createView()
        ]);
    }

}
