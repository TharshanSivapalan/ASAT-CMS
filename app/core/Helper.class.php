<?php

    class Helper {
        // Permet de vérifier si le fichier conf.inc.php
        // de la racine comporte les mots "DATABASE" - "USERDB" - "PASSDB" - "DBHOST" - "DBPORT"
        public static function checkConfig($result = false){
        	$sql = file_get_contents("../conf.inc.php");
        	if(strpos($sql, "DATABASE") && strpos($sql, "USERDB") && strpos($sql, "PASSDB") && strpos($sql, "DBHOST") && strpos($sql, "DBPORT")){
        		$result = true;
        	}
        	return $result;
        }

        // Ajout de nouveau visiteur dans les stats
        public static function statistique(){
        	$stats = new Statistique();
        	// Vérification si un utilisateur de la même adresse IP a visité la même page
        	// Si non - ajout dans la base de données
	        if($stats->populate(['ip' => $_SERVER['REMOTE_ADDR'], 'page_courante' => $_SERVER["REQUEST_URI"]]) === false){
	            $stats->setId();
	            $stats->setIp();
	            $stats->setPageCourante();
	            $stats->setDateCourante();
	            $stats->setNavigateur();
	            $stats->save();
	        }else{
	        	// Si oui - vérifier si la visite date de plus de 1h
	        	// Si oui - ajout dans la base de données
	            $stats = $stats->getallBy(['ip' => $_SERVER['REMOTE_ADDR'], 'page_courante' => $_SERVER["REQUEST_URI"]]);
	            $stats = end($stats);
	            $date = new DateTime($stats['date_courante']);
	            $datenow = new DateTime();
	            if($date->diff($datenow)->format('%h') > 0){
	                $stats = new Statistique();
	                $stats->setId();
	                $stats->setIp();
	                $stats->setPageCourante();
	                $stats->setDateCourante();
	                $stats->setNavigateur();
	                $stats->save();
	            }
	        }
        }
        
    }