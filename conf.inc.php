<?php

    define("DS" , DIRECTORY_SEPARATOR);
    define("BASE_PATH" , "/");
    define("BASE_PATH_PATTERN" , "\/ASAT\/");

    // Database

    define("DATABASE", 'asat-cms');
    define("USERDB", 'root');
    define("PASSDB", 'Tharshan');
    define("DBHOST", 'localhost');
    define("DBPORT", '3306');

    // Email

    define("HOSTMAIL", 'localhost');
    define("USERMAIL", null);
    define("PASSMAIL", null);
    define("PORTMAIL", 1025);

    // User status

    define("NON_ACTIVE", "0");
    define("ACTIVE", "1");
    define("BANI", "2");

    const STATUS = array( 0 => "Non active" , 1 => "Active" , 2 => "Bani");

    // User permission

    define("ADMIN", 1);
    define("MODERATEUR", 2);
    define("CLIENT", 0);

    const ROLE = array( 1 => "Admin" , 2 => "Moderateur");

    // Category repas

    const REPAS_CATEGORIES = array( 1 => "Entree" , 2 => "Plat" , 3 => "Dessert");