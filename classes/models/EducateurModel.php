<?php

class EducateurModel {

    private $email;  // clé primaire

    private $num_licence; // clé étrangère 

    private $mdp;

    private $admin;


    



    public function __construct($email, $num_licence, $mdp, $admin) {

        $this->email = $email;

        $this->num_licence = $num_licence;

        $this->mdp = $mdp;

        $this->admin = $admin;

    }



    public function getEmail() {

        return $this->$email;

    }


    public function getNumLicence() {

        return $this->$num_licence;

    }



    public function getMdp() {

        return $this->mdp;

    }



    public function getAdmin() {

        return $this->admin;

    }




    

    public function setEmail($email) {

        $this->email=$email;

    }



    public function setNumLicence($num_licence) {

        $this->num_licence=$num_licence;

    }


    public function setMdp($mdp) {

        $this->mdp=$mdp;

    }



    public function setAdmin($admin) {

        $this->admin=$admin;

    }



   




    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>

