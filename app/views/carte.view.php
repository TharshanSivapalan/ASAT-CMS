
<div class="container grey">
    <h2 class="center">Carte</h2>

    <?php foreach ($list_menu as $menu): ?>

        <section class="deux carte-menu-block">

             <article class="col ">
                <div class="menu-container">
                 <h3 class="menu-carte-before"><?php echo htmlspecialchars($menu['nom'])?></h3>
                    <span>Entrée :</span><br>
                    <span class="nom-plat"><?php echo htmlspecialchars($menu['entree'])?></span>
                    <br><br>
                    <span>Plat :</span><br>
                    <span class="nom-plat"><?php echo htmlspecialchars($menu['plat'])?></span>
                    <br><br>
                    <span>Dessert :</span><br>
                    <span class="nom-plat"><?php echo htmlspecialchars($menu['dessert'])?></span>
             
                </div>
            </article>

            <article class="col center">
                    <img src="/img/Menus/<?php echo htmlspecialchars($menu['image'])?>" alt="image menu <?php echo htmlspecialchars($menu['nom'])?>">
                    <span> Prix: <?php echo htmlspecialchars($menu['prix'])?> &euro;</span>
            </article>

        </section>

    <?php endforeach; ?>
    
</div>


