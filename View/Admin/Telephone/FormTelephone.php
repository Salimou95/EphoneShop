<?php require "View/errors_form.html.php";?>
<main>
<section>
        <h1><?=$h1?></h1>
        <div class="sousligner"></div>
    </section>

    <section class="sectionForm">
        <article>
            <form method="post" enctype="multipart/form-data" class="formAdmin">

                <label for="fk_marque" class="labeform">Marque:</label>
                <select name="fk_marque" id="fk_marque" class="inputform" required>
                <?php foreach($marques as $marque){?>
                    <option value="<?=$marque->getId()?>" <?=  $telephone->getFk_marque() == $marque->getId() ? "selected" : "" ?>><?= $marque->getNomMarque()?></option>
                <?php }?>     

                </select>
                
                

                <label for="prix" class="labeform">Prix:</label>
                <input type="number" id="prix" name="prix" class="inputform" value="<?= $telephone->getPrix()?>" required><br>

                <label for="modele" class="labeform">Modèle:</label>
                <input type="text" id="modele" name="modele" class="inputform" value="<?= $telephone->getModele()?>" required><br>

                <label for="couleur" class="labeform">Couleur:</label>
                <input type="text" id="couleur" name="couleur"  class="inputform" value="<?= $telephone->getCouleur()?>" required><br>

                <label for="systemeexploitation" class="labeform">Système d'exploitation:</label>
                <input type="text" id="systemeexploitation" name="systemeexploitation"  class="inputform" value="<?= $telephone->getSystemeexploitation()?>" required><br>

                <label for="ram" class="labeform">RAM:</label>
                <input type="text" id="ram" name="ram"  class="inputform" value="<?= $telephone->getRam()?>" required><br>

                <label for="memoire" class="labeform">Mémoire interne:</label>
                <input type="text" id="memoire" name="memoire"  class="inputform" value="<?= $telephone->getMemoire()?>" required><br>

                <label for="paysfabrication" class="labeform">Pays de fabrication:</label>
                <input type="text" id="paysfabrication" name="paysfabrication"  class="inputform" value="<?= $telephone->getPaysfabrication()?>" required><br>

                <label for="description" class="labeform">Description:</label>
                <textarea name="description" id="description"  class="inputform" required><?= $telephone->getDescription()?>"</textarea><br>

                <label for="quantite" class="labeform">Quantité:</label>
                <input type="number" id="quantite" name="quantite"  class="inputform" value="<?= $telephone->getQuantite()?>" required><br>
                        
                <label for="image" class="labeform <?= $mode == "modification" ? "none" : "" ?>">Image:</label>
                <input type="file" id="image" name="image" required class="<?= $mode == "modification" ? "none" : "" ?>" ><br>

                <input type="submit" value="<?= $mode == "suppression" ? "disabled" : "Ajouter" ?>" class="btnsubmit btncommentaire">
                

            </form>
        </article>
        <article class="articleimg">
            <img  src="<?= UPLOAD_IMG . "formimg.png" ?>" alt="">
        </article>       
    </section>
</main>


