<?php
// Inclure le fichier de configuration
require_once('config/config.php');
require_once("config/config.php");
require_once("classes/models/Connexion.php");
require_once("classes/models/ContactModel.php");
require_once("classes/dao/ContactDAO.php");
$contactDAO=new ContactDAO(new Connexion());


// Exemple de routage basique
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page = 'home'; // Page par défaut
}


// Exemple avec un parametre pour permettre un routage plus sophistiqué
if (isset($_GET['action'])) {
$action = $_GET['action'];
} else {
$action = 'index'; // Page par défaut
}

// Définir les contrôleurs disponibles
$controllers = [
'home' => 'HomeController',
'add' => 'AddContactController',
'view' => 'ViewContactController',
'delete' => 'DeleteContactController',
'edit' => 'EditContactController'
];
// Vérifier si le contrôleur demandé existe
if (array_key_exists($page, $controllers)) {
$controllerName = $controllers[$page];
// Inclure le fichier du contrôleur
require_once('controllers/' . $controllerName . '.php');
echo "Vous appelez ce controller : ".$controllerName;
// Instancier le contrôleur
$controller = new $controllerName($contactDAO);
// Exécuter la méthode par défaut du contrôleur (par exemple, index() ou home())
$controller->$action(isset($_GET['id'])?$_GET['id']:null); // Vous pouvez ajuster la méthode par défaut selon votre convention
//c'est l'interet de action qui permet d'appeler une méthode particuliere d'un controller si il en possede plusieurs
//ici isset($_GET['id'])?$_GET['id']:null est une ternaire(un if else condensé) pour passer la variable à la fonction si elle existe
} else {
// Page non trouvée, vous redirigerez vers une page d'erreur 404
echo "Page non trouvée";
} ?>
