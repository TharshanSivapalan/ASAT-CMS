<div class="formulaire">
    <div class="titre">
        <h3>UTILISATEURS</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <a href="/user/add" class="ajouter_element_btn" >Ajouter un utilisateur +</a>
        <table>
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Date inscription</th>
                <th scope="col">Date modification</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            
            <?php foreach ($list_user as $user): ?>

                <tr>
                    <td scope="row" data-label="nom"><?php echo $user['login']?></td>
                    <td data-label="Email"><?php echo $user['email']?></td>
                    <td data-label="Statut"><?php echo $user['id_groupuser']?></td>
                    <td data-label="Statut"><?php echo $user['date_inserted']?></td>
                    <td data-label="Statut"><?php echo $user['date_updated']?></td>
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