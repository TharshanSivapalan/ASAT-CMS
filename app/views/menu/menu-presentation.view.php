
<header  id="menu-presentation-header">

    <div class="header-caption">
        <h1 class="animated fadeInLeft"><?php echo $menu["nom"]; ?></h1>
    </div>

</header>

<div class="container grey menu-presentation">
		<section class="deux carte-menu-block">

             <article class="col ">
                <div class="menu-container">
                                <div class="description">
                                    <h3 class="menu-carte-before">
                                        Le menu <?php echo $menu["nom"]; ?> c'est quoi...
                                    </h3>     
                                    <span class="description-content"><?php echo $menu["description"]; ?></span>
                                </div>

                                <span>Entrée :</span><br>
                                <span class="nom-plat"><?php echo $menu["entree"]; ?></span>
                                <br><br>
                    

                                <span>Plat :</span><br>
                                <span class="nom-plat"><?php echo $menu["plat"]; ?></span>
                                <br><br>

                    
                                <span>Dessert :</span><br>
                                <span class="nom-plat"><?php echo $menu["dessert"]; ?></span>

                                <br><br><br>
             
                </div>
            </article>

            <article class="col center">
                                                    <img src="/img/menus/<?php echo $menu["image"] ?>" alt="image menu <?php echo $menu["nom"] ?>">
                                <span class="carte-price-menu"> Prix: <?php echo $menu["prix"]; ?> €</span>
                    
            </article>

        </section>
</div>