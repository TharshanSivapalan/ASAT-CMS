<div class="formulaire">
    <div class="titre">
        <h3>MODIFIER LE REPAS</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <a href="/repas" class="back-button"><i class="fa fa-arrow-left faa-horizontal animated-hover back-button-arrow" aria-hidden="true"> <span class="back-button-text">Retour</span></i></a>
        <form action="/repas/update/<?php echo $repas[0]["id"] ?>" method="post" name="updateForm">

            <label>Titre du menu</label>
            <input pattern="[a-zA-Z0-9\s]+" minlength="3" maxlength="255" type="text" class="input" name="nom" value="<?php echo htmlspecialchars($repas[0]["nom"]);?>" required="required">

            <label>Type</label>
            <br>
            <select name="category" class="input" required="required">
                <option value="" >...</option>
                <option value="1" <?php if($repas[0]["category"] == 1) echo 'selected="selected";'?> >Entrée</option>
                <option value="2" <?php if($repas[0]["category"] == 2) echo 'selected="selected";'?> >Plat</option>
                <option value="3" <?php if($repas[0]["category"] == 3) echo 'selected="selected";'?> >Dessert</option>
            </select>
            <input required="required" type="hidden" name="id" value="<?php echo $repas[0]["id"]  ?>">
            <br>
            <button type="submit" class="bouton" >Mettre à jour</button>
        </form>
    </div>
</div>