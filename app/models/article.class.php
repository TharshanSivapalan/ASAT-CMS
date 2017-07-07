<?php

    class Article extends BaseSql{

        protected $id;
        protected $content;
        protected $name;
        protected $statut;
        protected $date_created;
        protected $date_updated;
    
        public function __construct($id = -1, $content = null , $statut = 0, $name = null, $date_created = date('Y-m-d H:i:s') , $date_updated = null){

            parent::__construct();

            $this->setId($id);
            $this->setContent($content);
            $this->setStatut($statut);
            $this->setName($name);
            $this->setdateCreated($date_created);
            $this->setdateUpdated($date_updated);
        }


        public function getId() {

            return $this->id;
        }

        public function getContent()
        {
            return $this->content;
        }
        
        public function getName()
        {
            return $this->name;
        }

    
        public function getStatut()
        {
            return $this->statut;
        }

         public function getdateCreated()
        {
            return $this->$date_created;
        }

         public function getdateUpdated()
        {
            return $this->$date_updated;
        }

        /**
         * @param mixed $id
         */
        public function setId($id) {

            $id = (int) $id;
            if ($id > 0) $this->id = $id;
        }

        /**
         * @param mixed $content
         */
        public function setContent($content)
        {
            if (is_string($content)) $this->content = $content;
        }

    
        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            if (is_string($name)) $this->name = trim($name);
        }

        
        /**
         * @param mixed $statut
         */
        public function setStatut($statut)
        {
            if ($statut == 0 || $statut == 1) $this->statut = $statut;
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