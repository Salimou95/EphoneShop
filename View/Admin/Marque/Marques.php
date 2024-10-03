<main>
    <section>
        <h1><?=$h1?></h1>
        <div class="sousligner"></div>
    </section>
    <section>
        <a href="<?= addLink("marque","created",null,"admin")?>" class="btn btnToForm">+ Ajouter une marque</a>
    </section>
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
                            <a href="<?= addLink("marque","marque",$marque->getId(),"admin")?>"><i class="fa-solid fa-eye" style="color: #6142fe;"></i></a>
                            <a href="<?= addLink("marque","udapte",$marque->getId(),"admin")?>"><i class="fa-solid fa-pen" style="color: #6142fe;"></i></a>
                            <a href="<?= addLink("marque","delete",$marque->getId(),"admin")?>" class="lien"><i class="fa-solid fa-trash" style="color: #6142fe;"></i></a>
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