<div class="formulaire">
    <div class="titre">
        <h3>NOS REPAS</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <a href="/repas/add" class="ajouter_element_btn" >Ajouter un repas +</a>
        <table>
            <thead>
            <tr>
                <th scope="col">titre</th>
                <th scope="col">categorie</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>


            <?php foreach ($list_repas as $repas): ?>

                <tr>
                    <td data-label="date"><?php echo htmlspecialchars ($repas['nom']) ?></td>
                    <td data-label="Catégorie"><?php echo REPAS_CATEGORIES[$repas['category']] ?></td>
                    <td data-label="Action" class="actions">
                        <form action="repas/update" id="updateMenu" method="POST">
                            <input type="hidden" name="id" value="<?php echo intval($repas['id']); ?>">

                            <button type="submit" class="action-button edit  update">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </form>

                        <a href="repas/delete/<?php echo htmlspecialchars ($repas['id']); ?>" class="confirmation"><i class="action-button fa fa-trash delete"></i>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>