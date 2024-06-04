
    <main class="main-container">
        <article class="panier-container">
            <?php if(isset($panier) && !empty($panier)){ ?>
                <?php foreach ($panier as $value): ?>
                    <article class="panier-item">
                        <article class="modele"><?= htmlspecialchars($value["telephone"]->getModele()) ?></article>
                        <article class="prix"><?= htmlspecialchars($value["telephone"]->getPrix()) ?> €</article>
                        <article class="quantite">Quantité: <?= htmlspecialchars($value["quantite"]) ?></article>
                    </article>
                    <?php endforeach; ?>
                <article class="total">Total: <?= htmlspecialchars($value["telephone"]->getPrix() * $value["quantite"]) ?> €</article>
                <a href="<?=  addLink("Commande", "created") ?>"></a>
            </article>
            <?php }else{ ?>
                <p>le panier est vide </p>
           <?php } ?>
    </main>

