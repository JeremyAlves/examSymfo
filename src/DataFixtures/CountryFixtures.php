<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
{
    // Tableau des choses à ajouter
    $tab = array(
        array('title' => 'france'),
        array('title' => 'italie'),
        array('title' => 'allemagne'),
        array('title' => 'espagne'),
        array('title' => 'royaume-uni'),
    );

    foreach($tab as $row)
    {
      // On crée la country
    $country = new Country();
    $country->setName($row['title']);

    $manager->persist($country);
    }

    // On déclenche l'enregistrement
    $manager->flush();
}
}
