<?php
class ThemeController{

    public function indexAction() {

        $view = new View('theme-list');
        $view->setTemplate('backoffice');

        $mTheme = new Theme();
        $list_template = $mTheme->getall();
        $view->assign('list_template'  , $list_template);
    }

    public function selectAction ($id){
        
        if (empty($id)) {

            header('Location: /theme');
        }

        else {

            $mTheme = new Theme();
            
            header('Location: /theme');

        }
    }

}