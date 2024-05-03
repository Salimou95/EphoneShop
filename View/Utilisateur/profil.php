<main>

    <section>
            <div>
                <label for="">Nom</label>
                <input type="text" value="<?= htmlspecialchars($utilisateur->getNomUtilisateur())?>">
            </div>
            <div>
                <label for="">Prenom</label>
                <input type="text" value="<?= htmlspecialchars($utilisateur->getPrenomUtilisateur())?>">
            </div>
            <div>
                <label for="">Email</label>
                <input type="text" value="<?= htmlspecialchars($utilisateur->getEmailUtilisateur())?>">
            </div>
            <div>
                <label for="">Adresse Mail</label>
                <input type="text" value="<?= htmlspecialchars($utilisateur->getEmailUtilisateur())?>">
            </div>
    </section>

    <a class="nav-link" href="<?= addLink("utilisateur", "deconnexion") ?>">deconnexion</a>

</main>