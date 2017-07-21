<div class="formulaire">
    <div class="titre">
        <h3>REGLAGES</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <form class="" id="" action="action.php" method="post">

            <div class="multi-col-form">
                <div class="half-form">
                    <label>Nom du restaurant</label>
                    <br>
                    <input type="text" class="input" id="" name="" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[0]['valeur']) ?>">
                </div>

                <div class="half-form">
                    <label>Slogan </label>
                    <br>
                    <input type="text" class="input" id="" name="" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[1]['valeur']) ?>">
                </div>
            </div>

            <label>Logo du site</label>
            <input type="file" class="input" id="" name="" autocomplete="off">

            <label>Iframe Google MAPS</label>
            <textarea class="input" name ="" id=""  rows="5">
                <?php echo htmlspecialchars($list_setting[3]['valeur']) ?>
            </textarea>

            <label>Pays</label>
            <input type="text" class="input" id="" name="" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[4]['valeur']) ?>">

            <div class="multi-col-form">
                <div class="third-form">
                    <label>Adresse</label>
                    <br>
                    <input type="text" class="input" id="" name="" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[6]['valeur']) ?>">
                </div>

                <div class="third-form">
                    <label>Ville </label>
                    <br>
                    <input type="text" class="input" id="" name="" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[5]['valeur']) ?>">
                </div>

                <div class="third-form">
                    <label>Code postal </label>
                    <br>
                    <input type="number" class="input" id="" name="" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[7]['valeur']) ?>">
                </div>
            </div>

            

            <label>Adresse mail du restaurant</label>
            <input type="email" class="input" id="" name="" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[9]['valeur']) ?>">


            <br>


            <input type="submit" class="bouton" id="bt1" name ="envoyer1" value="MODIFIER">
        </form>
    </div>
</div>