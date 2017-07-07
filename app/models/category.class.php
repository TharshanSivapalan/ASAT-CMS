<?php

    class Category extends BaseSql{

        protected $id;
        protected $name;
        protected $date_created;
        protected $date_updated;
    
        public function __construct($id = -1, $name = null , $date_created = sysdate() , $date_updated = null){

            parent::__construct();

            $this->setId($id);
            $this->setName($name);
            $this->setdateCreated($date_created);
            $this->setdateUpdated($date_updated);
        }


        public function getId() {

            return $this->id;
        }
        
        public function getName()
        {
            return $this->name;
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
         * @param mixed $name
         */
        public function setName($name)
        {
            if (is_string($name)) $this->name = trim($name);
        }

        public setdateCreated ($date_created) {

            $pattern = (strpos($date_created, "-"))?"Y-m-d":"d/m/Y";
            $date = DateTime::createFromFormat($pattern, $date_created);
            $dateErrors = DateTime::getLastErrors();

            if($dateErrors["warning_count"]+$dateErrors["error_count"]==0) $this->date_created = $date_created;
        }

        public setdateUpdated ($date_updated) {

            $pattern = (strpos($date_updated, "-"))?"Y-m-d":"d/m/Y";
            $date = DateTime::createFromFormat($pattern, $date_updated);
            $dateErrors = DateTime::getLastErrors();

            if($dateErrors["warning_count"]+$dateErrors["error_count"]==0) $this->date_updated = $date_updated;
        }
        
    }