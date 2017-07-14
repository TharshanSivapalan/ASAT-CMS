<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Famous Restaurant </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descrption" content="ma description">

    <link rel="apple-touch-icon-precomposed" href="img/Apple-icon.png" />
    <link rel="icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/template2.css">

</head>
<body>

<nav class="conteneur-colonnes">
    <div id="menu-logo-slogan-adresse">
        <div id="slogan">
            <span>Slogan : Tout est bon !</span>
        </div>
        <div id="logo">
            <img id="comp-j143wefiimgimage" alt="" data- src="/img/Template2/favicon.png">
        </div>
        <div id="adresse">
            <span>Paris / Athis-mons / Aulnay-sous-bois</span>
        </div>
    </div>

    <ul class="conteneur-colonnes">
        <li ><a href="/">Accueil</a></li>
        <li ><a href="/carte">La Carte</a></li>
        <li ><a href="/livre">Livre d'or</a></li>
        <li ><a href="/contact">Contact</a></li>
        <li ><a href="/user/login">Connexion</a></li>
    </ul>
</nav>



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
                <strong>Famous restaurant</strong><br>
                21 Rue Erard<br>
                75008 Paris<br>
                <abbr title="Phone">+33 1 21 74 36 11</abbr><br><br>
                <p>Métro Ligne 1, Reully Diderot</p><br>
                <a href="mailto:contact@lefamous.fr">contact@famousrestaurant.fr</a><br><br>
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
    <iframe frameborder="0" height="350" marginheight="0" marginwidth="0" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.6333748191305!2d2.3854731999999874!3d48.8461315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6720d997a4b7d%3A0x86fe46d4b5ab876!2s21+Rue+Erard%2C+75012+Paris%2C+France!5e0!3m2!1sfr!2sus!4v1413469977854" width="640"></iframe>
</div>

<footer >
    <p class="text-center copyright">&copy;2017 Famous restaurant</p>
</footer>


















</body>
</html>