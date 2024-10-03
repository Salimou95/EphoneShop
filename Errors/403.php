<?php

$h1 = "ERREUR 403 : Accès refusé";
include __DIR__ . "/../public/header.php";
?>
<main>
<h2>⛔ Vous n'avez pas accès à cet URL</h2>

<a href="<?= ROOT ?>" class="btn btn-primary">
    <i class="fa fa-home"></i> Retourner à la page d'accueil
</a>
</main>
<?php
include __DIR__ . "/../public/footer.php";

