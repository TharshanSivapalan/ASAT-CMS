<?php
class MenuController {

    public function indexAction() {

        self::checkadmin();

        $view = new View('menu-list');
        $view->setTemplate('backoffice');

        $mMenu = new Menu();
        $mrepas = new Repas();

        $list_menu = $mMenu->getall();

        // Recuperation des nom des repas pour chaque menu


        foreach ($list_menu as &$menu) {

            $entree = $mrepas->populate(['id' => $menu['entree']]);
            $plat = $mrepas->populate(['id' => $menu['plat']]);
            $dessert = $mrepas->populate(['id' => $menu['dessert']]);

            // Recuperation entree

            if ($entree){
                if(!empty($menu['entree'])) {
                    $menu['entree'] = $entree->getNom();
                }
            }

            else {

                $menu['entree'] = 'Aucun';
            }

            // Recuperation plat


            if ($plat){

                if(!empty($menu['plat'])) {
                    $menu['plat'] = $plat->getNom();
                }
            }

            else {

                $menu['plat'] = 'Aucun';
            }

            // Recuperation dessert

            if ($dessert){

                if(!empty($menu['dessert'])) {
                    $menu['dessert'] = $dessert->getNom();
                }
            }

            else {

                $menu['dessert'] = 'Aucun';
            }
                
        }
        
        $view->assign('list_menu'  , $list_menu);
    }

    public function addAction () {

        self::checkadmin();

        $entre = new Repas();
        $plat = new Repas();
        $dessert = new Repas();

        $list_entre = $entre->getallBy(['category' => 1]);
        $list_plat = $plat->getallBy(['category' => 2]);
        $list_dessert = $dessert->getallBy(['category' => 3]);

        if ($_POST) {

            $menu = new Menu();

            if ($menu->validate($_POST)) {

                // Verifier entree , plat , dessert

                // Verification entree

                if (!empty($_POST['entree'])) {

                    $findEntree = false;

                    foreach ($list_entre as $entree) {

                        if ($entree['id'] == $_POST['entree']) {
                            $findEntree = true;
                        }
                    }


                    if (!$findEntree) {

                        $_SESSION["flash"]["type"] = "error";
                        $_SESSION["flash"]["message"] = "entree invalide";

                        header('Location: /menu/add');
                        exit(0);
                    }
                }


                // Verification plat


                if (!empty($_POST['plat'])) {

                    $findPlat = false;

                    foreach ($list_plat as $plat) {

                        if ($plat['id'] == $_POST['plat']) {
                            $findPlat = true;
                        }
                    }

                    if (!$findPlat) {

                        $_SESSION["flash"]["type"] = "error";
                        $_SESSION["flash"]["message"] = "Plat invalide";

                        header('Location: /menu/add');
                        exit(0);
                    }
                }


                // Verification dessert


                if (!empty($_POST['dessert'])) {

                    $findDessert = false;

                    foreach ($list_dessert as $dessert) {

                        if ($dessert['id'] == $_POST['dessert']) {
                            $findDessert = true;
                        }
                    }

                    if (!$findDessert) {

                        $_SESSION["flash"]["type"] = "error";
                        $_SESSION["flash"]["message"] = "dessert invalide";

                        header('Location: /menu/add');
                        exit(0);
                    }
                }

                // Verifier image

                if(!empty($_FILES['image']['name'])){
                    $image = $_FILES['image'];
                    self::addImage($image , $menu);
                }

                $nom = $_POST['nom'];
                $prix = $_POST['prix'];
                $description = $_POST['description'];
                $entre = $_POST['entree'];
                $plat = $_POST['plat'];
                $dessert = $_POST['dessert'];
                $image = $_FILES['image']['name'];


                // Ajout

                $menu->setId(-1);
                $menu->setNom($nom);
                $menu->setDescription($description);
                $menu->setEntree($entre);
                $menu->setPlat($plat);
                $menu->setDessert($dessert);
                $menu->setPrix($prix);
                $menu->save();

                $_SESSION["flash"]["type"] = "success";
                $_SESSION["flash"]["message"] = "Le menu a bien été ajouté";

                header('Location: /menu');
                exit(0);
            }

            else {

                $_SESSION["flash"]["type"] = "error";
                $_SESSION["flash"]["message"] = "Champs invalide";

                header('Location: /menu/add');
                exit(0);
            }

        }

        else {

            $view = new View('menu-add');
            $view->setTemplate('backoffice');

            // Recuperation des repas

            $view->assign('list_entre'  , $list_entre);
            $view->assign('list_plat'  , $list_plat);
            $view->assign('list_dessert'  , $list_dessert);

        }

    }

