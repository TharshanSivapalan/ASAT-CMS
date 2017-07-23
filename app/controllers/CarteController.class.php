<?php
class CarteController
{

    public function indexAction() {

            self::checkadmin();

            // Recuperation du template actif

            $theme = new Theme();
            $theme = $theme->populate(['statut' => 1]);

            $view = new View('carte');
            $view->setTemplate('theme'.$theme->getId());
            $view->assign('theme_id', $theme->getId());

            // Recuperation des reglages du site

            $setting = new Settings();
            $list_setting = $setting->getall();
            $view->assign('list_setting'  , $list_setting);


            // Recuperation des menus avec les repas

            $menu = new Menu();
            $mrepas = new Repas();

            $list_menu = $menu->getall();

        foreach ($list_menu as &$menu) {

            $entree = $mrepas->populate(['id' => $menu['entree']]);
            $plat = $mrepas->populate(['id' => $menu['plat']]);
            $dessert = $mrepas->populate(['id' => $menu['dessert']]);

            // Recuperation entree

            if ($entree){
                if(!empty($menu['entree'])) {
                    $menu['entree'] = $entree->getNom();
                }
            }

            else {

                $menu['entree'] = 'Aucun';
            }

            // Recuperation plat


            if ($plat){

                if(!empty($menu['plat'])) {
                    $menu['plat'] = $plat->getNom();
                }
            }

            else {

                $menu['plat'] = 'Aucun';
            }

            // Recuperation dessert

            if ($dessert){

                if(!empty($menu['dessert'])) {
                    $menu['dessert'] = $dessert->getNom();
                }
            }

            else {

                $menu['dessert'] = 'Aucun';
            }

        }

            $view->assign('list_menu'  , $list_menu);
        
    }


        private function checkadmin () {

            if (!isset($_SESSION['user']['id'])){

                header("Location: /user/login");
                exit(0);
            }
        }
}