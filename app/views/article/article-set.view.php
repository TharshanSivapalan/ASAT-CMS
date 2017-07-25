<div class="formulaire">
    <div class="titre">
        <h3>Modifier un article</h3>
    </div><!--.onglets-->
    
    <div class="onglet-contenu" >
        <form action="/article/update/<?php echo htmlspecialchars($article['id']) ?>" method="post">
            
                <h4>ARTICLE</h4>
                <br>

                <label>Titre de l'article</label>
                <input type="text" class="input" id="" name="titre" autocomplete="off" value="<?php echo htmlspecialchars($article['titre']) ?>">

                <label>Contenu du premier article</label>
                <br>
                <textarea class="input editor" name="content" id="description1" cols="70" rows="15">
                    <?php echo htmlspecialchars($article['content']) ?>
                </textarea>

                <input type="hidden" name="id" value="<?php echo htmlspecialchars($article['id']) ?>">

                <br><br>

            <button type="submit" class="bouton" id="bt1">Mettre à jour</button>
        </form>
    </div>
</div>