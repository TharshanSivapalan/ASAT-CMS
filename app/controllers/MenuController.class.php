<?php
class MenuController {

    public function indexAction() {

        self::checkadmin();

        $view = new View('menu-list');
        $view->setTemplate('backoffice');

        $mMenu = new Menu();
        
        $list_menu = $mMenu->getall();
        $view->assign('list_menu'  , $list_menu);
    }

    public function addAction () {

        self::checkadmin();
        
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


        $error = false;

        if ($_POST) {

                if(
                !empty($_POST['nom']) && 
                !empty($_POST['prix']) ) {

                } else {
                    $messsages [] = "Veuillez remplir tous les champs !";
                    $error = true;
                }

                $menu = new Menu();

                if($_POST['description'] != "") {
                    $menu->setDescription($_POST["description"]);
                }

                if(!empty($_POST['image'])) {
                    $menu->setImage($_POST["image"]);
                }

                if(!empty($_POST['entre'])) {
                    $menu->setEntree($_POST["entre"]);
                }

                if(!empty($_POST['plat'])) {
                    $menu->setPlat($_POST["plat"]);
                }

                if(!empty($_POST['dessert'])) {
                    $menu->setDessert($_POST["dessert"]);
                }

                $menu->setId(-1);
                $menu->setNom($_POST["nom"]);
   
                $menu->setPrix($_POST["prix"]);

                var_dump($menu);

                $menu->save();
        }


        if($error) {
            $_SESSION["messages"] = $messsages;
        }
 

            
  
    }

    private function checkadmin () {

        if (!isset($_SESSION['user']['id'])){

            header("Location: /user/login");
            exit(0);
        }
    }
}
