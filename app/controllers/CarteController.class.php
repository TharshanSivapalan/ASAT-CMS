<?php
class CarteController
{

    public function indexAction() {

            self::checkadmin();

            $view = new View('carte');

            // Recuperation des reglages du site

            $setting = new Settings();
            $list_setting = $setting->getall();
            $view->assign('list_setting'  , $list_setting);

            // Recuperation des menus

            $menu = new Menu();
            $list_menu = $menu->getall();
            $view->assign('list_menu'  , $list_menu);
    }


        private function checkadmin () {

            if (!isset($_SESSION['user']['id'])){

                header("Location: /user/login");
                exit(0);
            }
        }
}