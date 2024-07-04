
<main class="main">
    <section>
        <h1><?=$h1?></h1>
        <div class="sousligner"></div>
    </section>


    <section id="accueilsection">
        <?php
            foreach ($telephones as $telephone){
        ?>
        <article>
            <div>
                <h3 ><a class="linkInH3" href="<?= addLink("telephone","read",$telephone->getId())?>"><?= htmlspecialchars($telephone->getModele())?></a></h3>
                <img class="imgTelephoneIndex" src="<?=UPLOAD_IMG_TELEPHONE . htmlspecialchars($telephone->getImage()); ?>" alt="">
            </div>
            <div class="divArticle">
                <p class="paragrapheArticle"><?= htmlspecialchars($telephone->getPrix())?>&euro;</p>
                <?php if ($telephone->getQuantite() == 0): ?>
                    <p>Rupture de Stock</p>
                    <?php else:?>
                        <button id="<?=$telephone->getId()?>" class="btnAddTelephone" ><i class="fa-solid fa-cart-plus" style="color: White;"></i></button>
                <?php endif?>
            </div>
        </article>
        <?php }?>
    </section>
</main>
<script>
$(document).ready(function() {

    addToPanierAjax();
});
</script>
