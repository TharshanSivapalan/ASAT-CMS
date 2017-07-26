<div class="formulaire">
    <div class="titre">
        <h3>MODIFIER LE MENU</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <a href="/menu" class="back-button"><i class="fa fa-arrow-left faa-horizontal animated-hover back-button-arrow" aria-hidden="true"> <span class="back-button-text">Retour</span></i></a>
        <form action="/menu/update/<?php echo $menu[0]["id"] ?>" method="post" enctype="multipart/form-data" >

            <label>Titre du menu*</label>
            <input required="required" pattern="[a-zA-Z0-9\s]+" minlength="3" maxlength="255" type="text" class="input" name="nom" value="<?php echo $menu[0]["nom"];?>">
            
            <div class="multi-col-form">
                <div class="half-form">
                    <label>Image</label>
                    <input type="file" class="input" name="image" accept="image/*" autocomplete="off">
                </div>

                <div class="half-form">
                    <div class="image-thumb">
                        <img src="<?php echo "/img/menus/".$menu[0]["image"];?>">
                    </div>
                </div>
            </div>

            <label>Ajouter une entrée </label>
            <br>
            <select name="entree" class="input">
                <option value="" >...</option>
                <?php foreach ($list_entre as $entre):?>
                    <option value="<?php  echo $entre['id'] ?>" <?php if($menu[0]["entree"] == $entre['id']) echo 'selected="selected" '?> >
                        <?php echo $entre['nom']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>

            <label>Ajouter un plat</label>
            <br>
            <select name="plat" class="input" id="">
                <option value="" >...</option>
                <?php foreach ($list_plat as $plat): ?>
                    <option value="<?php  echo $plat['id'] ?>" <?php if($menu[0]["plat"] == $plat['id']) echo 'selected="selected" '?> >
                        <?php echo $plat['nom']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br>

            <label>Ajouter un dessert</label>
            <br>
            <select name="dessert" class="input" id="">
                <option value="" >...</option>
                <?php foreach ($list_dessert as $dessert):?>
                    <option value="<?php  echo $dessert['id'] ?>" <?php if($menu[0]["dessert"] == $dessert['id']) echo 'selected="selected" '?> >
                        <?php echo $dessert['nom']; ?>
                    </option>

                <?php endforeach; ?>
            </select>
            <br>

            <label>Prix*</label>
            <br>
            <input type="number" class="input" name="prix" required="required" value="<?php echo $menu[0]["prix"];?>" min="0" max="10000" step="0.01">
            <br>
            <label>Description du menu</label>
            <br>
            <textarea class="input editor" name="description" id="description" cols="70" rows="15"><?php echo strip_tags($menu[0]["description"]);?></textarea>

            <input type="hidden" name="id" value="<?php echo $menu[0]["id"] ?>">

            <button type="submit" class="bouton" id="bt1">Modifier</button>
        </form>
    </div>
</div>