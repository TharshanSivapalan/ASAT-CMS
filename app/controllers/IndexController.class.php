<?php
class IndexController{

    public function indexAction($params){

        $user = new User();
        
        $view = new View('index');
        $view->setTemplate('template1');
        
        //$view->assign("form" , $user->getForm());
        
    }

    public function contact($params){
        echo "Page contact";
    }

    public function livredor () {

        echo "Page livredor";
    }

}