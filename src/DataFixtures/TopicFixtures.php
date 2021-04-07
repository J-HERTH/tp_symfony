<?php

namespace App\DataFixtures;

use App\Entity\Topic;
use App\Repository\UserRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory as Faker;

class TopicFixtures extends Fixture implements DependentFixtureInterface
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }

    public function load(ObjectManager $manager)
    {
        $users = $this->userRepository->findAll();
        $userslength = count($users)-1;
        $faker = Faker::create('fr_FR');
        for ($i=0; $i < 1000; $i++) { 
            $randomKey = rand(0, $userslength);
            $user = $users[$randomKey];

            $topic = new Topic();
            $topic
                ->setMessage($faker->sentences(20, true))
                ->setCreatedAt(new \DateTime())
                ->setUser($user)
            ;
            $manager->persist($topic);
        }

        $manager->flush();
    }
}