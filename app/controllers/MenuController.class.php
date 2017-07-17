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

        $entre = new Repas();
        $plat = new Repas();
        $dessert = new Repas();
        
        $list_entre = $entre->getallBy(['category' => 1]);
        $view->assign('list_entre'  , $list_entre);

        $list_plat = $plat->getallBy(['category' => 2]);
        $view->assign('list_plat'  , $list_plat);

        $list_dessert = $dessert->getallBy(['category' => 3]);
        $view->assign('list_dessert'  , $list_dessert);
  
    }
    
    private function checkadmin () {


        return true;
    }
}
