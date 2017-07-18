<div class="formulaire">
    <div class="titre">
        <h3>NOS MENUS</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <a href="/menu/add" class="ajouter_element_btn" >Ajouter un menu +</a>
        <table>
            <thead>
            <tr>
                <th scope="col">titre</th>
                <th scope="col">date</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
            
            <?php foreach ($list_menu as $menu): ?>
                <tr>
                    <td data-label="date"><?php echo htmlspecialchars ($menu['nom']); ?></td>
                    <td data-label="Titre">04/01/2017</td>
                    <td data-label="Action">
                        <i class="action-button edit fa fa-pencil"></i>
                        <i class="action-button delete fa fa-trash"></i>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>


    </div>
</div>