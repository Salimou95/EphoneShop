
<main class="main-container">
    <section>
        <h1><?= $h1?></h1>
        <div class="sousligner"></div>
    </section>
    <section>
        <article class="panier-container">
            <?php if(isset($panier) && !empty($panier)){ 
            ?>
                <?php foreach ($panier as $value): ?>
                    <article class="panier-item">
                        <article class="modele"><?= htmlspecialchars($value["telephone"]->getModele()) ?></article>
                        <article class="prix"><?= htmlspecialchars($value["telephone"]->getPrix()) ?> €</article>
                        <article class="quantite">Quantité: <?= htmlspecialchars($value["quantite"]) ?></article>
                    </article>
                    <?php endforeach; ?>
                <article class="total">Total: <?= $_SESSION["prixTotal"] ?> €</article>
                <a class="btn btnCommande" href="<?= addLink("Commande", "Created") ?>">Commander</a>

            </article>
            <?php }else{ ?>
                <p>le panier est vide </p>
           <?php } ?>
    </section> 
</main>

