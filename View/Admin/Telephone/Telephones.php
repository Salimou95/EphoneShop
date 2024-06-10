<main>
<h1><?= $h1?></h1>

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
                        <?php foreach($marques as $marque){?>
                            <?php if($telephone->getFk_marque() == $marque->getId()){?>
                                <td><?= htmlspecialchars($marque->getNomMarque())?></td>
                            <?php }?>
                        <?php }?>     
                        <td><img class="imgTelephones" src="<?=UPLOAD_IMG_TELEPHONE. htmlspecialchars($telephone->getImage())?>" alt=""></td>
                        <td><?= htmlspecialchars($telephone->getQuantite())?></td>
                        <td>
                            <a href="<?= addLink("telephone","read",$telephone->getId())?>"><i class="fa-solid fa-eye" style="color: #6142fe;"></i></a>
                            <a href="<?= addLink("telephone","udapte",$telephone->getId(),"admin")?>"><i class="fa-solid fa-pen" style="color: #6142fe;"></i></a>
                            <a href="<?= addLink("telephone","delete",$telephone->getId(),"admin")?>"class="lien" ><i class="fa-solid fa-trash" style="color: #6142fe;"></i></a>
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