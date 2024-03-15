<?php
require "View/errors_form.html.php";


 ?>


        <main id="mainInscription">
            <section>
                <div>
                    <h1><?= $parametres["h1"]?></h1>
                    <div class="sousligner"></div>
                </div>
            </section>

            <section class="sectionForm">
                <div>
                    <form method="post">
                    <div>
                        <label for="sexeUtilisateur" class="labeform">Genre :</label>
                        <select name="sexeUtilisateur" class="inputform" required>
                            <option value="F">Mme</option>
                            <option value="M">Mr</option>
                        </select>
                        </div>
                        <div>
                            <label for="nomUtilisateur" class="labeform">Nom :</label>
                            <input type="text" name="nomUtilisateur" placeholder="Inscrivez votre nom" class="inputform"  required>
                        </div>
                        <div>
                            <label for="prenomUtilisateur" class="labeform">Prénom :</label>
                            <input type="text" placeholder="Inscrivez votre prenom" name="prenomUtilisateur" class="inputform" required>
                        </div>
                        <div>
                            <label for="emailUtilisateur" class="labeform">Email :</label>
                            <input type="email" name="emailUtilisateur" class="inputform" placeholder="Inscrivez votre email" required>
                        </div>
                        <div>
                            <label for="mdpUtilisateur" class="labeform">Mot de passe :</label>
                            <input type="password" name="mdpUtilisateur" class="inputform" placeholder="Inscrivez votre mot de passe" required>
                        </div>
                        <div>                            
                            <label for="dateNaissanceUtilisateur" class="labeform">Date de naissance :</label>
                            <input type="date" name="dateNaissanceUtilisateur" class="inputform" required>
                        </div>
                        <div>
                            <label for="telephoneUtilisateur" class="labeform">Telephone :</label>
                            <input type="number" name="telephoneUtilisateur" class="inputform" placeholder="Inscrivez votre téléphone" required>
                        </div>
                   
                        <div class="subconlinkbtn">
                            <input type="submit" value="S'inscrire">
                            <a href="<?= addLink("utilisateur", "connexion")?>">Se connecter</a>
                        </div>
                    </form>
                </div>
                <div>
                    <img style="height: 500px;" src="<?= UPLOAD_IMG . "formimg.png" ?>" alt="">
                </div>
            </section>

        </main>
    </body>
</html>




