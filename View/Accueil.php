
<main class="main">
    <h1><?=$h1?></h1>

    <section id="accueilsection">
        <?php
            foreach ($telephones as $telephone){
        ?>
        <article>
            <div>
                <h3 ><a class="linkInH3" href="<?= addLink("telephone","read",$telephone->getId())?>"><?= htmlspecialchars($telephone->getModele())?></a></h3>
                <img class="imgTelephones" src="<?=UPLOAD_IMG_TELEPHONE . htmlspecialchars($telephone->getImage()); ?>" alt="">
            </div>
            <div class="divArticle">
                <p class="paragrapheArticle"><?= htmlspecialchars($telephone->getPrix())?>&euro;</p>
                <button id="<?=$telephone->getId()?>" class="btnAddTelephone" <?= $telephone->getQuantite() == 0 ? "disabled" : ""?> ><i class="fa-solid fa-cart-plus" style="color: White;"></i></button>
            </div>
        </article>
        <?php }?>
    </section>
</main>
<?php var_dump($_SESSION);
?>
<script>
$(document).ready(function() {

    addToPanierAjax();
});
</script>