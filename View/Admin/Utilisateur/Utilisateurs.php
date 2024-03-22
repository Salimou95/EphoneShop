
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
                    <td><?= $utilisateur->getNomUtilisateur();?></td>
                    <td><?= $utilisateur->getPrenomUtilisateur();?></td>
                    <td><?= $utilisateur->getEmailUtilisateur();?></td>
                    <td><?= $utilisateur->getTelephoneUtilisateur();?></td>
                    <td><?= $utilisateur->getRoleUtilisateur();?></td>
                    <td>
                        <a href="<?= addLink("marque","marque",$utilisateur->getIdUtilisateur())?>">Voir +</a>
                        <a href="<?= addLink("marque","udapteMarque",$utilisateur->getIdUtilisateur())?>">Modifier</a>
                        <a href="<?= addLink("marque","delete",$utilisateur->getIdUtilisateur())?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>