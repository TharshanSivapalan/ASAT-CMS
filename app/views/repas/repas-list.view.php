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
                        <a href="repas/update/<?php echo htmlspecialchars ($repas['id']); ?>"><i class="action-button fa fa-pencil faa-float animated-hover edit"></i>
                        <a href="repas/delete/<?php echo htmlspecialchars ($repas['id']); ?>" class="confirmation"><i class="action-button fa fa-trash faa-float animated-hover delete"></i>
                    </td>
                </tr>

            <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</div>