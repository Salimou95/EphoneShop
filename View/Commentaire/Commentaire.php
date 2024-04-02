<main>
    <section>
        <h1><?=$h1?></h1>
    </section>
    <section class="sectionFormComment">
            <article>
                <form method="post">
                    <!-- <input type="button" value="Ajouter au panier"> -->
                    <article>
                        <label for="avis" class="labeform">Avis :</label>
                        <textarea name="avis" id="avis" cols="50" rows="10" class="inputform"><?= htmlspecialchars($commentaire->getAvis())?></textarea>
                    </article>
                    <article>
                        <label for="note" class="labeform">Note :</label>
                        <input type="number" name="note" id="note" class="inputform" value="<?= $commentaire->getNote()?>" max="5">
                    </article>
                    <input type="submit" name="envoiecommentaire" value="Ajouter un commentaire">
                </form>
            </article>
    </section>
</main>