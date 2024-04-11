<main>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Marque</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marques as $marque){?>
                    <tr>
                        <td><?= htmlspecialchars($marque->getNomMarque())?></td>
                        <td><img class="imgTelephones" src="<?=UPLOAD_IMG_MARQUE.htmlspecialchars($marque->getLogoMarque());?>" alt=""></td>
                        <td>
                            <a href="<?= addLinkAdmin("admin","marque","marque",$marque->getId())?>">Voir +</a>
                            <a href="<?= addLinkAdmin("admin","marque","udapte",$marque->getId())?>">Modifier</a>
                            <a href="<?= addLinkAdmin("admin","marque","delete",$marque->getId())?>">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>