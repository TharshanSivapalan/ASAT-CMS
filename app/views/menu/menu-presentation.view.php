
<header  id="menu-presentation-header">

    <div class="header-caption">
        <h1 class="animated fadeInLeft"><?php echo $menu[0]["nom"]; ?></h1>
    </div>

</header>

<div class="container grey menu-presentation">
		<section class="deux carte-menu-block">

             <article class="col ">
                <div class="menu-container">
                                <div class="description">
                                    <h3 class="menu-carte-before">
                                        Le menu <?php echo $menu[0]["nom"]; ?> c'est quoi...
                                    </h3>     
                                    <span class="description-content"><?php echo $menu[0]["description"]; ?></span>
                                </div>

                                <span>Entrée :</span><br>
                                <span class="nom-plat"><?php echo $menu[0]["entreeName"]; ?></span>
                                <br><br>
                    

                                <span>Plat :</span><br>
                                <span class="nom-plat"><?php echo $menu[0]["platName"]; ?></span>
                                <br><br>

                    
                                <span>Dessert :</span><br>
                                <span class="nom-plat"><?php echo $menu[0]["dessertName"]; ?></span>

                                <br><br><br>


             
                </div>
            </article>

            <article class="col center">
                                                    <img src="/img/Menus/5973c74b51d2f.gif" alt="image menu Enfant">
                                <span class="carte-price-menu"> Prix: <?php echo $menu[0]["prix"]; ?> €</span>
                    
            </article>

        </section>
</div>