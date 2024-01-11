<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Licencie;
use App\Entity\Educateur;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $categorie = new Categorie();
         $categorie->setCodeRaccourci("admin");
         $categorie->setNom("administrateurs");
         $manager->persist($categorie);

          $licencie = new Licencie();
          $licencie->setNumLicence(1);
          $licencie->setNom("admin");
          $licencie->setPrenom("admin");
          $licencie->setCategorie($categorie);
          $manager->persist($licencie);

          $educateur = new Educateur();
          $educateur->setEmail("adminadmin@gmail.com");
          $educateur->setRoles(['ROLE_ADMIN']);
          $educateur->setPassword(password_hash("admin", PASSWORD_DEFAULT));
          $educateur->setLicencie($licencie);
          $manager->persist($educateur);


        $manager->flush();
    }
}
