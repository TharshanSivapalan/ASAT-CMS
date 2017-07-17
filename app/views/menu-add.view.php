<div class="formulaire">
    <div class="titre">
        <h3>AJOUTER UN MENU</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <form class="" id="" action="action.php" method="post">

            <label>Titre du menu</label>
            <input type="text" class="input" id="" name="" autocomplete="off">

            <label>Image</label>
            <input type="file" class="input" id="" name="" autocomplete="off">

            <label>Ajouter une entrée </label>
            <br>
            <select name="entre" class="input" id="">
                <option value="" >...</option>
                <?php foreach ($list_entre as $entre): 
                    echo $entre['nom'];
                ?>
                    <option value="<?php  $entre['id'] ?>" >
                        <?php echo $entre['nom']; ?>
                    </option>

                <?php
                    endforeach;
                ?>
            </select>
            <br>

            <label>Ajouter un plat</label>
            <br>
            <select name="plat" class="input" id="">
                <option value="" >...</option>
                <?php foreach ($list_plat as $plat): 
                    echo $plat['nom'];
                ?>
                    <option value="<?php  $plat['id'] ?>" >
                        <?php echo $plat['nom']; ?>
                    </option>

                <?php
                    endforeach;
                ?>
            </select>



            <br>

            <label>Ajouter un dessert</label>
            <br>
            <select name="dessert" class="input" id="">
                <option value="" >...</option>
                <?php foreach ($list_dessert as $dessert): 
                    echo $dessert['nom'];
                ?>
                    <option value="<?php  $dessert['id'] ?>" >
                        <?php echo $dessert['nom']; ?>
                    </option>

                <?php
                    endforeach;
                ?>
            </select>
            <br>

            <label>Description du repas</label>
            <br>
            <textarea class="input editor" name ="description" id="description" cols="70" rows="15"></textarea>

            <input type="submit" class="bouton" id="bt1" name ="envoyer1" value="Ajouter">
        </form>
    </div>
</div>