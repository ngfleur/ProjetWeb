<?php

class CategorieModel
{

    private $id; // clé primaire
    private $code_raccourci;

    private $nom;




    public function __construct($id, $code_raccourci, $nom)
    {

        $this->id = $id;
        $this->code_raccourci = $code_raccourci;
        $this->nom = $nom;

    }



    public function getId()
    {

        return $this->id;

    }


    public function getCodeRaccourci()
    {

        return $this->code_raccourci;

    }



    public function getNom()
    {

        return $this->nom;

    }






    public function setCodeRaccourci($code_raccourci)
    {

        $this->code_raccourci = $code_raccourci;

    }



    public function setNom($nom)
    {

        $this->nom = $nom;

    }




    // Vous pouvez ajouter des mÃ©thodes supplÃ©mentaires ici pour manipuler les donnÃ©es du contact

}

?>