<?php require "View/errors_form.html.php";?>

<main>
    <section>
        <h1><?=$h1?></h1>
        <div class="sousligner"></div>
    </section>
    <section class="sectionForm">
        <article>
            <form method="post"  enctype="multipart/form-data" class="formAdmin">
            <label for="nomMarque" class="labeform">Nom Marque :</label>
            <input type="text" id="nomMarque" name="nomMarque" class="inputform" value="<?= $marque->getNomMarque() ?>"><br>
            
            <label for="image" class="labeform">Logo de la marque:</label>
            <input type="file" id="image" name="image" value="<?= $marque->getImage() ?>"><br>
            
            <input type="submit" value="Ajouter">
            </form>
        </article>
    </section>
</main>