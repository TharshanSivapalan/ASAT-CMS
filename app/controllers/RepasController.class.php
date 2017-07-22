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
        $viewToShow = '';

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

                
                

                

                if(!$error ) {
                    $viewToShow = "list";
                    $repas->setId(-1);
                    $repas->setNom($_POST["nom"]);
                    $repas->setCategory($_POST["category"]);
                    $repas->save();
                }
            }


            if($viewToShow == "list") {
                header('Location: /repas');
            }
            
            $view = new View('repas-add');
            $view->setTemplate('backoffice');

            if($error ) {
                $_SESSION["messages"] = $messsages;
            }

    }

    public function updateAction () {

        self::checkadmin();
        

        $error = false;

        if ($_POST) {

            $mRepas = new Repas();
            $view = new View('repas-update');


            if (!empty($_POST['id']) ) {

                if($mRepas->populate(["id"=>$_POST["id"]])) {

                    self::assignement($mRepas, $view);

                } else {
                    header('Location: /inaccessible');
                }

            }

            if (!empty($_POST['category']) && 
                !empty($_POST['nom']) && 
                !empty($_POST['id']) ) {


                $mRepas->setId(intval($_POST['id']));
                $mRepas->setNom($_POST["nom"]);
                $mRepas->setCategory(intval($_POST['category']));

                $mRepas->save();
                self::assignement($mRepas, $view);

            } else {
                    $messsages [] = "Veuillez remplir tous les champs !";
                    $error = true;
            }

        } else {
            header('Location: /inaccessible');
        }


        if($error) {
            $_SESSION["messages"] = $messsages;
        }

    }

    private function assignement($mRepas, $view) {

            $view->setTemplate('backoffice');

            $mRepas = new Repas();

            $repas = $mRepas->getallBy(['id' => $_POST['id']]);
            $view->assign('repas'  , $repas);
    }


    public function deleteAction ($params) {

        self::checkadmin();

        if (empty($params[0])) {
            header('Location: /inaccesible1');
            exit(0);
        }

        $id = $params[0];

        // On verifie si le menu existe

        $mRepas = new Repas();

        if($mRepas->populate(["id"=> $id])) {

            $mRepas->deleteBy(["id"=>$id]);
            $_SESSION["flash"]["type"] = "success";
            $_SESSION["flash"]["message"] = "Le repas a bien été supprimé";
        }

        else {

            header('Location: /inaccesible2');
            exit(0);
        }

        header('Location: /repas');

    }

    private function checkadmin () {

        if (!isset($_SESSION['user']['id'])){

            header("Location: /user/login");
            exit(0);
        }
    }
}