<?php

namespace App\DataFixtures;

use App\Entity\Sport;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SportFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //$sports = ["Football", "Course à pied", "BMX", "Tennis", "Badminton", "Natation", "Escalade", "Sprint", s"Basket-ball", "Marche"];

        $foot = new Sport();
        $foot->setLibelle("Football");
        $foot->setImage("football.png");
        $manager->persist($foot);
        $this->addReference("Football", $foot);

        $running = new Sport();
        $running->setLibelle("Course à pied");
        $running->setImage("run.png");
        $manager->persist($running);
        $this->addReference("Course à pied", $running);

        $tennis = new Sport();
        $tennis->setLibelle("Tennis");
        $tennis->setImage("tennis.png");
        $manager->persist($tennis);
        $this->addReference("Tennis", $tennis);

        $bmx = new Sport();
        $bmx->setLibelle("BMX");
        $bmx->setImage("bmx.png");
        $manager->persist($bmx);
        $this->addReference("BMX", $bmx);

        $climb = new Sport();
        $climb->setLibelle("Escalade");
        $climb->setImage("climbing.png");
        $manager->persist($climb);
        $this->addReference("Escalade", $climb);

        $swim = new Sport();
        $swim->setLibelle("Natation");
        $swim->setImage("swimming.png");
        $manager->persist($swim);
        $this->addReference("Natation", $swim);

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
