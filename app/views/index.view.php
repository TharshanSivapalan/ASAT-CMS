<?php
	if($theme_id == "1"){
?>
<header>

    <div class="header-caption">
        <h2 class="animated fadeInLeft">Bienvenue !</h2>
        <div class="animated fadeInDown">
            <p><strong>Notre restaurant, <span class="font-kaushan"><?php echo htmlspecialchars($list_setting[0]['valeur']) ?>, </span> vous accueille du lundi au vendredi soir !</strong></p>

        </div>
    </div>

</header>


<div class="container grey">
    <h2 class="center">Pour vous accueillir</h2>
    <hr class="souligne">

    <section >
        
            <article class="col center deux">

                <div class="deux col">
                    <div class="col">
                        <img src="/img/Template1/chef1.jpg" alt="">
                    </div>

                    <div class="col">
                        <img src="/img/Template1/chef2.jpg" alt="">
                    </div>
                </div>


                <article class="col center">

                    <h2><?php echo htmlspecialchars($list_article[0]['titre']) ?></h2>

                    <?php echo htmlspecialchars($list_article[0]['content']) ?>


                </article>


            </article>

            


    </section>


    <section class="deux">
        
        <article class="col center">

            <h2><?php echo htmlspecialchars($list_article[1]['titre']) ?></h2>

            <?php echo htmlspecialchars($list_article[1]['content']) ?>

        </article>

        <article class="col center">

            <div class="deux">
                <div class="col">
                    <img src="/img/Template1/chef3.jpg" alt="">
                </div>

                <div class="col">
                    <img src="/img/Template1/chef5.jpg" alt="">
                </div>
            </div>

        </article>

    </section>


</div>


<div class="container parallaxe1">

</div>

<div class="container grey nos_meilleurs_plats">
    <h2 class="center">Nos meilleurs menus</h2>
    <hr class="souligne">

    <section class="trois">

        <?php foreach (array_slice($list_menu, 0, 3) as $menu): ?>


            <?php 
                        if(empty($menu['image'])) {
                    ?>
                                <a href="menu/presentation/<?php echo htmlspecialchars($menu['id']); ?>">
                                    <img src="/img/Menus/default.jpg" alt="image menu <?php echo htmlspecialchars($menu['nom'])?>">
                                </a>
                    <?php
                        } else {

                    ?>
                                <a href="menu/presentation/<?php echo htmlspecialchars($menu['id']); ?>">
                                    <img src="/img/Menus/<?php echo htmlspecialchars($menu['image']); ?>" alt="Menu <?php echo htmlspecialchars($menu['nom']); ?>" class="img-responsive">
                                </a>
                    <?php
                        } 
                    ?>
            
        <?php endforeach; ?>

    </section>

    <a href="carte" titre="autreplat" class="btn">Afficher plus</a>
</div>




<div class="container">
    <h2 class="center">Coordonnées</h2>
    <hr class="souligne">

    <section class="deux">
        <article class="col">

            <address>
                <strong><?php echo htmlspecialchars($list_setting[0]['valeur']) ?></strong><br>
                <?php echo htmlspecialchars($list_setting[6]['valeur']) ?><br>
                <?php echo htmlspecialchars($list_setting[7]['valeur']) ?> <?php echo htmlspecialchars($list_setting[5]['valeur']) ?><br>
                <abbr title="Phone">+<?php echo htmlspecialchars($list_setting[8]['valeur']) ?></abbr><br><br>
                <p><?php echo htmlspecialchars($list_setting[10]['valeur']) ?></p><br>
                <a href="mailto:<?php echo htmlspecialchars($list_setting[9]['valeur']) ?>"><?php echo htmlspecialchars($list_setting[9]['valeur']) ?></a><br><br>
                <br>
            </address>
        </article>

        <article class="col">
            <form id="email-form" role="form" class="contact-form" action="formcontact.php" method="post">
                <div class="form-group">

                    <input type="text" name="nom"  id="name" placeholder="Nom: " required="">
                    <span ></span>
                </div>
                <div class="form-group">

                    <input type="email" name="email"  id="email" placeholder="Email: " required="">
                    <span ></span>
                </div>
                <div class="form-group">

                    <input type="text" name="telephone" id="phone" placeholder="Téléphone: " required="">
                    <span ></span>
                </div>
                <div class="form-group">

                    <textarea  name="message" id="message" placeholder="Message: " rows="5" required=""></textarea>
                    <span ></span>
                </div>
                <button type="submit" class="btn"><i class="fa fa-envelope-o"></i> Envoyer</button>
            </form>

        </article>
    </section>
</div>


<div class="map-container">
    <?php echo $list_setting[3]['valeur'] ?>
</div>
<?php
	}
	if($theme_id == "2"){
?>
<div class="container grey">

    <h2 class="center">Pour vous accueillir</h2>
    <hr class="souligne">

    <section >
        
            <article class="col center deux">

                <div class="deux col">
                    <div class="col">
                        <img src="/img/Template1/chef1.jpg" alt="">
                    </div>

                    <div class="col">
                        <img src="/img/Template1/chef2.jpg" alt="">
                    </div>
                </div>


                <article class="col center">

                    <h3><?php echo htmlspecialchars($list_article[0]['titre']) ?></h3>

                    <?php echo htmlspecialchars($list_article[0]['content']) ?>


                </article>


            </article>

            


    </section>


    <section >
        
            <article class="col center deux">


                <article class="col center">

                    <h3><?php echo htmlspecialchars($list_article[1]['titre']) ?></h3>

                    <?php echo htmlspecialchars($list_article[1]['content']) ?>


                </article>

                <div class="deux col">
                    <div class="col">
                        <img src="/img/Template1/chef1.jpg" alt="">
                    </div>

                    <div class="col">
                        <img src="/img/Template1/chef2.jpg" alt="">
                    </div>
                </div>

            </article>

            


    </section>







	<h2 class="center">à la une</h2>

    <?php $i= 0; ?>

    <?php foreach (array_slice($list_menu, 0, 3)  as $menu): ?>

        

            <?php if ($i % 2 == 0): ?>
                <section class="deux home-menu-block">
                <article class="col center">
                    <?php 
                        if(empty($menu['image'])) {
                    ?>
                                <img src="/img/Menus/default.jpg" alt="image menu <?php echo htmlspecialchars($menu['nom'])?>">
                    <?php
                        } else {

                    ?>
                                <img src="/img/Menus/<?php echo htmlspecialchars($menu['image'])?>" alt="image menu <?php echo htmlspecialchars($menu['nom'])?>">
                             
                    <?php
                        } 
                    ?>
                </article>

                <article class="col ">
                    <span class="menu-name"> <?php echo $menu['nom']?> </span>
                    <span class="menu-price-before">POUR</span>
                    <span class="menu-price"><?php echo $menu['prix']?> €</span>
                    <p><?php echo $menu['description'] ?> </p>

                    <a href="menu/presentation/<?php echo htmlspecialchars($menu['id']); ?>" titre="decouvrir" class="btn">MENU</a>

                </article>

            <?php endif; ?>

            

            <?php if ($i % 2 == 1): ?>
                <section class="deux home-menu-block reverse">
                <article class="col ">
                    <span class="menu-name"> <?php echo $menu['nom']?> </span>
                    <span class="menu-price-before">POUR</span>
                    <span class="menu-price"><?php echo $menu['prix']?> €</span>
                    <p><?php echo $menu['description'] ?> </p>

                    <a href="menu/presentation/<?php echo htmlspecialchars($menu['id']); ?>" titre="decouvrir" class="btn">MENU</a>

                </article>
                <article class="col center">
                <?php 
                        if(empty($menu['image'])) {
                    ?>
                                <img src="/img/Menus/default.jpg" alt="image menu <?php echo htmlspecialchars($menu['nom'])?>">
                    <?php
                        } else {

                    ?>
                                <img src="/img/Menus/<?php echo htmlspecialchars($menu['image'])?>" alt="image menu <?php echo htmlspecialchars($menu['nom'])?>">
                                <span> Prix: <?php echo htmlspecialchars($menu['prix'])?> &euro;</span>
                    <?php
                        } 
                    ?>
                    </article>
            <?php endif; ?>

        </section>

        <?php $i ++; ?>

    <?php endforeach; ?>


</div>


<div class="container grey">
    <h2 class="center">Nos mots d'ordre</h2>


    <section class="trois">
        <a href="#">
            <article class="col text-hover-img-block">
                <span class="text-hover">Qualité</span>
                <img src="https://static.wixstatic.com/media/84770f_0d32a522caea440ea73af1b6f62be51c.png/v1/fill/w_314,h_314,al_c,usm_0.66_1.00_0.01/84770f_0d32a522caea440ea73af1b6f62be51c.png" alt="plat le famous" class="img-responsive">
            </article></a>
        <a href="#">
            <article class="col text-hover-img-block">
                <span class="text-hover">Rapidité</span>
                <img src="https://static.wixstatic.com/media/84770f_0d32a522caea440ea73af1b6f62be51c.png/v1/fill/w_314,h_314,al_c,usm_0.66_1.00_0.01/84770f_0d32a522caea440ea73af1b6f62be51c.png" alt="plat le famous" class="img-responsive">
            </article>
        </a>
        <a href="#">
            <article class="col text-hover-img-block">
                <span class="text-hover">Quantité</span>
                <img src="https://static.wixstatic.com/media/84770f_0d32a522caea440ea73af1b6f62be51c.png/v1/fill/w_314,h_314,al_c,usm_0.66_1.00_0.01/84770f_0d32a522caea440ea73af1b6f62be51c.png" alt="plat le famous" class="img-responsive">
            </article>
        </a>
    </section>
</div>



<div class="container parallaxe1">

</div>



<div class="container">
    <h2 class="center">Coordonnées</h2>


    <section class="deux">
        <article class="col">

            <address>
                <strong><?php echo htmlspecialchars($list_setting[0]['valeur']) ?></strong><br>
                <?php echo htmlspecialchars($list_setting[6]['valeur']) ?><br>
                <?php echo htmlspecialchars($list_setting[7]['valeur']) ?> <?php echo htmlspecialchars($list_setting[5]['valeur']) ?><br>
                <abbr title="Phone">+<?php echo htmlspecialchars($list_setting[8]['valeur']) ?></abbr><br><br>
                <p><?php echo htmlspecialchars($list_setting[10]['valeur']) ?></p><br>
                <a href="mailto:<?php echo htmlspecialchars($list_setting[9]['valeur']) ?>"><?php echo htmlspecialchars($list_setting[9]['valeur']) ?></a><br><br>
                <br>
            </address>
        </article>

        <article class="col">
            <form id="email-form" role="form" class="contact-form" action="formcontact.php" method="post">
                <div class="form-group">

                    <input type="text" name="nom"  id="name" placeholder="Nom: " required="">
                    <span ></span>
                </div>
                <div class="form-group">

                    <input type="email" name="email"  id="email" placeholder="Email: " required="">
                    <span ></span>
                </div>
                <div class="form-group">

                    <input type="text" name="telephone" id="phone" placeholder="Téléphone: " required="">
                    <span ></span>
                </div>
                <div class="form-group">

                    <textarea  name="message" id="message" placeholder="Message: " rows="5" required=""></textarea>
                    <span ></span>
                </div>
                <button type="submit" class="btn"><i class="fa fa-envelope-o"></i> Envoyer</button>
            </form>

        </article>
    </section>
</div>


<div class="map-container">
    <?php echo $list_setting[3]['valeur'] ?>
</div>
<?php
	}
?>