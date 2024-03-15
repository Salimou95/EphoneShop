<?php var_dump($_SESSION) ?>
<main>
    <h1><?= $parametres["h1"]?></h1>

    <section class="accueilsection">
        <?php
            foreach ($telephones as $telephone){
        ?>
        <div>
            <h3><?= $telephone->getModele();?></h3>
            <img class="imgTelephones" src="<?=UPLOAD_IMG_TELEPHONE . $telephone->getImage(); ?>" alt="">
            <p><?= $telephone->getPrix();?>&euro;</p>
            <button>Ajouter au panier</button>
            <a href="<?= addLink("telephone","telephone",$telephone->getIdTelephone())?>">Voir +</a>
        </div>
        <?php }?>
    </section>
</main>
