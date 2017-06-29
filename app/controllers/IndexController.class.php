<?php
class IndexController{

    public function indexAction($params){

        $theme = new Theme();

        $theme = $theme->populate(['statut' => 1]);

        $view = new View('index');
        $view->setTemplate($theme->getName());

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