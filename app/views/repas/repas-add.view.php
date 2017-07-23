<div class="formulaire">
    <div class="titre">
        <h3>AJOUTER UN REPAS</h3>
    </div><!--.onglets-->

    <div class="onglet-contenu" >
        <form class="" id="" action="add" method="post">

            <label>Titre du menu</label>
            <input pattern="[a-zA-Z0-9\s]+" minlength="3" maxlength="255" type="text" class="input" id="" name="nom" autocomplete="off" required="required">

            <label>Type</label>
            <br>
            <select name="category" class="input" id="" required="required">
                <option value="" >...</option>
                <option value="1" >Entrée</option>
                <option value="2" >Plat</option>
                <option value="3" >Dessert</option>
            </select>
            <br>


            <input type="submit" class="bouton" id="bt1" name ="envoyer1" value="Ajouter">
        </form>
    </div>
</div>