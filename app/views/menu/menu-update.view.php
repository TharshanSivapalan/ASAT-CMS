<div class="formulaire">
    <div class="titre">
        <h3>MODIFIER MON PROFIL</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <form class="" id="form-user-update" action="update" method="post">

            <h4>Adresse Mail</h4>
            <hr>
            <label>Votre adresse mail actuelle</label>
            <span><?php echo $_SESSION["user"]['email'];?></span>
            <label>Changer mon adresse</label>
            <input type="text" class="input" placeholder="Ex:monadresse@yahoo.fr" id="" name="emailNew" autocomplete="off">
            <label>Entrez votre mot de passe actuel</label>
            <input type="password" class="input" placeholder="Ex:monadresse@yahoo.fr" id="" name="mdpConfirm1" autocomplete="off">
            <input type="submit" class="bouton" id="bt1" name ="envoyer1" value="Ajouter">
        </form>

        <form class="" id="form-user-update" action="update" method="post">

            <h4>Modifier mon mot de passe</h4>
            <hr>

            <label>Entrez votre mot de passe actuel</label>
            <input type="password" class="input" placeholder="minimum 8 caractères" id="" name="mdpConfirm2" autocomplete="off">

            <label>Entrez le nouveau mot de passe</label>
            <input type="password" class="input" placeholder="minimum 8 caractères" id="" name="mdpNew1" autocomplete="off">

            <label>Confirmer le nouveau mot de passe</label>
            <input type="password" class="input" placeholder="minimum 8 caractères" id="" name="mdpNew2" autocomplete="off">
            
            <input type="submit" class="bouton" id="bt1" name ="envoyer2" value="Ajouter">

        </form>

    </div>
</div>