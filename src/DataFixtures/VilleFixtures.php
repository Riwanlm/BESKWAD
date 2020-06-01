<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $villes = ["Rennes", "Pontivy", "Quimper", "Brest", "Vannes", "Carnac", "Lorient", "Saint-Brieuc", "Locminé", "Malestroit"];

        foreach ($villes as $ville) {
            $city = new Ville();
            $city->setNom(ucfirst($ville));
            $manager->persist($city);
            $this->addReference("ville-$ville", $city);
    }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
