<?php
class ThemeController{

    public function indexAction() {

        $view = new View('theme-list');
        $view->setTemplate('backoffice');

        $mTheme = new Theme();
        $list_template = $mTheme->getall();
        $view->assign('list_template'  , $list_template);
    }

    public function selectAction ($id){



        if (empty($id)) {

            header('Location: /theme');
        }

        else {
            
            $user = new User();

            $user = $user->populate(['id' => $id]);

            die();

            $theme = $theme->populate(['id' => $id]);

            echo $theme->getName();
            die();

            if($theme) {



                $_SESSION['theme'] = $theme->getName();

                $messsages [] = "Votre theme a bien ete seletionné";
                $_SESSION["messages"] = $messsages;

            }

            else {

                $messsages [] = "Ce theme n'existe pas ";
                $_SESSION["messages"] = $messsages;

            }

            header('Location: /theme');

        }
    }

}