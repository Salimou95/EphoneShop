<?php require "View/errors_form.html.php";?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../Public/assets/css/style.css">
    <title>Document</title>
    </head>
    <body>
        <header>
            <div>
                <img style="height: 500px;" src="<?php UPLOAD_IMG . "Logo.png" ?>" alt="">
            </div>  
        </header>
        <main id="mainInscription">
            <section>
                <h1><?= $parametres["h1"]?></h1>
                <div class="sousligner"></div>
            </section>
            <section class="sectionForm">
                <div>
                    <form method="post">
                    <div>
                        <label for="emailUtilisateur" class="labeform">Email :</label>
                        <input type="email" name="email" class="inputform" placeholder="Inscrivez votre email" required>
                    </div>
                        <div>
                            <label for="mdpUtilisateur" class="labeform">Mot de passe :</label>
                            <input type="password" name="mdpUtilisateur" class="inputform" placeholder="Inscrivez votre mot de passe" required>
                        </div>
                        <div class="subconlinkbtn">
                        <input type="submit" name="connexion" value="Connexion">
                            <a href="<?= addLink("utilisateur", "inscription")?>">Inscrivez-vous ?</a>
                        </div>
                    </form>
                </div>
                <div>
                    <img style="height: 500px;" src="<?php UPLOAD_IMG. "formimng.png"?>" alt="">
                </div>
            </section>
        </main>
    </body>
</html>

