<?php

    class LivreDOr extends BaseSql{

        protected $id;
        protected $content;
        protected $email;
        protected $statut;
        protected $name;
        protected $date_created;
    

        public function __construct($id = -1, $content = null ,  $email = null, $statut = 0, $name = null, $date_created = sysdate()) {

            parent::__construct();

            $this->setId($id);
            $this->setContent($content);
            $this->setEmail($email);
            $this->setStatut($statut);
            $this->setName($name);
            $this->setdateCreated($date_created);
        }


        public function getId() {

            return $this->id;
        }

        public function getContent()
        {
            return $this->content;
        }

       
        public function getEmail()
        {
            return $this->email;
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
         * @param mixed $email
         */
        public function setEmail($email)
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) $this->email = trim($email);
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

        public setdateCreated ($date_created) {

            $pattern = (strpos($date_created, "-"))?"Y-m-d":"d/m/Y";
            $date = DateTime::createFromFormat($pattern, $date_created);
            $dateErrors = DateTime::getLastErrors();

            if($dateErrors["warning_count"]+$dateErrors["error_count"]==0) $this->date_created = $date_created;
    
    }