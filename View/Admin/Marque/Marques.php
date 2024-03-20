
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
                    <td><?= $marque->getNomMarque();?></td>
                    <td><img class="imgTelephones" src="<?=UPLOAD_IMG_MARQUE. $marque->getLogoMarque();?>" alt=""></td>
                    <td>
                        <a href="<?= addLink("marque","marque",$marque->getIdMarque())?>">Voir +</a>
                        <a href="<?= addLink("marque","udapteMarque",$marque->getIdMarque())?>">Modifier</a>
                        <a href="<?= addLink("marque","delete",$marque->getIdMarque())?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>