<?php
namespace App\DataFixtures;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class UserFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // ...
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('admin@deloitte.com');

        $password = $this->encoder->encodePassword($user, 'admin123@');
        $user->setPassword($password);

        $user->setNom('Admin');
        $user->setPrenom('admin');
        $user->setSecteur('Secrétaire');

        $manager->persist($user);
        $manager->flush();
    }
}


