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

    <section class="deux">
        <article class="col center">

            <div class="deux">
                <div class="col">
                    <img src="/img/Template1/chef1.jpg" alt="">
                </div>

                <div class="col">
                    <img src="/img/Template1/chef2.jpg" alt="">
                </div>
            </div>


        </article>


        <?php foreach ($list_article as $article): ?>

            <article class="col ">

                <h2><?php echo htmlspecialchars($article['titre']) ?></h2>

                <?php echo htmlspecialchars($article['content']) ?>

            </article>

        <?php endforeach; ?>

    </section>


    <section class="deux">
        
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

<div class="container grey">
    <h2 class="center">Nos meilleurs plats</h2>
    <hr class="souligne">

    <section class="trois">

        <?php foreach ($list_menu as $menu): ?>

        <a href="#">
            <article class="col ">
                <img src="/img/Menus/<?php echo htmlspecialchars($menu['image']); ?>" alt="Menu <?php echo htmlspecialchars($menu['nom']); ?>" class="img-responsive">
            </article></a>
            
        <?php endforeach; ?>

    </section>

    <a href="#" titre="autreplat" class="btn">Afficher plus</a>
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
	<h2 class="center">à la une</h2>

    <?php $i= 0; ?>

    <?php foreach ($list_menu as $menu): ?>

        <section class="deux home-menu-block">

            <?php if ($i % 2 == 0): ?>
                <article class="col center">
                    <img src="/img/Menus/<?php echo $menu['image']?>" alt="image menu <?php echo $menu['nom']?>">
                </article>
            <?php endif; ?>

            <article class="col ">
                <span class="menu-name"> <?php echo $menu['nom']?> </span>
                <span class="menu-price-before">POUR</span>
                <span class="menu-price"><?php echo $menu['prix']?> €</span>
                <p><?php echo $menu['description'] ?> </p>

                <a href="#" titre="decouvrir" class="btn">MENU</a>

            </article>

            <?php if ($i % 2 == 1): ?>
                <article class="col center">
                    <img src="/img/Menus/<?php echo $menu['image']?>" alt="image menu <?php echo $menu['nom']?>">
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