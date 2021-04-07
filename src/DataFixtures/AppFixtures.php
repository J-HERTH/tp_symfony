<?php

namespace App\DataFixtures;

use App\Entity\Topic;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory as Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR');
        for ($i=0; $i < 1000; $i++) { 
            $topic = new Topic();
            $topic
                ->setMessage($faker->sentences(3, true))
            ;
            $manager->persist($topic);
        }

        $manager->flush();
    }


}
