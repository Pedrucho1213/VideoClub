<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encode;
    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encode = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $hash = $this->encode->encodePassword($user, "Matagato1213");
        $user->setUser("pedro")
            ->setEmail("pmpedrotorres@gmail.com")
            ->setPhotoPath("URL")
            ->setRole(true)
            ->setRegistre(new \DateTime())
            ->setPassword($hash);
        $manager->persist($user);
        $manager->flush();
    }
}
