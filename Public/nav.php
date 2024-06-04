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
    
        <a class="nav-link" href="<?= addLink("Panier", "index")?>"><i class="fa-solid fa-basket-shopping"></i></a> 
        
        <a class="nav-link" href="<?= addLink("utilisateur", "connexion")?>"><i class="fa-solid fa-circle-user" id="user-btn"></i></a>

        



    </div>
</section>
<?php if( $userConnecte = Service\Session::getUserConnected() ): ?>
<?php if( Service\Session::isadmin() ): ?>
 <nav class="nav__buttons">
         
    <ul>
            <div class="btn">
                <div class="dropdown">
                    <a class="nav-link " href="<?= addLink("telephone","index",null,"admin")?>">Gestion des Téléphones</a>
                    
    <!-- <button class="dropbtn">Gestion des Utilisateurs</button> -->
    <div class="dropdown-content">
        <a href="<?= addLink("utilisateur", "index", null, "admin") ?>">Voir Utilisateurs</a>
        <a href="<?= addLink("utilisateur", "create", null, "admin") ?>">Créer Utilisateur</a>
        <a href="<?= addLink("utilisateur", "reports", null, "admin") ?>">Rapports Utilisateur</a>
    </div>
</div>

                </li>
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
            <div class="btn">
                <li><a class="nav-link" href="<?= addLink("commentaire","index",null,"admin")?>">Gestion des Commandes</a></li>
            </div>
        <?php endif; ?>


        </div>
        <?php else:?>
            <div>
            <a class="nav-link" href="<?= addLink("utilisateur", "connexion")?>">connexion</a>
            <a class="nav-link" href="<?= addLink("utilisateur", "created")?>">inscription</a>
            </div>
            
        </ul>
    </nav>
    <?php endif;?>
    <div id="nombre"><?= $_SESSION["nombre"] ?? ''; ?></div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var dropdown = document.querySelector('.dropdown');
    var dropdownContent = document.querySelector('.dropdown-content');

    dropdown.addEventListener('mouseover', function () {
        dropdownContent.style.display = 'block';
    });

    dropdown.addEventListener('mouseout', function () {
        dropdownContent.style.display = 'none';
    });
});

</script>