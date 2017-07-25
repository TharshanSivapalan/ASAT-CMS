<div class="formulaire">
    <div class="titre">
        <h3>MODIFIER LE MENU</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <form class="" id="" action="/menu/update/<?php echo $menu[0]["id"] ?>" method="post" enctype="multipart/form-data" >

            <label>Titre du menu*</label>
            <input type="text" class="input" id="" name="nom" value="<?php echo $menu[0]["nom"];?>" autocomplete="off">

            <label>Image</label>
            <input type="file" class="input" id="" name="image" value="<?php echo $menu[0]["image"];?>" accept="image/*" autocomplete="off">

            <label>Ajouter une entrée </label>
            <br>
            <select name="entree" class="input" id="">
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
            <input type="text" class="input" name="prix" autocomplete="off" value="<?php echo $menu[0]["prix"];?>">
            <br>

            <label>Description du menu</label>
            <br>
            <textarea class="input editor" name ="description"  id="description" cols="70" rows="15"><?php echo $menu[0]["description"];?></textarea>

            <input type="hidden" name="id" value="<?php echo $menu[0]["id"] ?>">

            <button type="submit" class="bouton" id="bt1">Modifier</button>
        </form>
    </div>
</div>