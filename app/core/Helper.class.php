<?php

    class Helper {
        
        public static function checkConfig($result = false){
        	$sql = file_get_contents("../conf.inc.php");
        	if(strpos($sql, "DATABASE") && strpos($sql, "USERDB") && strpos($sql, "PASSDB") && strpos($sql, "DBHOST") && strpos($sql, "DBPORT")){
        		$result = true;
        	}
        	return $result;
        }
        
    }