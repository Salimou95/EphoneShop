<section>
    <table>
        <thead>
            <tr>
                <th>Modele</th>
                <th>Marque</th>
                <th>Photo</th>
                <th>Quantite</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($telephones as $telephone){?>
                <tr>
                    <td><?= htmlspecialchars($telephone->getModele())?></td>
                    <td><?= htmlspecialchars($telephone->getfk_Marque())?></td>
                    <td><img class="imgTelephones" src="<?=UPLOAD_IMG_TELEPHONE. htmlspecialchars($telephone->getImage())?>" alt=""></td>
                    <td><?= htmlspecialchars($telephone->getQuantite())?></td>
                    <td>
                        <a href="<?= addLinkAdmin("admin","telephone","telephone",$telephone->getId())?>">Voir +</a>
                        <a href="<?= addLinkAdmin("admin","telephone","udapteTelephone",$telephone->getId())?>">Modifier</a>
                        <a href="<?= addLinkAdmin("admin","telephone","deleteTelephone",$telephone->getId())?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>