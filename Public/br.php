<nav>
    <div>
        <a class="nav-link" href="<?= addLink("Accueil")?>">
            <img id="logo" src="<?php echo UPLOAD_IMG; ?>Logo.png" alt="">
        </a>
    </div>
    <?php if( $userConnecte = Service\Session::getUserConnected() ): ?>
    <div>
        <ul>
            <li><a class="nav-link" href="<?= addLink("utilisateur", "deconnexion") ?>">deconnexion</a></li>
            <li><a class="nav-link" href="<?= addLink("utilisateur", "profil",$userConnecte->getId())?>">mon profil</a></li>
        </ul>
    
    <?php if( Service\Session::isadmin() ): ?>
        <ul>
            <li><a class="nav-link" href="<?= addLink("telephone","index",null,"admin")?>">Gestion des Téléphones</a></li>
            <li><a class="nav-link" href="<?= addLink("telephone","created",null,"admin")?>">Ajouter un Téléphone</a></li>
        </ul>
        <ul>
            <li><a class="nav-link" href="<?= addLink("marque","index",null,"admin")?>">Gestion des Marques</a></li>
            <li><a class="nav-link" href="<?= addLink("marque","created",null,"admin")?>">Ajouter une  Marque</a></li>
        </ul>
        <ul>
            <li><a class="nav-link" href="<?= addLink("utilisateur","index",null,"admin")?>">Gestion des Utilisateurs</a></li>
        </ul>
    <?php endif; ?>


    </div>
    <?php else:?>
        <div>
        <a class="nav-link" href="<?= addLink("utilisateur", "connexion")?>">connexion</a>
        <a class="nav-link" href="<?= addLink("utilisateur", "created")?>">inscription</a>
        </div>
    <?php endif;?>
</nav>


<form action="" class="search__form">
                <div class="search" id="search">
                    <i class="fa-solid fa-magnifying-glass" id="search-icon"></i>
                    <input type="search" id="search-input" placeholder="Search Phone..." class="search__input">
            <ul id="telephone-list">

            <?php  if(isset($telephones))
            foreach ($telephones as $telephone): ?>
                <li><a href="<?= addLink("telephone","read",$telephone->getId())?>"><?= htmlspecialchars($telephone->getModele())?></a></li>
            <?php endforeach; ?>
        </ul>
        </div>
    </form>