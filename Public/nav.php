<section class="containe">
        <a class="nav-link" href="<?= addLink("Accueil")?>">
            <img id="logo" src="<?php echo UPLOAD_IMG; ?>Logo.png" alt="" class="Logo">
        </a>
    <article class="icon">
    
        <a class="nav-link" href="<?= addLink("Panier", "index")?>"><i class="fa-solid fa-basket-shopping"></i></a>
        <div class="nbcircle">
            <div id="nombre"><?= $_SESSION["nombre"] ?? 0; ?></div>
        </div>
        <a class="nav-link circle" href="<?= addLink("utilisateur", $userConnecte = Service\Session::getUserConnected() ? 'profil' :'connexion')?>"><i class="fa-solid fa-circle-user" id="user-btn"></i></a>

        <div id="menu">
          <div class="menuburger"></div>
          <div class="menuburger"></div>
          <div class="menuburger"></div>
        </div>

    </article>
</section>
<?php if( $userConnecte = Service\Session::getUserConnected() ): ?>
<?php if( Service\Session::isadmin() ): ?>
 <nav class="nav__buttons">
         
    <ul>
            <div class="btn">
                    <li><a class="nav-link " href="<?= addLink("telephone","index",null,"admin")?>">Gestion des Téléphones</a></li>               
            </div>
            <div class="btn">
                <li><a class="nav-link" href="<?= addLink("marque","index",null,"admin")?>">Gestion des Marques</a></li>
            </div>
            <div class="btn">
                <li><a class="nav-link" href="<?= addLink("utilisateur","index",null,"admin")?>">Gestion des Utilisateurs</a></li>
            </div>
        
            <div class="btn">
                <li><a class="nav-link" href="<?= addLink("commande","index",null,"admin")?>">Gestion des Commandes</a></li>
            </div>
        <?php endif; ?>


        </div>
        <?php else:?>
        
            
        </ul>
    </nav>
    <?php endif;?>
