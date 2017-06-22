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

    <link rel="stylesheet" href="/css/template1.css">

</head>
<body>

<nav class="conteneur-colonnes">
    <img src="favicon.png" class="logo" alt="logo portfolio">
    <ul class="conteneur-colonnes">
        <li ><a href="index.html">Accueil</a></li>
        <li ><a href="cartes.html">La Carte</a></li>
        <li ><a href="cartes.html">Livre d'or</a></li>
        <li ><a href="contact.html">Contact</a></li>
        <li ><a href="/user/login">Connexion</a></li>
    </ul>
</nav>


<header>

    <div class="header-caption">
        <h2 class="animated fadeInLeft">Bienvenue !</h2>
        <div class="animated fadeInDown">
            <p><strong>Notre restaurant, <span class="font-kaushan">Le Famous, </span> vous accueille du lundi au vendredi soir !</strong></p>

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
        <article class="col ">

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti.</p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti.</p>

        </article>
    </section>


    <section class="deux">

        <article class="col ">

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis incidunt maxime vitae similique nisi eligendi vel veniam architecto quisquam quibusdam! Saepe rem necessitatibus voluptatem eius, molestias dolor laboriosam voluptatibus eligendi?</p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero itaque ratione voluptate excepturi repellendus aliquam recusandae architecto, vero nemo quo doloremque quasi odit consectetur rem magnam, aliquid ea quidem deleniti.</p>

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


<div class="container grey">
    <h2 class="center">Nos meilleurs plats</h2>
    <hr class="souligne">

    <section class="trois">
        <a href="#">
            <article class="col ">
                <img src="/img/Template1/plat1.jpg" alt="plat le famous" class="img-responsive">
            </article></a>
        <a href="#">
            <article class="col ">
                <img src="/img/Template1/plat2.jpg" alt="plat le famous" class="img-responsive">
            </article>
        </a>
        <a href="#">
            <article class="col ">
                <img src="/img/Template1/plat3.jpg" alt="plat le famous" class="img-responsive">
            </article>
        </a>
    </section>

    <a href="#" titre="autreplat" class="btn">Afficher plus</a>
</div>




<div class="container">
    <h2 class="center">Coordonnées</h2>
    <hr class="souligne">

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