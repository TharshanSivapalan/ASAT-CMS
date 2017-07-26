<?php
class SettingController{

    public function indexAction(){

        self::checkadmin();

        if (
            $_POST && 
            isset($_POST['nom_site']) && 
            isset($_POST['iframe']) && 
            isset($_POST['slogan']) && 
            isset($_FILES['logo']) && 
            isset($_POST['pays']) && 
            isset($_POST['adresse']) && 
            isset($_POST['ville']) && 
            isset($_POST['codepostal']) && 
            isset($_POST['telephone']) && 
            isset($_POST['itineraire']) && 
            isset($_POST['email']) &&
            (count($_POST)==11)
        ) {

            $error = false;

            


            $name = $_POST['nom_site'] ;
            $iframe = trim($_POST['iframe']);
            $slogan = $_POST['slogan'] ;
            $pays = $_POST['pays'] ;
            $adresse = $_POST['adresse'] ;
            $ville = $_POST['ville'] ;
            $codepostal = $_POST['codepostal'] ;
            $tel = $_POST['telephone'] ;
            $itineraire = $_POST['itineraire'] ;
            $email = $_POST['email'] ;

           
            $mSettings = new Settings();


            if(!empty($name)){
                $mSettings->updateOneBy([
                'id' => 1, 
                'valeur' => $name]);
            } 

            if(!empty($slogan)){
                $mSettings->updateOneBy([
                'id' => 2, 
                'valeur' => $slogan]);
            } 

            if(!empty($iframe)){
                if(!preg_match("#^https?\:\/\/(www\.)?google\.(com|fr|de)\/maps\b# ", $iframe)) {
                    $messsages [] = "Le lien de l'iframe est invalide ! ";
                    $error = true;
                } else {
                    $mSettings->updateOneBy([
                    'id' => 4, 
                    'valeur' => $iframe]);
                }  
            }

            if(!empty($pays)){            
                $mSettings->updateOneBy([
                'id' => 5, 
                'valeur' => $pays]);
            }

            if(!empty($ville)){
                $mSettings->updateOneBy([
                'id' => 6, 
                'valeur' => $ville]);
            }

            if(!empty($adresse)){
                $mSettings->updateOneBy([
                'id' => 7, 
                'valeur' => $adresse]);
            }

            if(!empty($codepostal)){
                if(!preg_match("#^[0-9]+$# ", $codepostal)) {
                    $messsages [] = "Code postal invalide !";
                    $error = true;
                } else {
                    $mSettings->updateOneBy([
                    'id' => 9, 
                    'valeur' => $codepostal]);
                }
            }

            if(!empty($tel)){
                // Numéro francais et international
                if(!preg_match("#^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$#", $tel)){
                    $messsages [] = "Numéro de téléphone invalide !";
                    $error = true; 
                } else {
                    $mSettings->updateOneBy([
                    'id' => 10, 
                    'valeur' => $tel]);
                }
                
            }

            if(!empty($email)){
                if( !filter_var($email, FILTER_VALIDATE_EMAIL)  ){
                    $messsages [] = "Email invalide !";
                    $error = true;                
                }else {
                    $mSettings->updateOneBy([
                    'id' => 11, 
                    'valeur' => $email]);
                }
            }

            if(!empty($itineraire)){
            $mSettings->updateOneBy([
                'id' => 12, 
                'valeur' => $itineraire]);
            }
            
            if(!empty($_FILES['logo']['name'])){
                
                $LogoExtensionAuthorized = ["png","jpg","jpeg","gif"];
                $LogoMaxSize = 10000000;

                if( $_FILES["logo"]["error"]==0 ){

                    $infoLogo = pathinfo($_FILES["logo"]["name"]);

                    if( !in_array( strtolower($infoLogo["extension"]), $LogoExtensionAuthorized) ){
                        $messsages [] = "Mauvaise extension pour le logo";
                        $error = true;
                    }

                    if($_FILES["logo"]["size"]>$LogoMaxSize){
                        $messsages [] = "Le logo est trop lourd";
                        $error = true;
                    }

                    if(!$error) {
                        $uploadPath = dirname(dirname(dirname(__FILE__))).DS."public".DS."img".DS."Logo";
           
                        if( !file_exists($uploadPath) ){
                            mkdir($uploadPath);
                        }
                        $nameLogo = uniqid().".".strtolower($infoLogo["extension"]);
                        if(!move_uploaded_file($_FILES["logo"]["tmp_name"], $uploadPath.DS.$nameLogo)){
                                $messsages [] = "Dossier d'upload contenant une erreur";
                                $error = true;
                        }

                        if(!$error) {
                            $mSettings->updateOneBy([
                            'id' => 3, 
                            'valeur' => $nameLogo]);
                        }
                    }

                }else{
                    $error = true;
                    switch ($_FILES["logo"]["error"]) { 
                        case UPLOAD_ERR_INI_SIZE: 
                            $messsages [] = "Erreur upload server";                        
                            break; 
                        case UPLOAD_ERR_FORM_SIZE: 
                            $messsages [] = "Erreur upload server";                        
                            break; 
                        case UPLOAD_ERR_PARTIAL: 
                            $messsages [] = "Erreur upload server";                        
                            break; 
                        case UPLOAD_ERR_NO_FILE: 
                            $messsages [] = "Erreur upload server";                        
                            break; 
                        case UPLOAD_ERR_NO_TMP_DIR: 
                            $messsages [] = "Erreur upload server";                        
                            break; 
                        case UPLOAD_ERR_CANT_WRITE: 
                            $messsages [] = "Erreur upload server";                        
                            break; 
                        case UPLOAD_ERR_EXTENSION: 
                            $messsages [] = "Erreur upload server";                        
                            break; 
                        default: 
                            $messsages [] = "Erreur upload server";                        
                            break;
                    }
                }
            }


            if($error ) {
                $_SESSION["messages"] = $messsages;
            }
        }

       
        $view = new View('setting-index');
        $view->setTemplate('backoffice');

        // Recuperation des reglages du site

        $setting = new Settings();
        $list_setting = $setting->getall();
        $view->assign('list_setting'  , $list_setting);
        
    }

    public function editAction() {

        self::checkadmin();
    }



    private function checkadmin () {

        if (!isset($_SESSION['user']['id_groupe_user']) || $_SESSION['user']['id_groupe_user'] !=  ADMIN){

            header("Location: /user/login");
            exit(0);
        }
    }
    
}