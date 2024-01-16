<?php
class LoginController
{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO)
    {
        $this->educateurDAO = $educateurDAO;
    }

    public function index()
    {
        include('./views/login.php');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['mdp'])) {

                $email = $_POST['email'];
                $mdp = $_POST['mdp'];

                $educateur = $this->educateurDAO->getByEmail($email);

                if ($educateur == null) {
                    echo "Erreur de connexion: Cet éducateur n'a pas été trouvé.";
                } else if (!password_verify($mdp, $educateur->getMdp())) {
                    echo "Erreur de connexion: Mot de passe incorrect.";
                } else if (!$educateur->getAdmin()) {
                    echo "Erreur de connexion: Vous n,êtes pas administrateur.";
                } else {
                    // Connexion réussie
                    $_SESSION['login'] = true;
                    $_SESSION['nom'] = $educateur->getNom();
                    $_SESSION['prenom'] = $educateur->getPrenom();
                    $_SESSION['email'] = $educateur->getEmail();

                    echo "Connexion réussie";
                    header('Location:index.php?page=home');
                    exit();
                }
            }
        }

        include './views/login.php';
    }

    public function logout()
    {
        unset($_SESSION["login"]);
        header('Location:index.php?page=login');
        exit();
    }

    public function profil()
    {
        include('./views/profil.php');

    }
}


?>