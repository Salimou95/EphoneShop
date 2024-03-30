<main>

    <section>
            <div>
                <label for="">Nom</label>
                <input type="text" value="<?= htmlspecialchars($user->getNomUtilisateur())?>">
            </div>
            <div>
                <label for="">Prenom</label>
                <input type="text" value="<?= htmlspecialchars($user->getPrenomUtilisateur())?>">
            </div>
            <div>
                <label for="">Email</label>
                <input type="text" value="<?= htmlspecialchars($user->getEmailUtilisateur())?>">
            </div>
            <div>
                <label for="">Adresse Mail</label>
                <input type="text" value="<?= htmlspecialchars($user->getEmailUtilisateur())?>">
            </div>

    </section>
</main>