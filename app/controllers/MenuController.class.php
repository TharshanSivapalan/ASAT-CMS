<?php
class MenuController {

    public function indexAction()
    {

        self::checkadmin();

        $view = new View('menu-list');
        $view->setTemplate('backoffice');

        $mMenu = new Menu();
        
        $list_menu = $mMenu->getall();
        $view->assign('list_menu'  , $list_menu);

    }

    public function addAction () {
        
        $view = new View('menu-add');
        $view->setTemplate('backoffice');
        
    }
    
    private function checkadmin () {


        return true;
    }
}
