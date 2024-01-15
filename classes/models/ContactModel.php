<?php


class ContactModel {
        private $id; // clé primaire

    public $nom;
    public $prenom;
    public $email;
    public $num_tel;
    public $id_licencie;

    public function __construct($id, $nom, $prenom, $email, $num_tel, $id_icencie) {
         $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->num_tel = $num_tel;
        $this->id_licencie = $id_icencie;
    }

    public function getId() {

        return $this->id;

    }

    public function getNom() {

        return $this->nom;

    }
    public function getPrenom() {

        return $this->prenom;

    }
    public function getEmail() {

        return $this->email;

    }
    public function getNumTel() {

        return $this->num_tel;

    }
    
    public function getIdLicencie() {

        return $this->id_licencie;

    }

    public function setNom($nom) {

         $this->nom = $nom;

    }
    public function setPrenom($prenom) {

         $this->prenom = $prenom;

    }
    public function setEmail($email) {

         $this->email = $email;

    }
    public function setNumTel($num_tel) {

         $this->num_tel = $num_tel;

    }

    public function setidLicencie($id_licencie) {

        $this->id_licencie = $id_licencie;

   }
}

?>

