<?php

class LicencieModel {

    private $num_licence; // clé primaire

    private $nom;

    private $prenom;

    private $code_raccourci;

    



    public function __construct( $num_licence, $nom, $prenom, $code_raccourci) {

        $this->num_licence = $num_licence;

        $this->nom = $nom;

        $this->prenom = $prenom;

        $this->code_raccourci = $code_raccourci;

        

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



    public function getcodeRaccourci() {

        return $this->$code_raccourci;

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



    public function setcodeRaccourci($code_raccourci) {

        $this->code_raccourci=$code_raccourci;

    }




    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>

