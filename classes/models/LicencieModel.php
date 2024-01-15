<?php

class LicencieModel {

    private $id;  // clé primaire
    private $num_licence;

    private $nom;

    private $prenom;

    private $id_categorie; // clé étrangère

    



    public function __construct($id, $num_licence, $nom, $prenom, $id_categorie) {

        $this->id = $id;
        $this->num_licence = $num_licence;

        $this->nom = $nom;

        $this->prenom = $prenom;

        $this->id_categorie = $id_categorie;

        

    }

    public function getId() {

        return $this->id;

    }

    public function getNumLicence() {

        return $this->num_licence;

    }



    public function getNom() {

        return $this->nom;

    }



    public function getPrenom() {

        return $this->prenom;

    }



    public function getIdCategorie() {

        return $this->id_categorie;

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



    public function setIdCategorie($id_categorie) {

        $this->id_categorie=$id_categorie;

    }




    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>

