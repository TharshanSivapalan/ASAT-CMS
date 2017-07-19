<?php 

    class View {
        
        protected $view;
        protected $template;
        protected $data = [];
        
        public function __construct($view = "index" , $template = "frontend") {

            $this->data["css"] = [];
            $this->data["js"] = [];
            $this->setView($view);
            $this->setTemplate($template);
            
        }

        public function setView ($view) {
            
            if(file_exists("../app/views/".$view.".view.php") ){
                $this->view = "../app/views/".$view.".view.php";
            }
            
            else {
                
                die("La vue n'existe pas");
            }
        }

        public function setTemplate ($template) {



            if(file_exists("../app/views/".$template.".temp.php") ){
                $this->template = $template.".temp.php";
            }

            else {

                die("Le template n'existe pas");
            }
        }

        public function assign ($key , $value) {

            $this->data[$key] = $value;

        }

        function includeModal ($modal , $config) {

            if(file_exists("../app/views/modals/".$modal.".mod.php") ){
                include "../app/views/modals/".$modal.".mod.php";
            }

            else {

                die("Le modal'existe pas");
            }
        }

        function includeCss($nameCss){
            $file = "css/".$nameCss;
            if(file_exists($file)){
                $this->data["css"][] = $file;
            }else{
                die("Erreur Fichier CSS");
            }

        }

        function includeJS($nameJS){
            $file = "js/".$nameJS;
            if(file_exists($file)){
                $this->data["js"][] = $file;
            }else{
                die("Erreur Fichier JS");
            }

        }

        public function __destruct () {
            
            extract($this->data);
            include "../app/views/".$this->template;
        }

    }