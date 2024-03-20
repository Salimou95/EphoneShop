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
                    <td><?= $telephone->getModele();?></td>
                    <td><?= $telephone->getfk_Marque();?></td>
                    <td><img class="imgTelephones" src="<?=UPLOAD_IMG_TELEPHONE. $telephone->getImage();?>" alt=""></td>
                    <td><?= $telephone->getQuantite();?></td>
                    <td>
                        <a href="<?= addLink("telephone","telephone",$telephone->getIdTelephone())?>">Voir +</a>
                        <a href="<?= addLink("telephone","udapteTelephone",$telephone->getIdTelephone())?>">Modifier</a>
                        <a href="<?= addLink("telephone","delete",$telephone->getIdTelephone())?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>