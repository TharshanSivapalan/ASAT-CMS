<?php
class SettingController{

    public function indexAction(){

        $view = new View('setting-index');
        $view->setTemplate('backoffice');
        
    }
    
}