    public function deleteAction ($params) {

        self::checkadmin();

        if (empty($params[0])) {
            header('Location: /inaccesible');
            exit(0);
        }

        $id = $params[0];

        // On verifie si le menu existe
        
        $mMenu = new Menu();

        if($mMenu->populate(["id"=> $id])) {

            $mMenu->deleteBy(["id"=>$id]);
            $_SESSION["flash"]["type"] = "success";
            $_SESSION["flash"]["message"] = "Le menu a bien été supprimé";
        }

        else {

            header('Location: /inaccesible');
            exit(0);
        }

        header('Location: /menu');

    }



     public function updateAction ($params) {

         if (empty($params[0])) {
             header('Location: /inaccesible');
             exit(0);
         }

         $id = $params[0];

         $mMenu = new Menu();

         $entre = new Repas();
         $plat = new Repas();
         $dessert = new Repas();

         $list_entre = $entre->getallBy(['category' => 1]);
         $list_plat = $plat->getallBy(['category' => 2]);
         $list_dessert = $dessert->getallBy(['category' => 3]);

         // Partie vue

         if($mMenu->populate(["id"=> $id])) {

             $view = new View('menu-update');
             $view->setTemplate('backoffice');

             $menu = $mMenu->getallBy(['id' => $id]);
             $view->assign('menu'  , $menu);

             $view->assign('list_entre'  , $list_entre);
             $view->assign('list_plat'  , $list_plat);
             $view->assign('list_dessert'  , $list_dessert);
         }

         else {

             header('Location: /inaccesible');
             exit(0);
         }

         // Partie POST

         if ($_POST) {

             if($mMenu->populate(["id"=> $_POST['id']])) {

                 if ($mMenu->validate($_POST)) {

                     // Verifier entree , plat , dessert

                     // Verification entree

                     if (!empty($_POST['entree'])) {

                         $findEntree = false;

                         foreach ($list_entre as $entree) {

                             if ($entree['id'] == $_POST['entree']) {
                                 $findEntree = true;
                             }
                         }


                         if (!$findEntree) {

                             $_SESSION["flash"]["type"] = "error";
                             $_SESSION["flash"]["message"] = "Entree invalide";

                             header('Location: /menu/add');
                             exit(0);
                         }
                     }


                     // Verification plat


                     if (!empty($_POST['plat'])) {

                         $findPlat = false;

                         foreach ($list_plat as $plat) {

                             if ($plat['id'] == $_POST['plat']) {
                                 $findPlat = true;
                             }
                         }

                         if (!$findPlat) {

                             $_SESSION["flash"]["type"] = "error";
                             $_SESSION["flash"]["message"] = "Plat invalide";

                             header('Location: /menu/add');
                             exit(0);
                         }
                     }


                     // Verification dessert


                     if (!empty($_POST['dessert'])) {

                         $findDessert = false;

                         foreach ($list_dessert as $dessert) {

                             if ($dessert['id'] == $_POST['dessert']) {
                                 $findDessert = true;
                             }
                         }

                         if (!$findDessert) {

                             $_SESSION["flash"]["type"] = "error";
                             $_SESSION["flash"]["message"] = "Dessert invalide";

                             header('Location: /menu/add');
                             exit(0);
                         }
                     }

                     // Verifier image

                     if(!empty($_FILES['image']['name'])){
                         $image = $_FILES['image'];
                         self::addImage($image , $menu);
                     }
                     
                     $nom = $_POST['nom'];
                     $prix = $_POST['prix'];
                     $description = $_POST['description'];
                     $entre = $_POST['entree'];
                     $plat = $_POST['plat'];
                     $dessert = $_POST['dessert'];
                     
                     // Modification

                     $mMenu->setId(intval($_POST['id']));
                     $mMenu->setNom($nom);
                     $mMenu->setDescription($description);
                     $mMenu->setEntree($entre);
                     $mMenu->setPlat($plat);
                     $mMenu->setDessert($dessert);
                     $mMenu->setPrix($prix);
                     $mMenu->save();

                     $_SESSION["flash"]["type"] = "success";
                     $_SESSION["flash"]["message"] = "Le menu a bien été modifié";

                 }

                 else {

                     $_SESSION["flash"]["type"] = "error";
                     $_SESSION["flash"]["message"] = "Champs invalides";

                     header('Location: /menu/update/' .$_POST['id']);
                     exit(0);

                 }

             }

             else {

                 header('Location: /inaccesible');
                 exit(0);
             }

             header('Location: /menu');
             exit(0);

         }
    }


