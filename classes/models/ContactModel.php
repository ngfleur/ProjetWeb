<?php


class Contact {
    public $nom;
    public $prenom;
    public $email;
    public $numeroTel;

    public function __construct($nom, $prenom, $email, $numeroTel) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->numeroTel = $numeroTel;
    }
}

class Categorie {
    public $nom;
    public $codeRaccourci;

    public function __construct($nom, $codeRaccourci) {
        $this->nom = $nom;
        $this->codeRaccourci = $codeRaccourci;
    }
}

class Licencie {
    public $numeroLicence;
    public $contact;
    public $categorie;

    public function __construct($numeroLicence, Contact $contact, Categorie $categorie) {
        $this->numeroLicence = $numeroLicence;
        $this->contact = $contact;
        $this->categorie = $categorie;
    }
}

class Educateur extends Licencie {
    public $email;
    public $motDePasse;
    public $estAdministrateur;

    public function __construct($numeroLicence, Contact $contact, Categorie $categorie, $email, $motDePasse, $estAdministrateur = false) {
        parent::__construct($numeroLicence, $contact, $categorie);
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->estAdministrateur = $estAdministrateur;
    }
}

?>

