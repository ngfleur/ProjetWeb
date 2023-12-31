<?php

class CategorieModel {

    private $code_raccourci; // clé primaire

    private $nom;
    



    public function __construct($code_raccourci, $nom) {

        $this->code_raccourci = $code_raccourci;

        $this->nom = $nom;
        
    }



    public function getCodeRaccourci() {

        return $this->$code_raccourci;

    }



    public function getNom() {

        return $this->nom;

    }




    

    public function setCodeRaccourci($code_raccourci) {

        $this->code_raccourci=$code_raccourci;

    }



    public function setNom($nom) {

        $this->nom=$nom;

    }




    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>

