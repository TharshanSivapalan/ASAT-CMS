<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>ASAT-CMS > Installation</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='descrption' content='Installation'>

    <link rel='apple-touch-icon-precomposed' href='img/Apple-icon.png' />
    <link rel='icon' href='/favicon.ico'>

    <link href='https://fonts.googleapis.com/css?family=Great+Vibes|Raleway' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link rel='stylesheet' href='
    https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css'>

    <link rel='stylesheet' href='/css/install.css'>

</head>
<body>
<script src='/js/jquery-3.2.1.min.js'></script>
    <a href='http://www.asat-cms.com'>
        <p id='logo-header'>
        </p>
    </a>

    <div class='container'>

        <?php include $this->view; ?>

    </div>

    <script>
        $(document).ready(function(){
            $('.menu').css('width', $('#horizontal-menu').width()/$('.menu').length);
        });
    </script>
</body>
</html>