<div class="formulaire">
    <div class="titre">
        <h3>UTILISATEURS</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <a href="/user/signup" class="ajouter_element_btn" >Ajouter un utilisateur +</a>
        <table>
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Role</th>
                <th scope="col">Date inscription</th>
                <th scope="col">Date modification</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            
            <?php foreach ($list_user as $user): 
                        if($user['login'] != $_SESSION["user"]["login"]) :
            ?>

                <tr>
                    <td scope="row" data-label="nom"><?php echo htmlspecialchars  ($user['login'])?></td>
                    <td data-label="email"><?php echo htmlspecialchars ($user['email']) ?></td>
                    <td data-label="status"><?php echo htmlspecialchars (STATUS[$user['status']])?></td>
                    <td data-label="role"><?php echo htmlspecialchars(ROLE[$user['id_groupuser']])?></td>
                    <td data-label="date_inscription"><?php echo htmlspecialchars($user['date_updated'])?></td>
                    <td data-label="date_modification"><?php echo htmlspecialchars($user['date_updated'])?></td>
                    <td data-label="Action" class="actions">
                        <a href=""><i class="action-button edit fa fa-pencil"></i></a>
                        <i class="action-button fa fa-trash delete">
                            <form action="user/delete" method="POST">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars ($user['id']); ?>">
                            </form>
                        </i>
                    </td>
                </tr>

            <?php 
                        endif;
                endforeach; 
            ?>

            </tbody>
        </table>
        
    </div>
</div>