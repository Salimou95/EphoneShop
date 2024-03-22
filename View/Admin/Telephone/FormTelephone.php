<?php $mode = $mode ?? "insertion";?>
<?php require "View/errors_form.html.php";?>


    <main>
        <h1>Ajouter un Téléphone</h1>
        <section class="sectionInscription">
            <div>
                <form method="post" enctype="multipart/form-data" class="form">

                <label for="prix" class="labeform">Marque:</label>
                <select name="fk_marque" id="" class="inputform">
                <?php foreach($marques as $marque){?>
                    <option value="<?=$marque->getIdMarque()?>"><?= $marque->getNomMarque()?></option>
            <?php }?>    
                
                </select>

                <label for="prix" class="labeform">Prix:</label>
                <input type="number" name="prix" class="inputform" required><br>

                <label for="modele" class="labeform">Modèle:</label>
                <input type="text" name="modele" class="inputform" value="<?= $telephone->getModele()?>" required><br>

                <label for="couleur" class="labeform">Couleur:</label>
                <input type="text" name="couleur"  class="inputform"required><br>

                <label for="systemeexploitation" class="labeform">Système d'exploitation:</label>
                <input type="text" name="systemeexploitation"  class="inputform"required><br>

                <label for="ram" class="labeform">RAM:</label>
                <input type="text" name="ram"  class="inputform" required><br>

                <label for="memoire" class="labeform">Mémoire interne:</label>
                <input type="text" name="memoire"  class="inputform" required><br>

                <label for="paysfabrication" class="labeform">Pays de fabrication:</label>
                <input type="text" name="paysfabrication"  class="inputform" required><br>

                <label for="description" class="labeform">Description:</label>
                <textarea name="description"  class="inputform" required></textarea><br>

                <label for="quantite" class="labeform">Quantité:</label>
                <input type="number" name="quantite"  class="inputform" required><br>
                    
                <label for="image" class="labeform">Image:</label>
                <input type="file" name="image" required><br>


                
                <input type="submit" value="<?= $mode == "suppression" ? "disabled" : "Ajouter" ?>">
                

            </form>
            </div>
            <div>
            <img style="height: 500px;" src="<?= UPLOAD_IMG . "formimg.png" ?>" alt="">
            </div>
            
        </section>
    </main>


