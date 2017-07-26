<?php
class ContactController{

    public function indexAction(){

        // Recuperation du theme
        
        $theme = new Theme();
        $theme = $theme->populate(['statut' => 1]);

        $view = new View('contact');
        $view->setTemplate('theme'.$theme->getId());
        $view->assign('theme_id', $theme->getId());


        // Recuperation des reglages du site

        $setting = new Settings();
        $list_setting = $setting->getall();
        $view->assign('list_setting'  , $list_setting);

        // Recuperation des articles du site

        $articles = new Article();
        $list_article = $articles->getall();
        $view->assign('list_article'  , $list_article);
        
        // Recuperation des menus

        $menu = new Menu();
        $list_menu = $menu->getall();
        $view->assign('list_menu'  , $list_menu);
        
        
        //$view->assign("form" , $user->getForm());
        
    }

    public function error404Action(){

        $view = new View('404');

        $view->includeCss("home.css");
        $view->includeJS("home.js");
    }

}