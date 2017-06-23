<?php
class IndexController{

    public function indexAction($params){

        $user = new User();
        
        $view = new View('index');

        if (isset($_SESSION['theme']) && !empty($_SESSION['theme'])) {

            $view->setTemplate($_SESSION['theme']);
        }

        else {

            $view->setTemplate('famous');
        }



        
        //$view->assign("form" , $user->getForm());
        
    }

    public function contact($params){
        echo "Page contact";
    }

    public function livredor () {

        echo "Page livredor";
    }

}