<header  id="menu-presentation-header">

            <div class="header-caption">
                <h1 class="animated fadeInLeft">La carte</h1>
         
            </div>

    </header>

<div class="container grey">

    
    <?php foreach (array_reverse($list_menu) as $menu): ?>


        <section class="deux carte-menu-block">

             <article class="col ">
                <div class="menu-container">
                 <h3 class="menu-carte-before"><?php echo htmlspecialchars($menu['nom'])?></h3>

                    <?php 
                        if(!empty($menu['entree'])) {
                    ?>
                                <span>Entrée :</span><br>
                                <span class="nom-plat"><?php echo htmlspecialchars($menu['entree'])?></span>
                                <br><br>
                    <?php
                        }

                    ?>


                    <?php 
                        if(!empty($menu['plat'])) {
                    ?>
                                <span>Plat :</span><br>
                                <span class="nom-plat"><?php echo htmlspecialchars($menu['plat'])?></span>
                                <br><br>

                    <?php
                        }

                    ?>

                    <?php 
                        if(!empty($menu['dessert'])) {
                    ?>
                                <span>Dessert :</span><br>
                                <span class="nom-plat"><?php echo htmlspecialchars($menu['dessert'])?></span>


                    <?php
                        }

                    ?>


                                <a href="menu/presentation/<?php echo htmlspecialchars($menu['id']); ?>"" titre="decouvrir" class="btn">VOIR</a>
                          
             
                </div>
            </article>

            <article class="col center">
                    <?php 
                        if(empty($menu['image'])) {
                    ?>
                                <img src="/img/menus/default.jpg" alt="image menu <?php echo htmlspecialchars($menu['nom'])?>">
                                 <span class="carte-price-menu"><?php echo htmlspecialchars($menu['prix'])?> &euro;</span>
                    <?php
                        } else {

                    ?>
                                <img src="/img/menus/<?php echo htmlspecialchars($menu['image'])?>" alt="image menu <?php echo htmlspecialchars($menu['nom'])?>">
                                <span class="carte-price-menu"><?php echo htmlspecialchars($menu['prix'])?> &euro;</span>
                    <?php
                        } 
                    ?>

            </article>

        </section>

    <?php endforeach; ?>
    
</div>


