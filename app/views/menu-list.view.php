<div class="formulaire">
    <div class="titre">
        <h3>NOS MENUS</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <a href="/menu/add" class="ajouter_element_btn" >Ajouter un menu +</a>
        <table>
            <thead>
            <tr>
                <th scope="col">nom</th>
                <th scope="col">entree</th>
                <th scope="col">plat</th>
                <th scope="col">dessert</th>
                <th scope="col">prix</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
            
            <?php foreach ($list_menu as $menu): ?>
                <tr>
                    <td data-label="nom"><?php echo htmlspecialchars ($menu['nom']); ?></td>
                    <td data-label="entree"><?php echo htmlspecialchars ($menu['entree']); ?></td>
                    <td data-label="plat"><?php echo htmlspecialchars ($menu['plat']); ?></td>
                    <td data-label="dessert"><?php echo htmlspecialchars ($menu['dessert']); ?></td>
                    <td data-label="prix"><?php echo htmlspecialchars ($menu['prix']); ?> &euro; </td>
                    <td data-label="action" class="actions">
                   
                        <form action="menu/update" id="updateMenu" method="POST">
                            <input type="hidden" name="id" value="<?php echo intval($menu['id']); ?>">

                            <button type="submit" class="action-button edit  update">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </form>

                        <i class="action-button fa fa-trash delete">
                            <form action="menu/delete" method="POST">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars ($menu['id']); ?>">
                            </form>
                        </i>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>


    </div>
</div>