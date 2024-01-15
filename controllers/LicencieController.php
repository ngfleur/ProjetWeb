<?php
class LicencieController {
    private $licencieDAO;
    private $categorieDAO;

    public function __construct(LicencieDAO $licencieDAO, CategorieDAO $categorieDAO) {
        $this->$licencieDAO = $$licencieDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les contacts depuis le modÃ¨le
        $categories = $this->categorieDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/categorie/index.php');
    }
}


?>
