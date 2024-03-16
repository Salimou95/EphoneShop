<?php require "View/errors_form.html.php";?>

<main>
    <?php var_dump($commentaire) ?>
    <section>
        <h1><?= $telephone->getModele();?></h1>
    </section>
    <section>
        <div>
            <img src="<?=UPLOAD_IMG_TELEPHONE . $telephone->getImage(); ?>" alt="">
        </div>
        <div>
            <label for="">Systeme d'exploitation :</label>
            <label><?= $telephone->getSystemeexploitation();?></label>
        </div>
        <div>
            <label for="">Couleur :</label>
            <label><?= $telephone->getCouleur();?></label>
        </div>
        <div>
            <label for="">Ram :</label>
            <label><?= $telephone->getRam();?> Go</label>
        </div>
        <div>
            <label for="">Memoire :</label>
            <label><?= $telephone->getMemoire();?> Go</label>
        </div>
        <div>
            <label for="">Pays de Fabrication :</label>
            <label><?= $telephone->getPaysfabrication();?></label>
        </div>
        <div>
            <label for="">Description :</label>
            <label><?= $telephone->getDescription();?></label>
        </div> 
        
        <div>
            <form method="post">
                <input type="button" value="Ajouter au panier">
            </form>
        </div>
    </section>


    <section>
        <div>
            <form method="post">
                <!-- <input type="button" value="Ajouter au panier"> -->
                <input type="text" name="commentaire">
                <input type="number" name="note">
                <input type="submit" name="envoiecommentaire" value="Ajouter un commentaire">

            </form>
        </div>
    </section>
</main>


