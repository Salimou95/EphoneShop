<?php require "View/errors_form.html.php";?>

<main id="mainInscriptionConnexion">
    <section>
        <h1><?= $h1?></h1>
        <div class="sousligner"></div>
    </section>
    <section class="sectionForm">
        <article>
            <form method="post">
            <article>
                <label for="emailUtilisateur" class="labeform">Email :</label>
                <input type="email" name="email" class="inputform" placeholder="Inscrivez votre email">
            </article>
                <article>
                    <label for="mdpUtilisateur" class="labeform">Mot de passe :</label>
                    <input type="password" name="mdpUtilisateur" class="inputform" placeholder="Inscrivez votre mot de passe">
                </article>
                <article class="subconlinkbtn">
                    <input type="submit" name="connexion" value="Connexion">
                    <a href="<?= addLink("utilisateur", "created")?>">Inscrivez-vous ?</a>
                </article>
            </form>
        </article>
        <article>
            <img style="height: 500px;" src="<?= UPLOAD_IMG. "formimg.png"?>" alt="">
        </article>
    </section>
</main>


