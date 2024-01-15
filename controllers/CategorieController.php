<?php
class CategorieController {
    private $categorieDAO;

    public function __construct(CategorieDAO $categorieDAO) {
        $this->categorieDAO = $categorieDAO;
    }

    public function index() {
        // RÃ©cupÃ©rer la liste de tous les categories depuis le modÃ¨le
        $categories = $this->categorieDAO->getAll();

        // Inclure la vue pour afficher la liste des categories
        include('views/categorie/index.php');
    }

    public function show($id) {
        // Récupérer le categorie à afficher en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        // Inclure la vue pour afficher les détails du categorie
        include('views/categorie/show.php');
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code_raccourci = $_POST['code_raccourci'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet categorieModel avec les données du formulaire
            $nouvelleCategorie = new CategorieModel(0,$nom, $code_raccourci);

            // Appeler la méthode du modèle (categorieDAO) pour ajouter le categorie
            if ($this->categorieDAO->create($nouvelleCategorie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php?page=categorie');
                exit();
            } else {
                // Gérer les erreurs d'ajout de categorie
                echo "Erreur lors de l'ajout de la catégorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de categorie
        include('views/categorie/add.php');
    }

    public function edit($id) {
        // Récupérer le categorie à modifier en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        if (!$categorie) {
            // Le categorie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La categorie n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code_raccourci = $_POST['code_raccourci'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du categorie
            $categorie->setNom($nom);
            $categorie->setCodeRaccourci($code_raccourci);

            // Appeler la méthode du modèle (categorieDAO) pour mettre à jour le categorie
            if ($this->categorieDAO->update($categorie)) {
                // Rediriger vers la page de détails du categorie après la modification
                header('Location:index.php?page=categorie&action=edit&id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour du categorie
                echo "Erreur lors de la modification de la catégorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du categorie
        include('views/categorie/edit.php');
    }

    public function delete($id) {
        // Récupérer le categorie à supprimer en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        if (!$categorie) {
            // Le categorie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "La categorie n'a pas été trouvée.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le categorie en appelant la méthode du modèle (categorieDAO)
            if ($this->categorieDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=categorie');
                exit();
            } else {
                // Gérer les erreurs de suppression du categorie
                echo "Erreur lors de la suppression de la catégorie.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du categorie
        include('views/categorie/delete.php');
    }
    
}


?>
