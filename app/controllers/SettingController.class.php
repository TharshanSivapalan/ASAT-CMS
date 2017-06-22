<?php
class SettingController{

    public function indexAction(){

        $view = new View('setting-index');
        $view->setTemplate('backoffice');
        
    }

    public function templateAction (){

        $view = new View('setting-template');
        $view->setTemplate('backoffice');

    }

}