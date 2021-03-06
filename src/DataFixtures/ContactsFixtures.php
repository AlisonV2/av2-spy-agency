<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contacts;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactsFixtures extends Fixture
{
 
 public function load(ObjectManager $manager)
    {
        $countries = ['France', 'Italy', 'Spain', 'Portugal', 'Germany', 'Belgium'];
                
        for ($i = 0; $i <= 50; $i++) {
            $contact = new Contacts();
            $faker = Factory::create();
            $contact->setName($faker->lastName);
            $contact->setFirstName($faker->firstName);
            $contact->setBirthday($faker->dateTimeBetween($startDate = '-50 years', $endDate = '-25 years', $timezone = null));
            $contact->setAlias($faker->unique->colorName);
            $contact->setCountry($faker->randomElement($countries));

            $manager->persist($contact);
        }
        $manager->flush();
    }
}