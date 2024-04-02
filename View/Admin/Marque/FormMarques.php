<?php require "View/errors_form.html.php";?>

<main>
    <section>
        <div>
            <h1><?=$h1?></h1>
        </div>
        <div>
            <form method="post"  enctype="multipart/form-data" class="form">
            <label for="nomMarque" class="labeform">Nom Marque :</label>
            <input type="text" id="nomMarque" name="nomMarque" class="inputform" required><br>
            
            <label for="image" class="labeform">Logo de la marque:</label>
            <input type="file" id="image" name="image" required><br>
            
            <input type="submit" value="Ajouter">
            </form>
        </div>
    </section>
</main>