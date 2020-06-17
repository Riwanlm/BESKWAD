<?php

namespace App\DataFixtures;

use App\Entity\Commentaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentaireFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $contenu1 = new Commentaire();
        $contenu1->setUser($this->getReference("Riwan"));
        $contenu1->setEvenement($this->getReference("event1-foot"));
        $contenu1->setDateCreation(new \DateTime("2020/06/13 16:37:23"));
        $contenu1->setContenu("J'ai tellement hâte de partager ce moment avec vous ! 🥳");
        $manager->persist($contenu1);
        $this->addReference("contenu1", $contenu1);

        $contenu2 = new Commentaire();
        $contenu2->setUser($this->getReference("Riwan"));
        $contenu2->setEvenement($this->getReference("event1-foot"));
        $contenu2->setDateCreation(new \DateTime("2020/06/25 18:07:56"));
        $contenu2->setContenu("N'oubliez pas vos crampons 😉");
        $manager->persist($contenu2);
        $this->addReference("contenu2", $contenu2);

        $contenu3 = new Commentaire();
        $contenu3->setUser($this->getReference("Solenn"));
        $contenu3->setEvenement($this->getReference("event2-swim"));
        $contenu3->setDateCreation(new \DateTime("2020/06/26 13:28:10"));
        $contenu3->setContenu("J'espère que nous aurons du beau temps ce jour là 😃");
        $manager->persist($contenu3);
        $this->addReference("contenu3", $contenu3);

        $contenu4 = new Commentaire();
        $contenu4->setUser($this->getReference("Solenn"));
        $contenu4->setEvenement($this->getReference("event2-swim"));
        $contenu4->setDateCreation(new \DateTime("2020/06/29 21:30:18"));
        $contenu4->setContenu("Je viens de voir la météo, le temps sera génial 🤩");
        $manager->persist($contenu4);
        $this->addReference("contenu4", $contenu4);

        $contenu5 = new Commentaire();
        $contenu5->setUser($this->getReference("Cyril"));
        $contenu5->setEvenement($this->getReference("event3-tennis"));
        $contenu5->setDateCreation(new \DateTime("2020/07/02 14:43:00"));
        $contenu5->setContenu("Salut, je suis content que tu puisses faire une session de tennis avec moi 🙃");
        $manager->persist($contenu5);
        $this->addReference("contenu5", $contenu5);

        $contenu6 = new Commentaire();
        $contenu6->setUser($this->getReference("Cyril"));
        $contenu6->setEvenement($this->getReference("event3-tennis"));
        $contenu6->setDateCreation(new \DateTime("2020/07/05 09:22:09"));
        $contenu6->setContenu("Si tu n'as pas de raquette, ne t'en fais pas j'ai ce qu'il faut 😜");
        $manager->persist($contenu6);
        $this->addReference("contenu6", $contenu6);

        $contenu7 = new Commentaire();
        $contenu7->setUser($this->getReference("Julien"));
        $contenu7->setEvenement($this->getReference("event4-BMX"));
        $contenu7->setDateCreation(new \DateTime("2020/08/25 12:34:56"));
        $contenu7->setContenu("Ça fait tellement longtemps que je n'ai pas pratiquer cette discipline 😱");
        $manager->persist($contenu7);
        $this->addReference("contenu7", $contenu7);

        $contenu8 = new Commentaire();
        $contenu8->setUser($this->getReference("Julien"));
        $contenu8->setEvenement($this->getReference("event4-BMX"));
        $contenu8->setDateCreation(new \DateTime("2020/08/28 18:12:42"));
        $contenu8->setContenu("L'endroit ou l'on va faire du BMX est tout neuf en plus j'ai trop hâte d'y être 🤪");
        $manager->persist($contenu8);
        $this->addReference("contenu8", $contenu8);


        $manager->flush();
    }

    public function getDependencies()
    {
        return[
            UserFixtures::class, EvenementFixtures::class
        ];
    }
}
