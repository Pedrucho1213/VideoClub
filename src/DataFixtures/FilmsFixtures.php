<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Films;

class FilmsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $films = new Films();
            $films->setTitle("Titre du film $i")
                ->setOriginaTitle("N'importe quelle titre $i")
                ->setOriginalLanguage("Spanish")
                ->setCategory("series")
                ->setGenre("Adventures")
                ->setReleaseData(new \DateTime())
                ->setPosterPath("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRNosiaOzsGdjpJz3sUFNu1CcL6giiv_NGRkSAez1Rnu2mrk_GG&usqp=CAU")
                ->setVideoPath("https://youtu.be/_AW-QppK9ZI")
                ->setOverview("El espía más genial del mundo, Lance Sterling y Walterio Benítez son casi opuestos. Lance es cool, encantador y elegante. Walterio…no. Pero lo que a Walterio le falta de habilidades sociales, lo compensa con inteligencia e inventiva, es el genio científico que crea los artefactos que Lance usa en sus misiones. Pero cuando las cosas dan un giro inesperado, de pronto Walterio y Lance tienen que confiar uno en el otro de una forma completamente nueva. Y si esta pareja dispareja no aprende a trabajar en equipo, el mundo entero está en peligro.");

            $manager->persist($films);
        }
        for ($i = 1; $i <= 10; $i++) {
            $films = new Films();
            $films->setTitle("Titre du serie $i")
                ->setOriginaTitle("N'importe quelle titre $i")
                ->setOriginalLanguage("Spanish")
                ->setCategory("films")
                ->setGenre("Adventures")
                ->setReleaseData(new \DateTime())
                ->setPosterPath("https://img5.goodfon.com/wallpaper/nbig/e/21/movie-fantastika-kollazh-poster-art-personazhi-films-komiks.jpg")
                ->setVideoPath("https://youtu.be/IFz2evkDvxk")
                ->setOverview("El espía más genial del mundo, Lance Sterling y Walterio Benítez son casi opuestos. Lance es cool, encantador y elegante. Walterio…no. Pero lo que a Walterio le falta de habilidades sociales, lo compensa con inteligencia e inventiva, es el genio científico que crea los artefactos que Lance usa en sus misiones. Pero cuando las cosas dan un giro inesperado, de pronto Walterio y Lance tienen que confiar uno en el otro de una forma completamente nueva. Y si esta pareja dispareja no aprende a trabajar en equipo, el mundo entero está en peligro.");

            $manager->persist($films);
        }

        $manager->flush();
    }
}
