<?php
class RepasController
{

    public function indexAction() {

        if (self::checkadmin()) {

            $view = new View('repas-list');
            $view->setTemplate('backoffice');
        }


        else {

            header('Location: /user/login');
        }



    }

    public function addAction () {

        $error = false;

        if (self::checkadmin()) {

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

        else {

            header('Location: /user/login');
        }

    }

    private function checkadmin () {

        return true;
    }
}