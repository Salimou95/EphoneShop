<?php

/* ⚠ Il faut inclure le fichier autoload AVANT d'exécuter la fonction session_start() sinon il y aura
        une error si on essaye de stocker un objet dans la variable superglobale $_SESSION */
require "autoload.php";
session_start();
include __DIR__ . "/functions.inc.php";
define("ROOT", "/EphoneShop/");
define("ROLE_USER", "ROLE_USER");
define("ROLE_ADMIN", "ROLE_ADMIN"); 
define("INSERTED", "Enregistrer"); 
define("UPDATED", "Modifier"); 
define("DELETED", "Supprimer"); 
// define("UPLOAD_PRODUCTS_IMG", "uploads/products/");
define("UPLOAD_IMG", "uploads/imgSite/");
define("UPLOAD_IMG_TELEPHONE", "uploads/imgTelephone/");


define("STYLE", "Public/assets/css/");

define("EN_ATTENTE", "En Attente");