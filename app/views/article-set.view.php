<div class="formulaire">
    <div class="titre">
        <h3>MES ARTICLES</h3>
    </div><!--.onglets-->
    
    <div class="onglet-contenu" >
        <form class="" id="" action="action.php" method="post">

            <div class="explication-block">
                <span>*Les articles sont utilisés afin d'être affichés sur la home. Ils permettent ainsi de mettre en valeur votre restaurant. Seul 2 articles peuvent être affichés.</span>
            </div>

            <?php $i = 1; ?>

            <?php foreach ($list_article as $article): ?>


                <h4>ARTICLE <?php echo $i; ?></h4>
                <br>

                <label>Affiché l'article</label>
                <input type="checkbox" id="article<?php echo $i; ?>" value="article<?php echo $i; ?>"><br><br>

                <label>Titre de l'article</label>
                <input type="text" class="input" id="" name="" autocomplete="off" value="<?php echo htmlspecialchars($article['titre']) ?>">

                <label>Contenu du premier article</label>
                <br>
                <textarea class="input editor" name ="description1" id="description1" cols="70" rows="15">
                    <?php echo htmlspecialchars($article['content']) ?>
                </textarea>

                <br><br>

                <?php $i ++; ?>

            <?php endforeach; ?>

            <input type="submit" class="bouton" id="bt1" name ="envoyer1" value="Mettre à jour">
        </form>
    </div>
</div>