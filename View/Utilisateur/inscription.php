<?php require "View/errors_form.html.php";?>
<main id="mainInscription">
    <section>
        <div>
            <h1><?= $h1?></h1>
            <div class="sousligner"></div>
        </div>
    </section>
    <section class="sectionForm">
        <article>
            <form method="post">

            <label for="sexeUtilisateur" class="labeform">Genre :</label>
                <select name="sexeUtilisateur" id="sexeUtilisateur" class="inputform" <?= $mode == "suppression" ? "disabled" : "" ?>>
                    <option value="F" <?= ($utilisateur->getSexeUtilisateur() === 'F') ? 'selected' : ''; ?>>Mme</option>
                    <option value="M" <?= ($utilisateur->getSexeUtilisateur() === 'M') ? 'selected' : ''; ?>>Mr</option>
                </select>

                <label for="nomUtilisateur" class="labeform">Nom :</label>
                <input type="text" name="nomUtilisateur" id="nomUtilisateur" placeholder="Inscrivez votre nom" class="inputform" value="<?= htmlspecialchars($utilisateur->getNomUtilisateur()) ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>

                <label for="prenomUtilisateur" class="labeform">Prénom :</label>
                <input type="text" placeholder="Inscrivez votre prenom" name="prenomUtilisateur" id="prenomUtilisateur" class="inputform" value="<?= htmlspecialchars($utilisateur->getprenomUtilisateur())?>" <?= $mode == "suppression" ? "disabled" : "" ?>>

                <label for="emailUtilisateur" class="labeform">Email :</label>
                <input type="email" name="emailUtilisateur" id="emailUtilisateur" class="inputform" placeholder="Inscrivez votre email" value="<?= htmlspecialchars($utilisateur->getEmailUtilisateur())?>" <?= $mode == "suppression" ? "disabled" : "" ?>>

                <label for="mdpUtilisateur" class="labeform <?= $mode !== "insertion" ? "none" : "" ?>">Mot de passe :</label>
                <input type="password" name="mdpUtilisateur" id="mdpUtilisateur" class="inputform <?= $mode !== "insertion" ? "none" : "" ?>" placeholder="Inscrivez votre mot de passe" >

                <label for="dateNaissanceUtilisateur" class="labeform">Date de naissance :</label>
                <input type="date" name="dateNaissanceUtilisateur" id="dateNaissanceUtilisateur" class="inputform"<?= $mode == "suppression" ? "disabled" : "" ?> value="<?= htmlspecialchars($utilisateur->getDateNaissanceUtilisateur())?>">

                <label for="telephoneUtilisateur" class="labeform">Telephone :</label>
                <input type="number" name="telephoneUtilisateur" id="telephoneUtilisateur" class="inputform" placeholder="Inscrivez votre téléphone" value="<?= htmlspecialchars($utilisateur->getTelephoneUtilisateur()) ?>" <?= $mode == "suppression" ? "disabled" : "" ?>>

                <input type="text" value="ROLE_USER" name="roleUtilisateur">
                <article class="subconlinkbtn">
                    <input type="submit" value="<?= $mode == "suppression" ? "Supprimer" : ($mode == "modification" ? "Modifier" : "S'incrire") ?>">
                    <a href="<?= addLink("utilisateur", "connexion")?>" 
                    <?= $mode !== "insertion" ? "class='none'" : "" ?> >Se connecter</a>
                    <a href="<?= addLink("utilisateur", "deleteUtilisateur",$utilisateur->getid())?>" 
                    <?= $mode !== "modification" ? "class='none'" : "" ?> >X SUPPRIMER SON COMPTE</a>
                </article>
            </form>
        </article>
        <article>
            <img style="height: 500px;" src="<?= UPLOAD_IMG . "formimg.png" ?>" alt="">
        </article>
    </section>

</main>




