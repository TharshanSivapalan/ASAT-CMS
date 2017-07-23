<div class="formulaire">
    <div class="titre">
        <h3>MODIFIER LE REPAS</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <form class="" id="" action="/repas/update/<?php echo $repas[0]["id"] ?>" method="post" name="updateForm">

            <label>Titre du menu</label>
            <input pattern="[a-zA-Z0-9\s]+" minlength="3" maxlength="255" type="text" class="input" id="" name="nom" autocomplete="off" value="<?php echo htmlspecialchars($repas[0]["nom"]);?>" required="required">

            <label>Type</label>
            <br>
            <select name="category" class="input" id="" required="required">
                <option value="" >...</option>
                <option value="1" <?php if($repas[0]["category"] == 1) echo 'selected="selected";'?> >Entrée</option>
                <option value="2" <?php if($repas[0]["category"] == 2) echo 'selected="selected";'?> >Plat</option>
                <option value="3" <?php if($repas[0]["category"] == 3) echo 'selected="selected";'?> >Dessert</option>
            </select>
            <input required="required" type="hidden" name="id" value="<?php echo $repas[0]["id"]  ?>">
            <br>
            <input type="submit" class="bouton" id="bt1" name ="envoyer1" value="Mettre à jour">
        </form>
    </div>
</div>