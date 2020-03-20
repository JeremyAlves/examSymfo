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
        array('title' => 'France'),
        array('title' => 'Italie'),
        array('title' => 'Allemagne'),
        array('title' => 'Espagne'),
        array('title' => 'Royaume-uni'),
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
