<main>
    <section>
        <?php foreach($commentaires as $comment){ ?>
            <article>
                <p><?= htmlspecialchars($comment->getAvis())?></p>
                <a href="<?= addLink("commentaire","delete",$comment->getId(),"admin")?>" class="lien">Supprimer</a>
            </article>
        <?php } ?>
    </section>
</main>




