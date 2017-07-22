<?php
class DashboardController{

    public function indexAction() {

        self::checkadmin();

        $view = new View('dashboard');
        $view->setTemplate('backoffice');

        // Recuperation des reglages du site

        $setting = new Settings();
        $list_setting = $setting->getall();
        $view->assign('list_setting'  , $list_setting);
   
    }

    public function selectAction ($id){

        self::checkadmin();
        
        if (empty($id)) {

            header('Location: /theme');
        }

        else {
            $mTheme = new Theme();

            if($mTheme->populate(["id"=> intval($id[0]) ])) {


                $mTheme->setId(intval($id[0]));
                $mTheme->setStatus(1);
                $mTheme->resetToNull(['statut' => 0]);
                $mTheme->updateOneBy(['statut' => 1,'id' => $id[0]]);

                header('Location: /theme');

            } else {
                header('Location: /inaccessible');
            }

        }
    }

    private function checkadmin () {

        if (!isset($_SESSION['user']['id'])){

            header("Location: /user/login");
            exit(0);
        }
    }

}