<?php
class SettingController{

    public function indexAction(){

        self::checkadmin();

        $view = new View('setting-index');
        $view->setTemplate('backoffice');

        // Recuperation des reglages du site

        $setting = new Settings();
        $list_setting = $setting->getall();
        $view->assign('list_setting'  , $list_setting);
        
    }

    public function editAction() {

        self::checkadmin();
    }

    private function checkadmin () {

        if (!isset($_SESSION['user']['id'])){

            header("Location: /user/login");
            exit(0);
        }
    }
    
}