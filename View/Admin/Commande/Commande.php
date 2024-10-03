<main>
    <section>
        <h1><?= $h1?></h1>
        <div class="sousligner"></div>
    </section>

    <section>
        <table>
            <thead>
                <tr>
                    <th>Numero de commande</th>
                    <th class="noneLineTable">Prix de la commande</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande){?>
                    <tr>
                        <td><?= htmlspecialchars($commande->getid())?></td>
                        <td class="noneLineTable"><?= htmlspecialchars($commande->getPrix())?></td>
                        <td><?= htmlspecialchars($commande->getStatut())?></td>
                        <td>
                            <a href="<?= addLink("telephone","read",$commande->getId())?>"><i class="fa-solid fa-eye" style="color: #6142fe;"></i></a>
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