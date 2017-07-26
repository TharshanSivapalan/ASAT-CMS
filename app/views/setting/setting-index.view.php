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
                    <input pattern="[a-zA-Z0-9\s]+" minlength="3" maxlength="255" type="text" class="input" name="nom_site" value="<?php echo htmlspecialchars($list_setting[0]['valeur']) ?>" required="required">
                </div>

                <div class="half-form">
                    <label>Slogan </label>
                    <br>
                    <input required="required" type="text" class="input" name="slogan" autocomplete="off" value="<?php echo htmlspecialchars($list_setting[1]['valeur']) ?>">
                </div>
            </div>

            
            <div class="multi-col-form">
                <div class="half-form">
                    <label><label>Logo du site</label></label>
                    <input type="file" class="input" name="logo" accept="image/*">
                </div>

                <div class="half-form">
                    <div class="image-thumb">
                        <img src="<?php echo "/img/Logo/".$list_setting[2]['valeur'];?>">
                    </div>
                </div>
            </div>


            <label>Iframe Google MAPS</label>
            <textarea required="required" class="input" name ="iframe"  rows="5"><?php echo htmlspecialchars($list_setting[3]['valeur']) ?>
            </textarea>

            <label>Pays</label>
            <input required="required" type="text" class="input" name="pays" value="<?php echo htmlspecialchars($list_setting[4]['valeur']) ?>">

            <div class="multi-col-form">
                <div class="third-form">
                    <label>Adresse</label>
                    <br>
                    <input required="required" type="text" class="input" name="adresse" value="<?php echo htmlspecialchars($list_setting[6]['valeur']) ?>">
                </div>

                <div class="third-form">
                    <label>Ville </label>
                    <br>
                    <input required="required" type="text" class="input" name="ville" value="<?php echo htmlspecialchars($list_setting[5]['valeur']) ?>">
                </div>

                <div class="third-form">
                    <label>Code postal </label>
                    <br>
                    <input required="required" type="number" class="input" name="codepostal" value="<?php echo htmlspecialchars($list_setting[7]['valeur']) ?>">
                </div>
            </div>

            


            <label>Téléphone du restaurant</label>
            <input type="tel" class="input" name="telephone"  pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" value="<?php echo htmlspecialchars($list_setting[8]['valeur']) ?>">


            <br>


            <label>Adresse mail du restaurant</label>
            <input required="required" type="email" class="input" name="email" value="<?php echo htmlspecialchars($list_setting[9]['valeur']) ?>">


            <br>


            <label>Itinéraire</label>
            <input required="required" type="text" class="input" name="itineraire" value="<?php echo htmlspecialchars($list_setting[10]['valeur']) ?>">


            <br>


            <input type="submit" class="bouton" id="bt1" name ="envoyer1" value="MODIFIER">
        </form>
    </div>
</div>