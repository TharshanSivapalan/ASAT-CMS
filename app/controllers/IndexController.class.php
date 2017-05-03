<?php
class IndexController{

    public function indexAction($params){

        $user = new User();
        
        $view = new View();
       

        //$view->assign("form" , $user->getForm());
        
    }

    public function welcomeAction($params){
        echo "Welcome";
    }

}