<div class="formulaire">
    <div class="titre">
        <h3>AJOUTER UN MENU</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <a href="/menu" class="back-button"><i class="fa fa-arrow-left faa-horizontal animated-hover back-button-arrow" aria-hidden="true"> <span class="back-button-text">Retour</span>
            </i></a>
        <form action="/menu/add" method="post" enctype="multipart/form-data" >

            <label>Titre du menu*</label>
            <input type="text" class="input" name="nom" autocomplete="off">
            <!--
            <input pattern="[a-zA-Z0-9\s]+" minlength="3" maxlength="100" type="text" class="input" name="nom" autocomplete="off" required="required">
            -->
            <label>Image</label>
            <input type="file" class="input" name="image" accept="image/*" autocomplete="off">

            <label>Ajouter une entrée </label>
            <br>
            
            <select name="entree" class="input">
                <option value="" >...</option>
                <?php foreach ($list_entre as $entre):?>
                    <option value="<?php echo $entre['id'] ?>" >
                        <?php echo $entre['nom']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>

            <label>Ajouter un plat</label>
            
            <br>
            <select name="plat" class="input" id="">
                <option value="" >...</option>
                <?php foreach ($list_plat as $plat):?>
                    <option value="<?php  echo $plat['id'] ?>" >
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
                    <option value="<?php  echo $dessert['id'] ?>" >
                        <?php echo $dessert['nom']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>

            <label>Prix*</label>
            <br>
            <!--
            <input type="number" class="input" name="prix" step="0.01" autocomplete="off" required="required">
            -->
            <input type="text" class="input" name="prix" step="0.01" autocomplete="off">

            <br>


            <label>Description du menu</label>
            <br>
            <textarea class="input editor" name ="description" id="description" cols="70" rows="15"></textarea>

            <button type="submit" class="bouton" id="bt1">Ajouter</button>
        </form>
    </div>
</div>