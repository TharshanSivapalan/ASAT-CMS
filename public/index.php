<?php

    session_start();
    require "../conf.inc.php";

    // Token de securite

    if (!isset($_SESSION['tokenCRSF'] )) {

        $_SESSION['tokenCRSF'] = md5(time()*rand(175 , 658));
    }

    spl_autoload_register(function ($class) {
        if(file_exists('../app/core/'.$class.'.class.php')) {
            include "../app/core/".$class.'.class.php';
        }
        elseif (file_exists('../app/models/'.$class.'.class.php')) {
            include "../app/models/".$class.'.class.php';
        }
    });

    $route = new Routing();
