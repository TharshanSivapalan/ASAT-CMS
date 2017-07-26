<div class="formulaire">
    <div class="titre">
        <h3>Modifier un article</h3>
    </div><!--.onglets-->
    
    <div class="onglet-contenu" >
        <form action="/article/update/<?php echo htmlspecialchars($article['id']) ?>" method="post">
            
                <h4>ARTICLE</h4>
                <br>

                <label>Titre de l'article</label>
                <input pattern="[a-zA-Z0-9\s]+" minlength="3" maxlength="255" required="required" type="text" class="input" name="titre" value="<?php echo htmlspecialchars($article['titre']) ?>">

                <label>Contenu du premier article</label>
                <br>
                <textarea required="required" class="input editor" name="content" id="description1" cols="70" rows="15">
                    <?php echo htmlspecialchars($article['content']) ?>
                </textarea>

                <input required="required" type="hidden" name="id" value="<?php echo htmlspecialchars($article['id']) ?>">

                <br><br>

            <button type="submit" class="bouton" id="bt1">Mettre à jour</button>
        </form>
    </div>
</div>