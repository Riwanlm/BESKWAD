<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{

    private $encoder;

    /**
     * UserFixtures constructor.
     */

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
         $admin = new User();
         $admin->setNom("Le Mignon");
         $admin->setPrenom("Riwan");
         $admin->setDateNaissance(new \DateTime("1995/04/10"));
         $admin->setEmail("riwanlm@gmail.com");
         $admin->setPassword($this->encoder->encodePassword($admin, "litzavse"));
         $admin->setVille($this->getReference("ville-Rennes"));
         $admin->setRoles(["ROLE_ADMIN"]);
         $manager->persist($admin);
         $this->addReference("Riwan", $admin);

         $julien = new User();
         $julien->setNom("Allio");
         $julien->setPrenom("Julien");
         $julien->setDateNaissance(new \DateTime("1998/07/14"));
         $julien->setEmail("jujuallio@hotmail.fr");
         $julien->setPassword($this->encoder->encodePassword($julien, "juju-mdp"));
         $julien->setVille($this->getReference("ville-Pontivy"));
         $julien->setRoles(["ROLE_USER"]);
         $manager->persist($julien);
         $this->addReference("Julien", $julien);

         $cyril = new User();
         $cyril->setNom("Loiseau");
         $cyril->setPrenom("Cyril");
         $cyril->setDateNaissance(new \DateTime("1987/10/04"));
         $cyril->setEmail("cyriloiseau@orange.fr");
         $cyril->setPassword($this->encoder->encodePassword($cyril, "cyril-mdp"));
         $cyril->setVille($this->getReference("ville-Lorient"));
         $cyril->setRoles(["ROLE_USER"]);
         $manager->persist($cyril);
         $this->addReference("Cyril", $cyril);

         $solenn = new User();
         $solenn->setNom("Robic");
         $solenn->setPrenom("Solenn");
         $solenn->setDateNaissance(new \DateTime("1993/03/02"));
         $solenn->setEmail("sol.robic@gmail.com");
         $solenn->setPassword($this->encoder->encodePassword($solenn, "solenn-mdp"));
         $solenn->setVille($this->getReference("ville-Carnac"));
         $solenn->setRoles(["ROLE_USER"]);
         $manager->persist($solenn);
         $this->addReference("Solenn", $solenn);

        $manager->flush();
    }

    public function getDependencies() {
        return[
            VilleFixtures::class
        ];
    }
}
