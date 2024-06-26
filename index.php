<?php
require "inc/init.inc.php";
// d_die($_SERVER);                                                                                                                                                                 ²
// d_die(ROOT);
/* 
URL: index.php?controller=user&method=update&id=32
*/
$admin      = $_GET["doc"] ?? null;
$controller = $_GET["controller"] ?? "Accueil";
$method     = $_GET["method"] ?? "index";
$id         = $_GET["id"] ?? null;


if(!empty($admin)){
    $classController = "Controller\\admin\\" . ucfirst($controller) . "Controller";
}else{
    $classController = "Controller\\" . ucfirst($controller) . "Controller";
}

//$classController = "Controller\\" . ucfirst($controller) . "Controller";  // ucfirst: met la première lettre d'un string en majuscule
/* $classController = "Controller\UserController" 
   $method = "list"
*/

/* On peut instancier un objet en utilisant un string pour le nom de la class.
    _⚠ le nom de la class doit être dans une variable pour pouvoir utiliser 'new'
*/

try {
    $controller = new $classController;//Controller\UserController
    
    // $UserController->update($id);

    $controller->$method($id);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
