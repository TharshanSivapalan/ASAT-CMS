<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title> <?php echo htmlspecialchars($list_setting[0]['valeur']) ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descrption" content="ma description">

    <link rel="apple-touch-icon-precomposed" href="img/Apple-icon.png" />
    <link rel="icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/template1.css">

</head>
<body>

<nav class="conteneur-colonnes">
    <img src="/img/Logo/<?php echo htmlspecialchars($list_setting[2]['valeur']) ?> " class="logo" alt="logo">
    <ul class="conteneur-colonnes">
        <li ><a href="/">Accueil</a></li>
        <li ><a href="/carte">La Carte</a></li>
        <li ><a href="/index/contact">Contact</a></li>
        <li ><a href="/user/login">Connexion</a></li>
    </ul>
</nav>


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

<footer >
    <p class="text-center copyright">&copy;<?php echo date("Y"); ?> <?php echo htmlspecialchars($list_setting[0]['valeur']) ?></p>
</footer>


</body>
</html>