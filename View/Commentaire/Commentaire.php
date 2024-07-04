<main>
    <section>
        <h1><?=$h1?></h1>
        <div class="sousligner"></div>
    </section>
    <section class="sectionForm udpateCommentaireForm">
        <article>
            <form method="post">
                <article>
                    <label for="avis" class="labeform">Avis :</label>
                    <textarea name="avis" id="avis" cols="50" rows="10" class="inputform"><?= htmlspecialchars($commentaire->getAvis())?></textarea>
                </article>
                <article>
                    <label for="note" class="labeform">Note :</label>
                    <input type="number" name="note" id="note" class="inputform" value="<?= $commentaire->getNote()?>" max="5">
                </article>
                    <input type="submit" name="envoiecommentaire" value="Ajouter un commentaire" class="btnsubmit">
            </form>
            </article>
        <article >
            <img src="<?= UPLOAD_IMG . "formimg.png" ?>" alt="">
        </article>
    </section>
</main>