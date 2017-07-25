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

        self::checkadmin();

        if ($_POST) {

            $repas = new Repas();

            if ($repas->validate($_POST)) {

                // Ajout

                $repas->setId(-1);
                $repas->setNom($_POST["nom"]);
                $repas->setCategory($_POST["category"]);
                $repas->save();

                $_SESSION["flash"]["type"] = "success";
                $_SESSION["flash"]["message"] = "Le repas a bien été ajouté";

                header('Location: /repas');
                exit(0);
            }
            
            else {

                $_SESSION["flash"]["type"] = "error";
                $_SESSION["flash"]["message"] = "Champs invalide";

                header('Location: /repas/add');
                exit(0);
            }

        }

        else {

            $view = new View('repas-add');
            $view->setTemplate('backoffice');
        }
    }

    public function updateAction ($params) {

        self::checkadmin();

        if (!isset($params[0])) {
            header('Location: /inaccesible');
            exit(0);
        }

        $id = $params[0];

        $mRepas = new Repas();

        // Partie vue

        if($mRepas->populate(["id"=> $id])) {

            $view = new View('repas-update');
            $view->setTemplate('backoffice');

            $repas = $mRepas->getallBy(['id' => $id]);
            $view->assign('repas'  , $repas);
        }

        else {

            header('Location: /inaccesible');
            exit(0);
        }

        // Partie POST

        if ($_POST) {

            if($mRepas->populate(["id"=> $_POST['id']])) {

                if ($mRepas->validate($_POST)) {
                    
                    $mRepas->setId(intval($_POST['id']));
                    $mRepas->setNom($_POST["nom"]);
                    $mRepas->setCategory(intval($_POST['category']));

                    $mRepas->save();

                    $_SESSION["flash"]["type"] = "success";
                    $_SESSION["flash"]["message"] = "Le repas a bien été modifié";

                }

                else {

                    $_SESSION["flash"]["type"] = "error";
                    $_SESSION["flash"]["message"] = "Champs invalides";

                    header('Location: /repas/update/' .$_POST['id']);
                    exit(0);

                }

            }

            else {

                header('Location: /inaccesible');
                exit(0);
            }

            header('Location: /repas');
            exit(0);

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

        if ( !isset($params[0]) || !isset($params[1]) || $_SESSION['tokenCRSF'] != $params[1] ) {
            header('Location: /inaccesible');
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