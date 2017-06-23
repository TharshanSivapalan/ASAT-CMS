<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ASAT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descrption" content="ma description">

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


<?php
if(isset($_SESSION["messages"])){
    foreach ($_SESSION["messages"] as $message) {
        echo "<li>".$listOfErrors[$message];
    }
}
?>


<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <ul>
        <li><a href="/theme">DASHBOARD</a></li>

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

        <li class="menu-level1"><a href="#">UTILISATEUR<i class="fa fa-caret-down"></i></a>
            <ul class="menu-level2">
                <li><a href="/user">Liste des utilisateurs</a></li>
                <li><a href="/user/add">Ajouter un utilisateur</a></li>

            </ul>
        </li>

        <li><a href="#">MON PROFIL</a></li>
        <li><a href="/setting">REGLAGE</a></li>
        <li><a href="/user/logout" >DECONNEXION</a></li>
    </ul>
</div>

<span onclick="openNav()" id="openbtn"><i class="fa fa-bars fa-2x"></i></span>

<div id="main">
    <div class="container grey">

        <?php include $this->view; ?>

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