    private function assignement($mMenu, $view) {
            
            $view->setTemplate('backoffice');

            $menu = $mMenu->getallBy(['id' => $_POST['id']]);
            $view->assign('menu'  , $menu);

            $entre = new Repas();
            $plat = new Repas();
            $dessert = new Repas();
            
            $list_entre = $entre->getallBy(['category' => 1]);
            $view->assign('list_entre'  , $list_entre);

            $list_plat = $plat->getallBy(['category' => 2]);
            $view->assign('list_plat'  , $list_plat);

            $list_dessert = $dessert->getallBy(['category' => 3]);
            $view->assign('list_dessert'  , $list_dessert);
    }


    public function presentationAction($id) {

        $theme = new Theme();
        $theme = $theme->populate(['statut' => 1]);


        $view = new View('menu-presentation');
        $view->setTemplate('theme'.$theme->getId());
        $view->assign('theme_id', $theme->getId());

        $mMenu = new Menu();
        $mrepas = new Repas();


        if (empty($id)) {

            header('Location: /inaccessible');
        }else {
                $mMenu = new Menu();

                if($mMenu->populate(["id"=> intval($id[0]) ])) {


                    

                    $view->assign('mMenu'  , $mMenu);  

                    // Recuperation des reglages du site

                    $setting = new Settings();
                    $list_setting = $setting->getall();
                    $view->assign('list_setting'  , $list_setting);


                    



                } else {
                    header('Location: /inaccessible');
                }

        }
    }


    private function addImage ($image , $menu) {

            $ImgExtensionAuthorized = ["png","jpg","jpeg","gif"];
            $ImgMaxSize = 10000000;

            if( $image["error"]==0 ){

                $infoImg = pathinfo($image["name"]);

                if( !in_array( strtolower($infoImg["extension"]), $ImgExtensionAuthorized) ){
                    $_SESSION["flash"]["type"] = "error";
                    $_SESSION["flash"]["message"] = "Extension invalide";

                    header('Location: /menu/add');
                    exit(0);
                }

                if($image["size"]>$ImgMaxSize){
                    $_SESSION["flash"]["type"] = "error";
                    $_SESSION["flash"]["message"] = "Image trop grande";

                    header('Location: /menu/add');
                    exit(0);
                }


                // Pas d'erreur

                    $uploadPath = dirname(dirname(dirname(__FILE__))).DS."public".DS."img".DS."Menus";
                    if( !file_exists($uploadPath) ){
                        mkdir($uploadPath);
                    }
                    $nameImg = uniqid().".".strtolower($infoImg["extension"]);
                    if(!move_uploaded_file($image["tmp_name"], $uploadPath.DS.$nameImg)){

                        $_SESSION["flash"]["type"] = "error";
                        $_SESSION["flash"]["message"] = "Dossier d'upload contenant une erreur";

                        header('Location: /menu/add');
                        exit(0);
                    }

                    else {

                        $menu->setImage($nameImg);
                    }

            }else{
                $error = true;
                switch ($image["error"]) { 
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

    private function checkadmin () {

        if (!isset($_SESSION['user']['id'])){

            header("Location: /user/login");
            exit(0);
        }
    }
}
