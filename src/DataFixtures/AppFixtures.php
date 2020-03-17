<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setFirstName("Igal")
            ->setLastName('ILMI AMIR')
            ->setEmail('igali@gmail.com')
            ->setPassword($this->encoder->encodePassword($user, 'password'))
            ->setDescription("Développeur Web Freelance PHP / Symfony");
        $manager->persist($user);

        $manager->flush();
    }
}
