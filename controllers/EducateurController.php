<?php
class EducateurController
{
    private $educateurDAO;
    private $categorieDAO;

    public function __construct(EducateurDAO $educateurDAO, CategorieDAO $categorieDAO)
    {
        $this->educateurDAO = $educateurDAO;
        $this->categorieDAO = $categorieDAO;
    }

    public function index()
    {
        // Récupérer la liste de tous les éducateurs depuis le modèle
        $educateurs = $this->educateurDAO->getAll();

        // Inclure la vue pour afficher la liste des éducateurs
        include('views/educateur/index.php');
    }

    public function show($id)
    {
        // Récupérer l'éducateur à afficher en utilisant son ID
        $categories = $this->categorieDAO->getAll();
        $educateur = $this->educateurDAO->getById($id);

        // Inclure la vue pour afficher les détails de l'éducateur
        include('views/educateur/show.php');
    }

    public function add()
    {
        $categories = $this->categorieDAO->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numLicence = $_POST['num_licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $idCategorie = $_POST['id_categorie'];
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $admin = isset($_POST['admin']) ? 1 : 0;

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet EducateurModel avec les données du formulaire
            $nouveauEducateur = new EducateurModel(0, $numLicence, $nom, $prenom, $idCategorie, $email, $mdp, $admin, 0);

            // Appeler la méthode du modèle (EducateurDAO) pour ajouter l'éducateur
            if ($this->educateurDAO->create($nouveauEducateur)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php?page=educateur');
                exit();
            } else {
                // Gérer les erreurs d'ajout de l'éducateur
                echo "Erreur lors de l'ajout de l'éducateur.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de l'éducateur
        include('views/educateur/add.php');
    }

    public function edit($id)
    {
        // Récupérer l'éducateur à modifier en utilisant son ID
        $categories = $this->categorieDAO->getAll();
        $educateur = $this->educateurDAO->getById($id);

        if (!$educateur) {
            // L'éducateur n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "L'éducateur n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $numLicence = $_POST['num_licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $idCategorie = $_POST['id_categorie'];
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            $admin = isset($_POST['admin']) ? 1 : 0;

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails de l'éducateur
            $educateur->setNumLicence($numLicence);
            $educateur->setNom($nom);
            $educateur->setPrenom($prenom);
            $educateur->setIdCategorie($idCategorie);
            $educateur->setEmail($email);
            $educateur->setMdp($mdp);
            $educateur->setAdmin($admin);

            // Appeler la méthode du modèle (EducateurDAO) pour mettre à jour l'éducateur
            if ($this->educateurDAO->update($educateur)) {
                // Rediriger vers la page de détails de l'éducateur après la modification
                header('Location:index.php?page=educateur');
                exit();
            } else {
                // Gérer les erreurs de mise à jour de l'éducateur
                echo "Erreur lors de la modification de l'éducateur.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification de l'éducateur
        include('views/educateur/edit.php');
    }

    public function delete($id)
    {
        // Récupérer l'éducateur à supprimer en utilisant son ID
        $educateur = $this->educateurDAO->getById($id);

        if (!$educateur) {
            // L'éducateur n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "L'éducateur n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer l'éducateur en appelant la méthode du modèle (EducateurDAO)
            if ($this->educateurDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=educateur');
                exit();
            } else {
                // Gérer les erreurs de suppression de l'éducateur
                echo "Erreur lors de la suppression de l'éducateur.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression de l'éducateur
        include('views/educateur/delete.php');
    }
}
?>