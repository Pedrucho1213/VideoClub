<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Films;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HomeController extends AbstractController
{
    /**
     * @Route("/test", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    // début du rajout léo <-- a supprimer (et la fin aussi)
        /**
     * @Route("/movie/new", name="movie_new")
     */
    public function newFilm (Request $request, EntityManagerInterface $entityManager) {
        $film = new Film();
        $entityManager = $this->getDoctrine()->getManager();

        $form = $this->createFormBuilder($film)
                     ->add('Title')
                     ->add('OriginaTitle')
                     ->add('OriginalLanguage')
                     ->add('Genre')
                     ->add('ReleaseData')
                     ->add('PosterPath')
                     ->add('Overview')
                     ->add('VideoPath')
                     ->add('Category', ChoiceType::class, [
                         'categories' => [
                             'film' => 'film',
                             'serie' => 'serie',
                         ]
                     ])
                     ->getForm();   

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($film);
            $entityManager->flush();

            return $this->redirectToRoute('detailMovie', [
                'id' => $film->getId()
                ]);
        }


        return $this->render('home/new.movie.html.twig', [
            'formFilm' => $form->createView()
        ]);
    }
    //fin du rajout de léo

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
