<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EvenementFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $event1 = new Evenement();
        $event1->setUser($this->getReference("Riwan"));
        $event1->setSport($this->getReference("Football"));
        $event1->setNbPersonne(21);
        $event1->setAdresse("4 Square du Berry");
        $event1->setVille($this->getReference("ville-Rennes"));
        $event1->setDateEvent(new \DateTime("2020/06/28"));
        $event1->setHoraireDebut(new \DateTime("17:30:00"));
        $event1->setDescription("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer molestie leo in velit luctus, sit amet ultrices nisl vulputate. Ut viverra at eros in semper. Pellentesque porta venenatis lacus sit amet egestas. Aenean gravida, magna id lobortis tincidunt, eros tellus consectetur leo, ut hendrerit sapien nulla non lacus.");
        $event1->setDateCreation(new \DateTime("2020/06/10 12:00:24"));
        $manager->persist($event1);
        $this->addReference("event1-foot", $event1);

        $event2 = new Evenement();
        $event2->setUser($this->getReference("Solenn"));
        $event2->setSport($this->getReference("Natation"));
        $event2->setNbPersonne(3);
        $event2->setAdresse("4 Allée des Alignements");
        $event2->setVille($this->getReference("ville-Carnac"));
        $event2->setDateEvent(new \DateTime("2020/07/01"));
        $event2->setHoraireDebut(new \DateTime("14:00:00"));
        $event2->setDescription("Pellentesque imperdiet massa et ipsum dapibus dapibus. Aenean sodales, ante sit amet ullamcorper vestibulum, augue est tincidunt lacus, id fringilla mauris odio eget ipsum.");
        $event2->setDateCreation(new \DateTime("2020/06/26 13:02:12"));
        $manager->persist($event2);
        $this->addReference("event2-swim", $event2);

        $event3 = new Evenement();
        $event3->setUser($this->getReference("Cyril"));
        $event3->setSport($this->getReference("Tennis"));
        $event3->setNbPersonne(1);
        $event3->setAdresse("1 Rue Moïse le Bihan");
        $event3->setVille($this->getReference("ville-Lorient"));
        $event3->setDateEvent(new \DateTime("2020/07/10"));
        $event3->setHoraireDebut(new \DateTime("15:00:00"));
        $event3->setHoraireFin(new \DateTime("16:30:00"));
        $event3->setDescription("Mauris placerat quam tincidunt, sagittis eros eu, mollis mi. Suspendisse ac justo sed ante consequat cursus interdum a erat. Pellentesque imperdiet maximus nulla in accumsan.");
        $event3->setDateCreation(new \DateTime("2020/07/02 09:37:43"));
        $manager->persist($event3);
        $this->addReference("event3-tennis", $event3);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies()
    {
        return[
          VilleFixtures::class, SportFixtures::class, UserFixtures::class
        ];
    }
}
