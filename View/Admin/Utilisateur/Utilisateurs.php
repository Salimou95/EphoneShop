<main class="main">
    <section>
        <div>

        </div>
        <h1><?= $h1?></h1>
        <div class="sousligner"></div>

        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th class="noneLineTable">Email</th>
                    <th>Telephone</th>
                    <th class="noneLineTable">Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur){?>
                    <tr>
                        <td><?= htmlspecialchars($utilisateur->getNomUtilisateur())?></td>
                        <td><?= htmlspecialchars($utilisateur->getPrenomUtilisateur())?></td>
                        <td class="noneLineTable"><?= htmlspecialchars($utilisateur->getEmailUtilisateur())?></td>
                        <td>0<?= htmlspecialchars($utilisateur->getTelephoneUtilisateur())?></td>
                        <td class="noneLineTable"><?= htmlspecialchars($utilisateur->getRoleUtilisateur())?></td>
                        <td>
                            <a href="<?= addLink("utilisateur","udapte",$utilisateur->getId(),"admin")?>"><i class="fa-solid fa-eye" style="color: #6142fe;"></i></a>
                            <a href="<?= addLink("utilisateur","delete",$utilisateur->getId(),"admin")?>" class="lien"><i class="fa-solid fa-trash" style="color: #6142fe;"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>
<script>
cofirmDelete()
</script>