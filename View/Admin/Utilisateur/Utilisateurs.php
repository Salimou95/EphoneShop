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
                            <a href="<?= addLink("utilisateur","ReadOnly",$utilisateur->getId(),"admin")?>">Voir +</a>
                            <a href="<?= addLink("udapteMarque",$utilisateur->getId(),"admin")?>">Modifier</a>
                            <a href="<?= addLink("utilisateur","delete",$utilisateur->getId(),"admin")?>" onclick='afficherAlerte()'>Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>
<script>
    function afficherAlerte() {
        confirm("Voulez-vous vraiment supprimer cet utilisateur <?=$utilisateur->getId() ?>");
}
</script>