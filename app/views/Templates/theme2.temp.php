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

    <link rel="stylesheet" href="/css/template2.css">

</head>
<body>

<nav class="conteneur-colonnes">
    <div id="menu-logo-slogan-adresse">
        <div id="slogan">
            <span>Slogan : <?php echo htmlspecialchars($list_setting[1]['valeur']) ?> </span>
        </div>
        <div id="logo">
            <img id="comp-j143wefiimgimage" alt="logo" src="/img/Logo/<?php echo htmlspecialchars($list_setting[2]['valeur']) ?>">
        </div>
        <div id="adresse">
            <span>Paris / Athis-mons / Aulnay-sous-bois / Villepinte</span>
        </div>
    </div>

    <ul class="conteneur-colonnes">
        <li ><a href="/">Accueil</a></li>
        <li ><a href="/carte">La Carte</a></li>
        <li ><a href="/contact">Contact</a></li>
    </ul>
</nav>
    <?php include $this->view; ?>
<footer >
    <p class="text-center copyright">&copy;<?php echo date("Y"); ?> <?php echo htmlspecialchars($list_setting[0]['valeur']) ?></p>
</footer>

</body>
</html>