<nav>
    <div>
        <a class="nav-link" href="<?= addLink("Accueil")?>">
            <img id="logo" src="<?php echo UPLOAD_IMG; ?>Logo.png" alt="">
        </a>
    </div>
    <?php if( $userConnecte = Service\Session::getUserConnected() ): ?>
    <div>
    <a class="nav-link" href="<?= addLink("utilisateur", "deconnexion") ?>">
    deconnexion</a>
    <a class="nav-link" href="<?= addLink("utilisateur", "profil",$userConnecte->getId())?>">
    mon profil</a>

    </div>
    <?php else:?>
        <div>
        <a class="nav-link" href="<?= addLink("utilisateur", "connexion")?>">
        connexion</a>
        </div>
    <?php endif;?>
</nav>