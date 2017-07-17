<?php

    class Article extends BaseSql{

        protected $id;
        protected $titre;
        protected $content;
        protected $statut;
        protected $date_created;
        protected $date_updated;
    
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
        
        public function getStatut()
        {
            return $this->statut;
        }

         public function getdateCreated()
        {
            return $this->date_created;
        }

         public function getdateUpdated()
        {
            return $this->date_updated;
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
        
        /**
         * @param mixed $statut
         */
        public function setStatut($statut){
            $this->statut = $statut;
        }

        public function setdateCreated ($date_created) {

            $pattern = (strpos($date_created, "-"))?"Y-m-d":"d/m/Y";
            $date = DateTime::createFromFormat($pattern, $date_created);
            $dateErrors = DateTime::getLastErrors();

            if($dateErrors["warning_count"]+$dateErrors["error_count"]==0) $this->date_created = $date_created;
        }

        public function setdateUpdated ($date_updated) {

            $pattern = (strpos($date_updated, "-"))?"Y-m-d":"d/m/Y";
            $date = DateTime::createFromFormat($pattern, $date_updated);
            $dateErrors = DateTime::getLastErrors();

            if($dateErrors["warning_count"]+$dateErrors["error_count"]==0) $this->date_updated = $date_updated;
        }
        
    }