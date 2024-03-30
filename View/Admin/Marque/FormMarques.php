<?php $mode = $mode ?? "insertion";?>
<?php require "View/errors_form.html.php";?>

<main>
    <section>
        <div>
            <h1><?= $h1?></h1>
        </div>
        <div>
            <form method="post"  enctype="multipart/form-data" class="form">
            <label for="" class="labeform">Nom Marque :</label>
            <input type="text" name="nomMarque" class="inputform" required><br>
            
            <label for="" class="labeform">Logo de la marque:</label>
            <input type="file" name="image" required><br>
            
            <input type="submit" value="Ajouter">
            </form>
        </div>
    </section>
</main>