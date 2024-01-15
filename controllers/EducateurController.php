<?php
class EducateurController {
    private $educateurDAO;
    private $licencieDAO;

    public function __construct(EducateurDAO $educateurDAO, LicencieDAO $licencieDAO) {
        $this->$educateurDAO = $$educateurDAO;
        $this->$licencieDAO = $$licencieDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les contacts depuis le modÃ¨le
        $educateurs = $this->educateurDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/educateur/index.php');
    }
}


?>
