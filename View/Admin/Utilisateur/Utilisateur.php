<?php
var_dump($utilisateur);
?>

<a href="<?= addLinkAdmin("admin","utilisateur","deleteUtilisateur",$utilisateur->getId())?>">Supprimer</a>
