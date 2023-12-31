<?php

class EducateurModel extends LicencieModel {

    private $email;  // clé primaire

    private $mdp;

    private $admin;


    public function __construct($num_licence, $nom, $prenom, $code_raccourci, $email, $mdp, $admin) {

        parent::__construct($num_licence, $nom, $prenom, $code_raccourci);

        $this->email = $email;
        
        $this->mdp = password_hash($mdp, PASSWORD_DEFAULT);

        $this->admin = $admin;

    }



    public function getEmail() {

        return $this->$email;

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



    public function setMdp($mdp) {

        $this->mdp = password_hash($mdp, PASSWORD_DEFAULT);

    }



    public function setAdmin($admin) {

        $this->admin=$admin;

    }



   




    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>

