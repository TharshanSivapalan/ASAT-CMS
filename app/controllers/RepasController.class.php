<?php

class RepasController {

    public function indexAction() {

            self::checkadmin();

            $view = new View('repas-list');
            $view->setTemplate('backoffice');

            $mRepas = new Repas();

            $list_repas = $mRepas->getall();
            $view->assign('list_repas'  , $list_repas);

    }

    public function addAction () {

        $error = false;

        self::checkadmin();

            if ($_POST) {

                if(count($_POST) == 3 &&
                !empty($_POST['nom']) &&  
                !empty($_POST['category'])) {

                } else {
                    $messsages [] = "Veuillez remplir tous les champs !";
                    $error = true;
                }

                $repas = new Repas();

                $repas->setId(-1);
                $repas->setNom($_POST["nom"]);
                $repas->setCategory($_POST["category"]);

                $repas->save();
            }


            if($error) {
                $_SESSION["messages"] = $messsages;
            }
            
            $view = new View('repas-add');
            $view->setTemplate('backoffice');

        }

    private function checkadmin () {

        if (!isset($_SESSION['user']['id'])){

            header("Location: /user/login");
            exit(0);
        }
    }
}