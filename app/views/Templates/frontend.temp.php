<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ASAT - Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descrption" content="Connecter vous pour accedder a votre espace de gestion">

    <link rel="apple-touch-icon-precomposed" href="img/Apple-icon.png" />
    <link rel="icon" href="/favicon.ico">

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

    <div class="site-content">
        <div class="container-fluid">

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
            

            
            <div class="content">

                <?php include $this->view; ?>

            </div>

        </div>

    </div>

    <footer class="footer-basic-centered">

        <p class="footer-company-motto">ASAT</p>

        <p class="footer-links">
            <a href="/">Home</a>
        </p>

        <p class="footer-company-name">ASAT © 2017</p>

    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="/js/notification.js"></script>

    <?php foreach ($js as $script): ?>
        <script src="/<?php echo $script?>"></script>
    <?php endforeach; ?>

</body>
</html>