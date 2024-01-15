<?php
class LicencieController {
    private $licencieDAO;
    private $categorieDAO;

    public function __construct(LicencieDAO $licencieDAO, CategorieDAO $categorieDAO) {
        $this->licencieDAO = $licencieDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les contacts depuis le modÃ¨le
        $licencies = $this->licencieDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/licencie/index.php');
    }

    public function show($id) {
        // Récupérer le licencié à afficher en utilisant son ID
        $categories = $this->categorieDAO->getAll();
        $licencie = $this->licencieDAO->getById($id);

        // Inclure la vue pour afficher les détails du licencié
        include('views/licencie/show.php');
    }

    public function add() {
        $categories = $this->categorieDAO->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numLicence = $_POST['num_licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $idCategorie = $_POST['id_categorie'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet LicencieModel avec les données du formulaire
            $nouveauLicencie = new LicencieModel(0, $numLicence, $nom, $prenom, $idCategorie);

            // Appeler la méthode du modèle (LicencieDAO) pour ajouter le licencié
            if ($this->licencieDAO->create($nouveauLicencie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php?page=licencie');
                exit();
            } else {
                // Gérer les erreurs d'ajout de licencié
                echo "Erreur lors de l'ajout du licencié.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de licencié
        include('views/licencie/add.php');
    }

    public function edit($id) {
        // Récupérer le licencié à modifier en utilisant son ID
        $categories = $this->categorieDAO->getAll();
        $licencie = $this->licencieDAO->getById($id);

        if (!$licencie) {
            // Le licencié n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencié n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numLicence = $_POST['num_licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $idCategorie = $_POST['id_categorie'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du licencié
            $licencie->setNumLicence($numLicence);
            $licencie->setNom($nom);
            $licencie->setPrenom($prenom);
            $licencie->setIdCategorie($idCategorie);

            // Appeler la méthode du modèle (LicencieDAO) pour mettre à jour le licencié
            if ($this->licencieDAO->update($licencie)) {
                // Rediriger vers la page de détails du licencié après la modification
                header('Location:index.php?page=licencie&action=edit&id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour du licencié
                echo "Erreur lors de la modification du licencié.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du licencié
        include('views/licencie/edit.php');
    }

    public function delete($id) {
        // Récupérer le licencié à supprimer en utilisant son ID
        $licencie = $this->licencieDAO->getById($id);

        if (!$licencie) {
            // Le licencié n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencié n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le licencié en appelant la méthode du modèle (LicencieDAO)
            if ($this->licencieDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=licencie');
                exit();
            } else {
                // Gérer les erreurs de suppression du licencié
                echo "Erreur lors de la suppression du licencié.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du licencié
        include('views/licencie/delete.php');
    }
}


?>
