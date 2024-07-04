<?php require "View/errors_form.html.php";?>
<main>
    <section>
        <h1><?=$h1?></h1>
        <div class="sousligner"></div>
    </section>
    <section class="sectionForm">
        <article>
            <form method="post"class="form">
                                

                <label for="adresse" class="labeform">Adresse:</label>
                <input type="text" id="adresse" name="adresse" class="inputform" required>

                <label for="prix" class="labeform">Prix:</label>
                <input type="number" id="prix" name="prix" class="inputform" value="<?=$_SESSION["prixTotal"]?>" required readOnly>

                <input type="submit" value="Passer la commande" class="btnsubmit">
                

            </form>
        </article>
        <article>
            <img src="<?= UPLOAD_IMG . "formimg.png" ?>" alt="">
        </article>       
    </section>
</main>


