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

            if(!empty($menu['entree'])) {
                $menu['entree'] = $entree->getNom();
            }
            if(!empty($menu['plat'])) {
                $menu['plat'] = $plat->getNom();
            }
            if(!empty($menu['dessert'])) {
                $menu['dessert'] = $dessert->getNom();
            }    
                
                
        }
        
        $view->assign('list_menu'  , $list_menu);
    }

    public function addAction () {

        self::checkadmin();
        
        $viewToShow = "";


        $error = false;
        

        if ($_POST &&
            isset($_POST['nom'])   &&  
            isset($_POST['prix'])   && 
            isset($_POST['description'])  &&  
            isset($_POST['entre'])  &&
            isset($_POST['plat'])   &&
            isset($_POST['dessert'])) {

                $id = $_POST['id'];
                $nom = $_POST['nom'];
                $prix = $_POST['prix'];
                $description = $_POST['description'];
                $entre = $_POST['entre'];
                $plat = $_POST['plat'];
                $dessert = $_POST['dessert'];

                $menu = new Menu();

                if(empty($nom)) {
                    $messsages [] = "Veuillez renseigner le nom du menu !";
                    $error = true;
                } else {
                    $menu->setNom($nom);
                }

                if(empty($prix) ) {
                    $messsages [] = "Veuillez renseigner le prix du menu !";
                    $error = true;
                } else {
                    $menu->setPrix($prix);
                }

                

                if(!empty($description)) {
                    $menu->setDescription($description);
                }

            
                if(!empty($entre)) {
                    $menu->setEntree($entre);
                }

                if(!empty($plat)) {
                    $menu->setPlat($plat);
                }

                if(!empty($dessert)) {
                    $menu->setDessert($dessert);
                }

                
                 
                


                if(!empty($_FILES['image']['name'])){
                    $image = $_FILES['image'];
                    self::addImage($image ,  $menu);
                }

                if(!$error) {
                    $viewToShow = "list";
                    $menu->setId(-1);
                    $menu->save();
                }

                
        }

        if($_POST && $viewToShow == "list") {
            header('Location: /menu');
        }

        $view = new View('menu-add');
        $view->setTemplate('backoffice');

        $entre = new Repas();
        $plat = new Repas();
        $dessert = new Repas();
        
        $list_entre = $entre->getallBy(['category' => 1]);
        $view->assign('list_entre'  , $list_entre);

        $list_plat = $plat->getallBy(['category' => 2]);
        $view->assign('list_plat'  , $list_plat);

        $list_dessert = $dessert->getallBy(['category' => 3]);
        $view->assign('list_dessert'  , $list_dessert);


        


        if($error) {
            $_SESSION["messages"] = $messsages;
        }
 

            
  
    }

    public function deleteAction () {

        self::checkadmin();
        


        $confirm = false;

        if ($_POST) {
            $menu = new Menu();

            if($menu->deleteBy(["id"=>$_POST['id']])) {
                $messsages [] = "Le menu a bien été supprimé !";
                $confirm = true;
            }
        }

        if($confirm) {
            $_SESSION["messages"] = $messsages;
        }
        
        header('Location: /menu');

        
    }



     public function updateAction () {

        self::checkadmin();
        

        $error = false;

        if ($_POST ) {

            $mMenu = new Menu();
            $view = new View('menu-update');

            if (!empty($_POST['id']) ) {

                if($mMenu->populate(["id"=>$_POST["id"]])) {
                    
                    self::assignement($mMenu, $view);

                } else {
                    header('Location: /inaccessible');
                }

            }

            if (
                    !empty($_POST['id']) &&
                    isset($_POST['nom'])   &&  
                    isset($_POST['prix'])   && 
                    isset($_POST['description'])  &&  
                    isset($_POST['entre'])  &&
                    isset($_POST['plat'])   &&
                    isset($_POST['dessert'])) {


                    $id = $_POST['id'];
                    $nom = $_POST['nom'];
                    $prix = $_POST['prix'];
                    $description = $_POST['description'];
                    $entre = $_POST['entre'];
                    $plat = $_POST['plat'];
                    $dessert = $_POST['dessert'];

                    if(empty($_POST['nom'])) {
                        $messsages [] = "Veuillez renseigner le nom du menu !";
                        $error = true;
                    } else {
                        $mMenu->setNom($nom); 
                    }

                    if(empty($_POST['prix']) ) {
                        $messsages [] = "Veuillez renseigner le prix du menu !";
                        $error = true;
                    } else {
                        $mMenu->setPrix($prix);
                    }


                    if(!empty($description)) {
                        $mMenu->setDescription($_POST["description"]);
                    }

                    if(!empty($entre)) {
                        $mMenu->setEntree($_POST["entre"]);
                    }

                    if(!empty($plat)) {
                        $mMenu->setPlat($_POST["plat"]);
                    }

                    if(!empty($dessert)) {
                        $mMenu->setDessert($_POST["dessert"]);
                    }

                    
                    
                    


                    if(!empty($_FILES['image']['name'])){
                        $image = $_FILES['image'];
                        self::addImage($image ,  $mMenu);
                    }

                    if(!$error) {
                        $mMenu->setId($id);
                        $mMenu->save();
                        self::assignement($mMenu, $view);
                    }
            } 

        } 

       else {
            header('Location: /inaccessible');
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


    private function addImage ($image , $menu, $error = false) {

            $ImgExtensionAuthorized = ["png","jpg","jpeg","gif"];
            $ImgMaxSize = 10000000;

            if( $image["error"]==0 ){

                $infoImg = pathinfo($image["name"]);

                if( !in_array( strtolower($infoImg["extension"]), $ImgExtensionAuthorized) ){
                    $messsages [] = "Mauvaise extension pour le image";
                    $error = true;
                }

                if($image["size"]>$ImgMaxSize){
                    $messsages [] = "Le image est trop lourd";
                    $error = true;
                }

                if(!$error) {
                    $uploadPath = dirname(__DIR__).DS."upload".DS."illustration";
                    if( !file_exists($uploadPath) ){
                        mkdir($uploadPath);
                    }
                    $nameImg = uniqid().".".strtolower($infoImg["extension"]);
                    if(!move_uploaded_file($image["tmp_name"], $uploadPath.DS.$nameImg)){
                            $messsages [] = "Dossier d'upload contenant une erreur";
                            $error = true;
                    }

                    if(!$error) {
                        $menu->setImage($nameImg);
                    }
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
