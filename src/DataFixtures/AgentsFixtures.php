<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Agents;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AgentsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $specialities = ['Information', 'Extraction', 'Torture', 'Blackmail'];
        $countries = ['France', 'Italy', 'Spain', 'Portugal', 'Germany', 'Belgium'];
        
        for ($i = 0; $i <=50; $i++) {
            $agent = new Agents();
            $faker = Factory::create();
            $agent->setName($faker->lastName);
            $agent->setFirstName($faker->firstName);
            $agent->setBirthday($faker->dateTimeBetween($startDate = '-50 years', $endDate = '-25 years', $timezone = null));
            $agent->setIdCode($faker->unique->randomNumber($nbDigits = 8, $strict = false));
            $agent->setCountry($faker->randomElement($countries));
            $agent->setSpeciality($faker->randomElement($specialities));

            $manager->persist($agent);
        }
        $manager->flush();
    }  
}
