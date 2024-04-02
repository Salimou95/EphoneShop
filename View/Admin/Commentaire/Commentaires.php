<main>
    <section>
        <?php foreach($commentaires as $comment){ ?>
            <article>
                <p><?= htmlspecialchars($comment->getAvis())?></p>
                <a href="<?= addLinkAdmin("admin","commentaire","deleteCommentaire",$comment->getId())?>">Supprimer</a>
            </article>
        <?php } ?>
    </section>
</main>




