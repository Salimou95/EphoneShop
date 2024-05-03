<section class="containe">
        <a class="nav-link" href="<?= addLink("Accueil")?>">
            <img id="logo" src="<?php echo UPLOAD_IMG; ?>Logo.png" alt="" class="Logo">
        </a>
        
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
          
       

        

    <div class="icon">
        <i class="fa-solid fa-basket-shopping"></i>
        <?php if( $userConnecte = Service\Session::getUserConnected() ): ?>
        <a class="nav-link" href="<?= addLink("utilisateur", "profil",$userConnecte->getId())?>"><i class="fa-solid fa-circle-user" id="user-btn"></i> 
</a>
        <?php endif; ?>
        



    </div>
</section>
 <nav class="nav__buttons">
         
    <ul>
        <div class="btn">
            <li><a href="">Nos Téléphone</a></li>
        </div>
        <?php if( $userConnecte = Service\Session::getUserConnected() ): ?>
        <?php if( Service\Session::isadmin() ): ?>
            <div class="btn">
                <li><a class="nav-link" href="<?= addLink("telephone","index",null,"admin")?>">Gestion des Téléphones</a></li>
            </div>
            <div class="btn">
                <li><a class="nav-link" href="<?= addLink("marque","index",null,"admin")?>">Gestion des Marques</a></li>
            </div>
            <div class="btn">
                <li><a class="nav-link" href="<?= addLink("utilisateur","index",null,"admin")?>">Gestion des Utilisateurs</a></li>
            </div>
            <div class="btn">
                <li><a class="nav-link" href="<?= addLink("commentaire","index",null,"admin")?>">Gestion des Commentaire</a></li>
            </div>
        <?php endif; ?>


        </div>
        <?php else:?>
            <div>
            <a class="nav-link" href="<?= addLink("utilisateur", "connexion")?>">connexion</a>
            <a class="nav-link" href="<?= addLink("utilisateur", "created")?>">inscription</a>
            </div>
        <?php endif;?>

                    </ul>
</nav>


