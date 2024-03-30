<?php var_dump($_SESSION) ?>
<main>
    <h1><?= $h1?></h1>

    <section id="accueilsection">
        <?php
            foreach ($telephones as $telephone){
        ?>
        <div>
            <h3><?= htmlspecialchars($telephone->getModele())?></h3>
            <img class="imgTelephones" src="<?=UPLOAD_IMG_TELEPHONE . htmlspecialchars($telephone->getImage()); ?>" alt="">
            <p><?= htmlspecialchars($telephone->getPrix())?>&euro;</p>
            <button>Ajouter au panier</button>
            <a href="<?= addLink("telephone","telephone",$telephone->getId())?>">Voir +</a>
        </div>
        <?php }?>
    </section>
</main>
