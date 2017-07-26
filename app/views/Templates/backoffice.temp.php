<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ASAT - Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descrption" content="Espace d'administration d'ASAT">

    <link rel="apple-touch-icon-precomposed" href="/img/Apple-icon.png" />
    <link rel="icon" href="/favicon.ico">

    <link rel="stylesheet" href="/css/admin.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='
    https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css'>

    <link rel="stylesheet" href="/css/notification.css">
    
    <?php foreach ($css as $style): ?>
        <link rel="stylesheet" href="/<?php echo $style?>">
    <?php endforeach; ?>

</head>
<body>


<div id="mySidenav" class="sidenav">
 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <ul>
        <li><a href="/">MON SITE</a></li>
        <li><a href="/dashboard">DASHBOARD</a></li>

        <li class="menu-level1"><a href="#">MENU<i class="fa fa-caret-down"></i></a>
            <ul class="menu-level2">
                <li><a href="/menu">Tous les menus</a></li>
                <li><a href="/menu/add">Ajouter un menu</a></li>

            </ul>
        </li>

        <li class="menu-level1"><a href="#">REPAS<i class="fa fa-caret-down"></i></a>
            <ul class="menu-level2">
                <li><a href="/repas">Tous les repas</a></li>
                <li><a href="/repas/add">Ajouter un repas</a></li>

            </ul>
        </li>

        <li><a href="/article">ARTICLE</a></li>

        <li><a href="/theme">THEME</a></li>

        <?php if ($_SESSION['user']['id_groupe_user'] == ADMIN):  ?>

            <li class="menu-level1"><a href="#">UTILISATEUR<i class="fa fa-caret-down"></i></a>
                <ul class="menu-level2">
                    <li><a href="/user">Liste des utilisateurs</a></li>
                    <li><a href="/user/signup">Ajouter un utilisateur</a></li>
    
                </ul>
            </li>

        <?php endif; ?>
        
        <?php if ($_SESSION['user']['id_groupe_user'] == ADMIN):  ?>

            <li class="menu-level1"><a href="#">REGLAGE<i class="fa fa-caret-down"></i></a>
                <ul class="menu-level2">
                    <li><a href="/setting">Réglage du site</a></li>
                    <li><a href="/user/update">Mon profil</a></li>
    
                </ul>
            </li>
        
        <?php endif; ?>

        
    </ul>
</div>
    <div class="logo_cote">
    <span onclick="openNav()" id="openbtn"><i class="fa fa-bars fa-2x"></i></span>
    <img src="/img/logo_menu.png" class="lg_admin" alt="logo">
    <div class="user-detail">
        <span id="login-user"> <?php echo $_SESSION["user"]["login"]; ?></span>
        <a href="/user/logout"><i class="action-button fa faa-vertical animated-hover fa-power-off " style="
            margin-left: 10px;
        "></i></a>
    </div>
    </div>


<div id="main">

    <!-- Notifications -->

    <div class="notifications">

        <?php  if(isset($_SESSION["flash"])) : ?>

            <div class="notification notification-<?php echo $_SESSION["flash"]["type"] ?> animated fadeInRight">
                <div class="left">
                    <i style="font-size: 2.0em;margin-top: 6px;" class="fa <?php echo TYPE_MESSAGE [$_SESSION["flash"]["type"]] ?>" aria-hidden="true"></i>
                </div>
                <div class="right">
                    <p><?php echo $_SESSION["flash"]["message"] ?></p>
                </div>
            </div>

            <?php unset($_SESSION["flash"]);  ?>

        <?php endif; ?>

    </div>

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

<script src="/js/notification.js"></script>

<?php foreach ($js as $script): ?>
    <script src="/<?php echo $script?>"></script>
<?php endforeach; ?>

<?php unset($_SESSION["messages"]);  ?>

</body>
</html>












