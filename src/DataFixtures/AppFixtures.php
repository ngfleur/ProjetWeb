<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;
use App\Entity\Contact;
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

          $contact = new Contact();
          $contact->setNumTel("0102030405");
          $contact->setEmail("adminadmin@gmail.com");
          $contact->setNom($licencie->getNom());
          $contact->setPrenom($licencie->getPrenom());
          $contact->setLicencie($licencie);
          $manager->persist($contact);

          $educateur = new Educateur();
          $educateur->setEmail("adminadmin@gmail.com");
          $educateur->setRoles(['ROLE_ADMIN']);
          $educateur->setPassword(password_hash("admin", PASSWORD_DEFAULT));
          $educateur->setLicencie($licencie);
          $manager->persist($educateur);


        $manager->flush();
    }
}
