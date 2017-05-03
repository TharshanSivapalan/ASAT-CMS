<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Titre du document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="descrption" content="ma description">

    <link rel="apple-touch-icon-precomposed" href="img/Apple-icon.png" />
    <link rel="icon" href="favicon.ico">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php foreach ($css as $style): ?>
        <link rel="stylesheet" href="/<?php echo $style?>">
    <?php endforeach; ?>
    
</head>
<body>

    <div class="site-content">
        <div class="container-fluid">

            <div class="content">

                <?php include $this->view; ?>

            </div>

        </div>

    </div>

    <footer class="footer-basic-centered">

        <p class="footer-company-motto">ASAT</p>

        <p class="footer-links">
            <a href="#">Home</a>        ·
            <a href="#">Contact</a>    </p>

        <p class="footer-company-name">ASAT © 2017</p>

    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <?php foreach ($js as $script): ?>
        <script src="/<?php echo $script?>"></script>
    <?php endforeach; ?>



</body>
</html>