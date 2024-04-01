<?php require "View/errors_form.html.php";?>

<main>
    <?php var_dump($commentaires) ?>
    <section>
        <h1><?= htmlspecialchars($telephone->getModele())?></h1>
    </section>
    <section id="sectionTelephoneUnique">
        <article>
            <img id="telephoneunique" src="<?=UPLOAD_IMG_TELEPHONE . htmlspecialchars($telephone->getImage()) ?>" alt="">
        </article>
        <article class="telephoneUniqueDescription">
        <div>
            <label for="" class="labelTelephoneUniqueTitle" >Systeme d'exploitation :</label>
            <label class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getSystemeexploitation())?></label>
        </div>
        <div>
            <label for="" class="labelTelephoneUniqueTitle" >Couleur :</label>
            <label class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getCouleur())?></label>
        </div>
        <div>
            <label for="" class="labelTelephoneUniqueTitle" >Ram :</label>
            <label class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getRam())?> Go</label>
        </div>
        <div>
            <label for="" class="labelTelephoneUniqueTitle" >Memoire :</label>
            <label class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getMemoire())?> Go</label>
        </div>
        <div>
            <label for="" class="labelTelephoneUniqueTitle" >Pays de Fabrication :</label>
            <label class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getPaysfabrication())?></label>
        </div>
        <div>
            <label for="" class="labelTelephoneUniqueTitle" >Description :</label>
            <label class="labelTelephoneUniqueData"><?= htmlspecialchars($telephone->getDescription())?></label>
        </div> 
        <div>
            <form method="post">
                <button type="submit" class="btnsubmit">Ajouter au panier</button>
            </form>
        </div>
    </article>
    </section>


    <section class="sectionFormComment">
        <div>
            <form method="post">
                <!-- <input type="button" value="Ajouter au panier"> -->
                <div>
                    <label for="" class="labeform">Avis :</label>
                    <textarea name="avis" id="" cols="50" rows="10" class="inputform"></textarea>
                </div>
                <div>
                    <label for="" class="labeform">Note :</label>
                    <input type="number" name="note" class="inputform">
                </div>
                <input type="submit" name="envoiecommentaire" value="Ajouter un commentaire">

            </form>
        </div>

        <div>
            <?php foreach($commentaires as $comment){ ?>
                <?php if( $userConnecte->getId() === $comment->getFk_Utilisateur()){ ?>
                    <a href="<?= addLink("commentaire","udapteCommentaire",$comment->getId())?>">Modifier</a>
                    <a href="<?= addLink("commentaire","deleteCommentaire",$comment->getId())?>">Supprimer</a>
                <?php } ?>

                <article>
                <?php for($i=0; $i<$comment->getNote(); $i++){ ?>
                    <i class="fa-solid fa-star" style="color: #6142fe;"></i>                <?php } 
                if($i<5){
                    for($i=$i; $i<5; $i++){?>
                    <i class="fa-regular fa-star" style="color: #6142fe;"></i>                    
                <?php 
                    }
                }
                ?><br>
                <label for=""><?= htmlspecialchars($comment->getUtilisateur()->getPrenomUtilisateur())." ". htmlspecialchars($comment->getUtilisateur()->getNomUtilisateur())?></label><br>
                <label for=""><?= htmlspecialchars($comment->getAvis())?></label><br>
                <label for=""><?= htmlspecialchars($comment->getNote())?></label><br>
                <label for=""><?= htmlspecialchars($comment->getCreated_at())?></label><br> 
                </article>
           <?php } ?>
        </div>
    </section>
</main>


