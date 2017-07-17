<?php
class IndexController{

    public function indexAction($params){

        // Recuperation du theme
        
        $theme = new Theme();
        $theme = $theme->populate(['statut' => 1]);

        $view = new View('index');
        $view->setTemplate($theme->getName());


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

    public function carteAction($params){
        echo "Page carte";
    }

    public function contactAction($params){
        echo "Page contact";
    }

    public function livreAction () {
        echo "Page livredor";
    }

}