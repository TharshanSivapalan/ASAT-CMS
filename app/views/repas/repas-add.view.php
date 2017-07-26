<div class="formulaire">
    <div class="titre">
        <h3>AJOUTER UN REPAS</h3>
    </div><!--.onglets-->


    <div class="onglet-contenu" >
        <a href="/repas" class="back-button"><i class="fa fa-arrow-left faa-horizontal animated-hover back-button-arrow" aria-hidden="true"> <span class="back-button-text">Retour</span></i></a>
        <form class="" id="" action="add" method="post">

            <label>Titre du repas</label>
            <input pattern="[a-zA-Z0-9\s]+" minlength="3" maxlength="255" type="text" class="input" name="nom" required="required" value="<?php if(isset($_SESSION["value_form"]))echo $_SESSION["value_form"]["nom"];?>">

            <label>Type</label>
            <br>
            <select name="category" class="input" required="required">
                <option value="" >...</option>
                <option value="1" <?php if(isset($_SESSION["value_form"]) && $_SESSION["value_form"]["category"] == 1)echo "selected";?>>Entrée</option>
                <option value="2" <?php if(isset($_SESSION["value_form"]) && $_SESSION["value_form"]["category"] == 1)echo "selected";?> >Plat</option>
                <option value="3" <?php if(isset($_SESSION["value_form"]) && $_SESSION["value_form"]["category"] == 1)echo "selected";?> >Dessert</option>
            </select>
            <br>
            <button class="bouton" type="submit">Ajouter</button>
        </form>
    </div>
</div>