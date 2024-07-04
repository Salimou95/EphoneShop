<main>

    <section>
        <article>
            <label for="">Nom:</label>
            <label><?= htmlspecialchars($utilisateur->getNomUtilisateur()) ?></label>
        </article>
        <article>
            <label for="">Prenom:</label>
            <label><?= htmlspecialchars($utilisateur->getPrenomUtilisateur()) ?></label>
        </article>
        <article>
            <label for="">Email:</label>
            <label><?= htmlspecialchars($utilisateur->getEmailUtilisateur()) ?></label>
        </article>
        <article>
            <label for="">Adresse Mail:</label>
            <label><?= htmlspecialchars($utilisateur->getEmailUtilisateur()) ?></label>
        </article>
    </section>

    <a class="btn logoutlink" href="<?= addLink("utilisateur", "deconnexion") ?>">deconnexion</a>

</main>
