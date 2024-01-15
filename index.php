<?php

session_start();
ob_start();

// Inclure le fichier de configuration
require_once("config/config.php");
require_once("classes/models/Connexion.php");
require_once("classes/models/ContactModel.php");
require_once("classes/dao/ContactDAO.php");
require_once("classes/models/CategorieModel.php");
require_once("classes/dao/CategorieDAO.php");
require_once("classes/models/LicencieModel.php");
require_once("classes/dao/LicencieDAO.php");
require_once("classes/models/EducateurModel.php");
require_once("classes/dao/EducateurDAO.php");

$connexion=new Connexion();

$categorieDAO=new CategorieDAO($connexion);
$contactDAO=new ContactDAO($connexion);
$licencieDAO=new LicencieDAO($connexion);
$educateurDAO=new EducateurDAO($connexion);


// Exemple de routage basique
if (!isset($_SESSION['login'])) {
    $page = 'login'; // Redirection des utilisateurs non connectés sur la page de connexion
} else if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home'; // Page par d�faut
}


// Exemple avec un parametre pour permettre un routage plus sophistiqu�
if (isset($_GET['action'])) {
$action = $_GET['action'];
} else {
$action = 'index'; // Page par d�faut
}

// D�finir les contr�leurs disponibles
$controllers = [
'login' => 'LoginController',
'home' => 'HomeController',
'categorie' => 'CategorieController',
'licencie' => 'LicencieController',
'contact' => 'ContactController',
'educateur' => 'EducateurController',
];

// V�rifier si le contr�leur demand� existe
if (array_key_exists($page, $controllers)) {
$controllerName = $controllers[$page];
// Inclure le fichier du contr�leur
require_once('controllers/' . $controllerName . '.php');
echo "Vous appelez ce controller : ".$controllerName;
// Instancier le contr�leur
switch ($page) {
    case 'categorie':
        $controller = new CategorieController($categorieDAO);
        break;
    case 'licencie':
        $controller = new LicencieController($licencieDAO, $categorieDAO);
        break;
    case 'contact':
        $controller = new ContactController($contactDAO, $licencieDAO);
        break;
    case 'educateur':
        $controller = new EducateurController($educateurDAO, $categorieDAO);
        break;
    case 'login':
        $controller = new LoginController($educateurDAO);
        break;
    default:
        $controller = new HomeController();
        break;
}
// Ex�cuter la m�thode par d�faut du contr�leur (par exemple, index() ou home())

$controller->$action(isset($_GET['id'])?$_GET['id']:null); // Vous pouvez ajuster la m�thode par d�faut selon votre convention
//c'est l'interet de action qui permet d'appeler une m�thode particuliere d'un controller si il en possede plusieurs
//ici isset($_GET['id'])?$_GET['id']:null est une ternaire(un if else condens�) pour passer la variable � la fonction si elle existe
} else {
// Page non trouv�e, vous redirigerez vers une page d'erreur 404
echo "Page non trouv�e";
} ?>
