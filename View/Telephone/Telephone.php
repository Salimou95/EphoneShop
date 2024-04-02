<?php require "View/errors_form.html.php";?>

<main>
    <section>
        <h1><?= htmlspecialchars($telephone->getModele())?></h1>
    </section>
    <section id="sectionTelephoneUnique">
        <div>
            <article>
                <img id="telephoneunique" src="<?=UPLOAD_IMG_TELEPHONE . htmlspecialchars($telephone->getImage()) ?>" alt="">
            </article>
        </div>

        <div class="telephoneUniqueDescription">
            <article>
                <label for="paragrapheSystemeexploitation" class="labelTelephoneUniqueTitle" >Systeme d'exploitation :</label>
                <p id="paragrapheSystemeexploitation" class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getSystemeexploitation())?></p>
            </article>
            <article>
                <label for="paragrapheCouleur" class="labelTelephoneUniqueTitle" >Couleur :</label>
                <p id="paragrapheCouleur" class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getCouleur())?></p>
            </article>
            <article>
                <label for="paragrapheRam" class="labelTelephoneUniqueTitle" >Ram :</label>
                <p id="paragrapheRam" class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getRam())?> Go</p>
            </article>
            <article>
                <label for="paragrapheMemoire" class="labelTelephoneUniqueTitle" >Memoire :</label>
                <p id="paragrapheMemoire" class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getMemoire())?> Go</p>
            </article>
            <article>
                <label for="paragraphePaysfabrication" class="labelTelephoneUniqueTitle" >Pays de Fabrication :</label>
                <p id="paragraphePaysfabrication" class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getPaysfabrication())?></p>
            </article>
            <article>
                <label for="paragrapheDescription" class="labelTelephoneUniqueTitle" >Description :</label>
                <p id="paragrapheDescription" class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getDescription())?></p>
            </article> 
            <article>
                <form method="post">
                    <button type="submit" class="btnsubmit">Ajouter au panier</button>
                </form>
            </article>
        </div>
    </section>


    <section class="sectionFormComment">
        <div>
            <form method="post">
                <!-- <input type="button" value="Ajouter au panier"> -->
                <article>
                    <label for="avis" class="labeform">Avis :</label>
                    <textarea name="avis" id="avis" cols="50" rows="10" class="inputform"></textarea>
                </article>
                <article>
                    <label for="note" class="labeform">Note :</label>
                    <input type="number" name="note" class="inputform">
                </article>
                <input type="submit" name="envoiecommentaire" value="Ajouter un commentaire">

            </form>
        </div>

        <div>
            
            <article>
                    <?php foreach($commentaires as $comment){ ?>
                        <?php if( $userConnecte->getId() === $comment->getFk_Utilisateur()){ ?>
                            <a href="<?= addLink("commentaire","udapteCommentaire",$comment->getId())?>">Modifier</a>
                            <a href="<?= addLink("commentaire","deleteCommentaire",$comment->getId())?>">Supprimer</a><br>
                        <?php } ?>
                    <?php for($i=0; $i<$comment->getNote(); $i++){ ?>
                        <i class="fa-solid fa-star" style="color: #6142fe;"></i><?php } 
                    if($i<5){
                        for($i=$i; $i<5; $i++){?>
                        <i class="fa-regular fa-star" style="color: #6142fe;"></i>                    
                    <?php 
                        }
                    }
                    ?><br>
                    <p><?= htmlspecialchars($comment->getUtilisateur()->getPrenomUtilisateur())." ". htmlspecialchars($comment->getUtilisateur()->getNomUtilisateur())?></p><br>
                    <p><?= htmlspecialchars($comment->getAvis())?></p><br>
                    <p><?= htmlspecialchars($comment->getNote())?></p><br>
                    <p><?= htmlspecialchars($comment->getCreated_at())?></p><br> 
                </article>
           <?php } ?>
        </div>
    </section>
</main>


