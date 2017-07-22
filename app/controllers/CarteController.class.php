<?php
class CarteController
{

    public function indexAction() {

            self::checkadmin();

            $theme = new Theme();
            $theme = $theme->populate(['statut' => 1]);

            $view = new View('carte');
            $view->setTemplate($theme->getName());
            $view->assign('theme_name', $theme->getName());

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