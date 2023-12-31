<?php

class ContactModel {

    private $num_tel; // clé primaire

    private $num_licence; // clé étrangère 

    private $nom;

    private $prenom;

    private $email;

    



    public function __construct($num_tel, $num_licence, $nom, $prenom, $email) {

        $this->num_tel = $num_tel;

        $this->num_licence = $num_licence;

        $this->nom = $nom;

        $this->prenom = $prenom;

        $this->email = $email;

        

    }



    public function getNumTel() {

        return $this->$num_tel;

    }


    public function getNumLicence() {

        return $this->$num_licence;

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



    

    public function setNumTel($num_tel) {

        $this->num_tel=$num_tel;

    }



    public function setNumLicence($num_licence) {

        $this->num_licence=$num_licence;

    }


    public function setNom($nom) {

        $this->nom=$nom;

    }



    public function setPrenom($prenom) {

        $this->prenom=$prenom;

    }



    public function setEmail($email) {

        $this->email=$email;

    }




    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>

