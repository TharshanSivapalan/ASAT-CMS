<?php

    class Article extends BaseSql{

        protected $id;
        protected $titre;
        protected $content;

        protected $validation = array(

            'titre' => array(

                "empty" => false,
                "lenght" => array (3,100),
                "alphanumeric" => true
            ),

            'content' => array(

                "empty" => false,
                "lenght" => array (0,1000),
            )
        );
    
        public function __construct(){
            parent::__construct();
        }

        public function getId() {
            return $this->id;
        }

        public function getTitre(){
            return $this->titre;
        }

        public function getContent(){
            return $this->content;
        }


        /**
         * @param mixed $id
         */
        public function setId($id) {
            $this->id = $id;
        }

        public function setTitre($titre) {

            $this->titre = trim($titre);
        }

        /**
         * @param mixed $content
         */
        public function setContent($content){
            $this->content = trim($content);
        }
        
    }