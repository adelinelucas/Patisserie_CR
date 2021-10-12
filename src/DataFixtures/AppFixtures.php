<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Blogpost;
use App\Entity\Categorie;
use App\Entity\Patisserie;
use App\Repository\CategorieRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Utilisateur de faker
        $faker = Factory::create('fr_FR');

        // Création d'un utilisateur
        $user = new User();
        
        $user->setEmail('user@test.com')
            ->setPrenom($faker->firstName())
            ->setNom($faker->lastName())
            ->setAPropos($faker->text())
            ->setTelephone($faker->phoneNumber())
            ->setInstagram('instagram')
            ->setFacebook('facebook')
            ->setRoles(['ROLE_PATISSIER']);

        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        // Création de 10 Blogposts
        for ($i=0; $i < 10; $i++) {
            $blogpost = new Blogpost();

            $blogpost->setTitre($faker->words(3, true))
                ->setContenu($faker->text())
                ->setSlug($faker->slug(3))
                ->setCreatedAt($faker->dateTimeBetween('-6 month', 'now'))
                ->setUser($user);

            $manager->persist($blogpost);
        }

        // Creation de 5 catégorie

        for ($k=0; $k<5; $k++) {
            $categorie = new Categorie();

            $categorie->setNom($faker->word())
                ->setDescription($faker->words(10, true))
                ->setSlug($faker->slug());

            $manager->persist($categorie);
        

            // Création de 2 patisseries/catégorie
            for ($j=0; $j<2; $j++) {
                $patisserie = new Patisserie();

                $patisserie->setNom(($faker->words(3, true)))
                    ->setCollection(($faker->word()))
                    ->setPrix(($faker->randomFloat(2, 100, 999)))
                    ->setCreatedAt(($faker->dateTimeBetween('-6 month', 'now')))
                    ->setDescription($faker->text())
                    ->setPortfolio($faker->randomElement([true,false]))
                    ->setSlug($faker->slug())
                    ->setFile('/img/placeholder.jpg')
                    ->setPortionPersonne(($faker->words(3, true)))
                    ->addCategorie($categorie)
                    ->setUser($user);

                $manager->persist($patisserie);
            }
        }

        $manager->flush();
    }
}
