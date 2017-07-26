<?php
class ThemeController{

    public function indexAction() {

        self::checkadmin();

        $view = new View('theme-list');
        $view->setTemplate('backoffice');

        $mTheme = new Theme();
        $list_template = $mTheme->getall();
        $view->assign('list_template'  , $list_template);
    }

    public function selectAction ($id){

        self::checkadmin();
        
        if (empty($id)) {

            header('Location: /theme');
        }

        else {
            $mTheme = new Theme();

            if($mTheme->populate(["id"=> intval($id[0]) ])) {


                $mTheme->setId(intval($id[0]));
                $mTheme->setStatus(1);
                $mTheme->resetToNull(['statut' => 0]);
                $mTheme->updateOneBy(['statut' => 1,'id' => $id[0]]);

                header('Location: /theme');

            } else {
                header('Location: /inaccessible');
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