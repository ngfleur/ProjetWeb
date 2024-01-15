<?php
class ContactController {
    private $contactDAO;
    private $licencieDAO;

    public function __construct(ContactDAO $contactDAO, LicencieDAO $licencieDAO) {
        $this->contactDAO = $contactDAO;
        $this->licencieDAO = $licencieDAO;
    }

    public function index() {
        // Récupérer la liste de tous les contacts depuis le modèle
        $contacts = $this->contactDAO->getAll();

        // Inclure la vue pour afficher la liste des contacts
        include('views/contact/index.php');
    }

    public function show($id) {
        // Récupérer le contact à afficher en utilisant son ID
        $licencies = $this->licencieDAO->getAll();
        $contact = $this->contactDAO->getById($id);

        // Inclure la vue pour afficher les détails du contact
        include('views/contact/show.php');
    }

    public function add() {
        $licencies = $this->licencieDAO->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $numTel = $_POST['num_tel'];
            $idLicencie = $_POST['id_licencie'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Créer un nouvel objet ContactModel avec les données du formulaire
            $nouveauContact = new ContactModel(0, $nom, $prenom, $email, $numTel, $idLicencie);

            // Appeler la méthode du modèle (ContactDAO) pour ajouter le contact
            if ($this->contactDAO->create($nouveauContact)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php?page=contact');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('views/contact/add.php');
    }

    public function edit($id) {
        // Récupérer le contact à modifier en utilisant son ID
        $licencies = $this->licencieDAO->getAll();
        $contact = $this->contactDAO->getById($id);

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $numTel = $_POST['num_tel'];
            $idLicencie = $_POST['id_licencie'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du contact
            $contact->setNom($nom);
            $contact->setPrenom($prenom);
            $contact->setEmail($email);
            $contact->setNumTel($numTel);
            $contact->setidLicencie($idLicencie);

            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le contact
            if ($this->contactDAO->update($contact)) {
                // Rediriger vers la page de détails du contact après la modification
                header('Location:index.php?page=contact&action=edit&id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour du contact
                echo "Erreur lors de la modification du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('views/contact/edit.php');
    }

    public function delete($id) {
        // Récupérer le contact à supprimer en utilisant son ID
        $contact = $this->contactDAO->getById($id);

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le contact en appelant la méthode du modèle (ContactDAO)
            if ($this->contactDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=contact');
                exit();
            } else {
                // Gérer les erreurs de suppression du contact
                echo "Erreur lors de la suppression du contact.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du contact
        include('views/contact/delete.php');
    }
}
?>
