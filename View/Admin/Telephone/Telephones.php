<main>
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
                            <a href="<?= addLink("telephone","read",$telephone->getId())?>">Voir +</a>
                            <a href="<?= addLink("telephone","udapte",$telephone->getId(),"admin")?>">Modifier</a>
                            <a href="<?= addLink("telephone","delete",$telephone->getId(),"admin")?>"class="lien" >Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>