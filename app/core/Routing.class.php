<?php
class Routing{

    private $uriExploded;

    private $controller;
    private $controllerName;
    private $action;
    private $actionName;

    private $params;

    public function __construct(){
        //    /user/add
        $uri = $_SERVER["REQUEST_URI"];
        //    user/add
        $uri = preg_replace("#".BASE_PATH_PATTERN."#i", "", $uri, 1);
        //Array ( [0] => user [1] => add )
        $this->uriExploded = explode("/",  trim($uri, "/")   );
        // Redirection vers l'installer si le fichier config n'est pas validé
        if(!Helper::checkConfig() && $this->uriExploded[0] != "installer"){
            $uri = "/installer/index";
            $this->uriExploded = explode("/",  trim($uri, "/")   );
        }
        $this->setController();
        $this->setAction();
        $this->setParams();
        $this->runRoute();

    }

    public function setController(){
        $this->controller = (empty($this->uriExploded[0]))?"Index":ucfirst($this->uriExploded[0]);
        $this->controllerName = $this->controller."Controller";
        unset($this->uriExploded[0]);
    }

    public function setAction(){
        $this->action =  (empty($this->uriExploded[1]))?"index":$this->uriExploded[1];
        $this->actionName = $this->action."Action";
        unset($this->uriExploded[1]);
    }

    public function setParams(){
        $this->params = array_merge(array_values($this->uriExploded), $_POST);
    }
    
    public function checkRoute(){
        //Est ce qu'il existe un fichier du nom de xxxxContoller $this->controllerName
        $pathController = "../app/controllers/".$this->controllerName.".class.php";

        if( !file_exists($pathController) ){
            //echo "Le fichier du controller n'existe pas";
            return false;
        }
        include $pathController;

        if ( !class_exists($this->controllerName)  ){
            //echo "Le fichier du controller existe mais il n'y a pas de classe";
            return false;
        }
        if(  !method_exists($this->controllerName, $this->actionName) ){
            //echo "L'action n'existe pas";
            return false;
        }
        return true;
    }


    public function runRoute(){
        if($this->checkRoute()){
            //$this->controllerName = IndexController
            $controller = new $this->controllerName();
            //$this->actionName = indexAction
            $controller->{$this->actionName}($this->params);
        }else{
            $this->page404();
        }
    }

    public function page404(){
        $this->controllerName = 'IndexController';
        $this->actionName = 'error404Action';

        self::runRoute();
    }


}






