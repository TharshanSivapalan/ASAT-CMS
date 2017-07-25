<div class="formulaire">
    <div class="titre">
        <h3>Articles</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <table>
            <thead>
            <tr>
                <th scope="col">titre</th>
            </tr>
            </thead>
            <tbody>

            <div class="explication-block">
                <span>*Les articles sont utilisés afin d'être affichés sur la home. Ils permettent ainsi de mettre en valeur votre restaurant. Seul 2 articles peuvent être affichés.</span>
            </div>

            <?php foreach ($list_article as $article): ?>
                <tr>
                    <td data-label="titre"><?php echo htmlspecialchars ($article['titre']); ?></td>
                    <td data-label="action" class="actions">
                        <a href="article/update/<?php echo htmlspecialchars ($article['id']); ?>"><i class="fa fa-pencil edit update"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>


    </div>
</div>