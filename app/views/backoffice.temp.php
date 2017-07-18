<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ASAT - Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descrption" content="Espace d'administration d'ASAT">

    <link rel="apple-touch-icon-precomposed" href="/img/Apple-icon.png" />
    <link rel="icon" href="favicon.ico">

    <link rel="stylesheet" href="/css/admin.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php foreach ($css as $style): ?>
        <link rel="stylesheet" href="/<?php echo $style?>">
    <?php endforeach; ?>

</head>
<body>


<div id="mySidenav" class="sidenav">
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <ul>
        <li><a href="/dashboard">DASHBOARD</a></li>

        <li class="menu-level1"><a href="#">MENU<i class="fa fa-caret-down"></i></a>
            <ul class="menu-level2">
                <li><a href="/menu">Tous les menus</a></li>
                <li><a href="/menu/add">Ajouter un menu</a></li>

            </ul>
        </li>

        <li class="menu-level1"><a href="#">REPAS<i class="fa fa-caret-down"></i></a>
            <ul class="menu-level2">
                <li><a href="/repas">Toutes les repas</a></li>
                <li><a href="/repas/add">Ajouter un repas</a></li>

            </ul>
        </li>

        <li><a href="/article">ARTICLE</a></li>

        <li><a href="/theme">THEME</a></li>

        <li class="menu-level1"><a href="#">UTILISATEUR<i class="fa fa-caret-down"></i></a>
            <ul class="menu-level2">
                <li><a href="/user">Liste des utilisateurs</a></li>
                <li><a href="/user/signup">Ajouter un utilisateur</a></li>

            </ul>
        </li>

        <li class="menu-level1"><a href="#">REGLAGE<i class="fa fa-caret-down"></i></a>
            <ul class="menu-level2">
                <li><a href="/setting">Réglage du site</a></li>
                <li><a href="/user/signup">Mon profil</a></li>

            </ul>
        </li>

        <li><a href="/user/logout" >DECONNEXION</a></li>
    </ul>
</div>
    <div class="logo_cote">
    <span onclick="openNav()" id="openbtn"><i class="fa fa-bars fa-2x"></i></span>
    <img src="/img/logo_menu.png" class="lg_admin" alt="logo">
    </div>


<div id="main">
    <div class="container grey">

        <?php include $this->view; ?>


        <div class="error-message">
            <?php
                if(isset($_SESSION["messages"])){
                    foreach ($_SESSION["messages"] as $message) {
                        echo "<li>".$message;
                    }
                }
            ?>
        </div>


    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="/js/admin.js"></script>
<!-- tinymce (éditeur textarea) -->
<script src="/tinymce/tinymce.min.js"></script>
<script src="/tinymce/langsfr/fr_FR.js"></script>

<?php foreach ($js as $script): ?>
    <script src="/<?php echo $script?>"></script>
<?php endforeach; ?>

<?php unset($_SESSION["messages"]);  ?>

</body>
</html>












