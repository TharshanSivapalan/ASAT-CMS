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
            
            header('Location: /theme');

        }
    }

    private function checkadmin () {

        if (!isset($_SESSION['user']['id'])){

            header("Location: /user/login");
            exit(0);
        }
    }

}