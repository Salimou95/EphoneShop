<main>
    <section>
        <h1><?=$h1?></h1>
    </section>
    <section class="sectionFormComment">
            <div>
                <form method="post">
                    <!-- <input type="button" value="Ajouter au panier"> -->
                    <div>
                        <label for="Avis" class="labeform">Avis :</label>
                        <textarea name="avis" id="Avis" cols="50" rows="10" class="inputform"><?= htmlspecialchars($commentaire->getAvis())?></textarea>
                    </div>
                    <div>
                        <label for="Note" class="labeform">Note :</label>
                        <input type="number" name="Note" class="inputform" value="<?= $commentaire->getNote()?>" max="5">
                    </div>
                    <input type="submit" name="envoiecommentaire" value="Ajouter un commentaire">

                </form>
            </div>
    </section>
</main>