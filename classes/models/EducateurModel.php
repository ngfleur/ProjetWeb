<?php

class EducateurModel extends LicencieModel {

    private $id;  // clé primaire
    private $email;

    private $mdp;

    private $admin;
    private $id_licencie;


    public function __construct($id, $num_licence, $nom, $prenom, $id_categorie, $email, $mdp, $admin, $id_licencie) {

        parent::__construct($id_licencie, $num_licence, $nom, $prenom, $id_categorie);

        $this->id = $id;
        $this->email = $email;
        
        $this->mdp = $mdp;

        $this->admin = $admin;

    }


    public function getId() {

        return $this->id;

    }

    public function getEmail() {

        return $this->email;

    }




    public function getMdp() {

        return $this->mdp;

    }



    public function getAdmin() {

        return $this->admin;

    }

    public function getIdLicencie() {

        return $this->id_licencie;

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

    public function setIdLicencie($id_licencie) {

        $this->id_licencie=$id_licencie;

    }



   




    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>

