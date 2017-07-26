<?php

    class Helper {
        
        public static function checkConfig($result = false){
        	$sql = file_get_contents("../conf.inc.php");
        	if(strpos($sql, "DATABASE") && strpos($sql, "USERDB") && strpos($sql, "PASSDB") && strpos($sql, "DBHOST") && strpos($sql, "DBPORT")){
        		$result = true;
        	}
        	return $result;
        }

        public static function statistique(){
        	$stats = new Statistique();
	        if($stats->populate(['ip' => $_SERVER['REMOTE_ADDR'], 'page_courante' => $_SERVER["REQUEST_URI"]]) === false){
	            $stats->setId();
	            $stats->setIp();
	            $stats->setPageCourante();
	            $stats->setDateCourante();
	            $stats->setNavigateur();
	            $stats->save();
	        }else{
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