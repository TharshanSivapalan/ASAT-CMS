<?php

    define("DS" , DIRECTORY_SEPARATOR);
    define("BASE_PATH" , "/");
    define("BASE_PATH_PATTERN" , "\/ASAT\/");

    // User status

    define("NON_ACTIVE", "0");
    define("ACTIVE", "1");
    define("BANI", "2");

    // Category repas

    const REPAS_CATEGORIES = array( 1 => "Entree" , 2 => "Plat" , 3 => "Dessert");

	//DATABASE
	define('DATABASE', 'asat-cms'); 
	define('USERDB', 'root'); 
	define('PASSDB', 'root'); 
	define('DBHOST', 'localhost');
	define('DBPORT', '3306');

	//EMAIL
	define('HOSTMAIL', 'smtp.gmail.com'); 
	define('USERMAIL', 'noreply@asat-cms.com'); 
	define('PASSMAIL', 'adminadmin'); 
	define('PORTMAIL', '587');