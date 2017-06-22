<?php
class MenuController {

    public function indexAction()
    {

        self::checkadmin();

        $view = new View('menu-list');
        $view->setTemplate('backoffice');

    }

    public function addAction () {
        
        $view = new View('menu-add');
        $view->setTemplate('backoffice');
        
    }
    
    private function checkadmin () {


        return true;
    }
}
