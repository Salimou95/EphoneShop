<main>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur){?>
                    <tr>
                        <td><?= htmlspecialchars($utilisateur->getNomUtilisateur())?></td>
                        <td><?= htmlspecialchars($utilisateur->getPrenomUtilisateur())?></td>
                        <td><?= htmlspecialchars($utilisateur->getEmailUtilisateur())?></td>
                        <td><?= htmlspecialchars($utilisateur->getTelephoneUtilisateur())?></td>
                        <td><?= htmlspecialchars($utilisateur->getRoleUtilisateur())?></td>
                        <td>
                            <a href="<?= addLinkAdmin("admin","marque","marque",$utilisateur->getId())?>">Voir +</a>
                            <a href="<?= addLinkAdmin("admin","udapteMarque",$utilisateur->getId())?>">Modifier</a>
                            <a href="<?= addLinkAdmin("admin","utilisateur","deleteUtilisateur",$utilisateur->getId())?>">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>