<div class="formulaire">
    <div class="titre">
        <h3>REGLAGES</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <form method="post" action="/setting" enctype="multipart/form-data" >

            <div class="multi-col-form">
                <div class="half-form">
                    <label>Nom du restaurant</label>
                    <br>
                    <input type="text" class="input" id="" name="nom_site" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[0]['valeur']) ?>">
                </div>

                <div class="half-form">
                    <label>Slogan </label>
                    <br>
                    <input type="text" class="input" id="" name="slogan" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[1]['valeur']) ?>">
                </div>
            </div>

            <label>Logo du site</label>
            <input type="file" class="input" id="" name="logo" accept="image/*">

            <label>Iframe Google MAPS</label>
            <textarea class="input" name ="iframe" id=""  rows="5">
                <?php echo htmlspecialchars($list_setting[3]['valeur']) ?>
            </textarea>

            <label>Pays</label>
            <input type="text" class="input" id="" name="pays" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[4]['valeur']) ?>">

            <div class="multi-col-form">
                <div class="third-form">
                    <label>Adresse</label>
                    <br>
                    <input type="text" class="input" id="" name="adresse" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[6]['valeur']) ?>">
                </div>

                <div class="third-form">
                    <label>Ville </label>
                    <br>
                    <input type="text" class="input" id="" name="ville" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[5]['valeur']) ?>">
                </div>

                <div class="third-form">
                    <label>Code postal </label>
                    <br>
                    <input type="number" class="input" id="" name="codepostal" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[7]['valeur']) ?>">
                </div>
            </div>

            


            <label>Téléphone du restaurant</label>
            <input type="tel" class="input" id="" name="telephone"  pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" value="<?php echo htmlspecialchars($list_setting[8]['valeur']) ?>">


            <br>


            <label>Adresse mail du restaurant</label>
            <input type="email" class="input" id="" name="email" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[9]['valeur']) ?>">


            <br>




            <label>Itinéraire</label>
            <input type="text" class="input" id="" name="itineraire" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[10]['valeur']) ?>">


            <br>


            <input type="submit" class="bouton" id="bt1" name ="envoyer1" value="MODIFIER">
        </form>
    </div>
</div>