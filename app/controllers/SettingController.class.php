<?php
class SettingController{

    public function indexAction(){

        $view = new View('setting-index');
        $view->setTemplate('backoffice');

        // Recuperation des reglages du site

        $setting = new Settings();
        $list_setting = $setting->getall();
        $view->assign('list_setting'  , $list_setting);
        
    }

    public function editAction()
    {

    }


    
}