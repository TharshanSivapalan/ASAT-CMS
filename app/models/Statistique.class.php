<?php

    class Statistique extends BaseSql{

        protected $id;
        protected $ip;
        protected $navigateur;
        protected $date_courante;
        protected $page_courante;
        
        public function __construct(){
            parent::__construct();
        }

        public function getIp() {
            return $this->ip;
        }

        public function getNavigateur(){
            return $this->navigateur;
        }

        public function getPageCourante(){
            return $this->page_courante;
        }

        public function getDateCourante(){
            return $this->date_courante;
        }

        public function setId(){
            $this->id = -1;
        }

        public function setIp() {
            $this->ip = $_SERVER['REMOTE_ADDR'];
        }

        public function setNavigateur() {
            $this->navigateur = $_SERVER['HTTP_USER_AGENT'];
        }

        public function setDateCourante(){
            $this->date_courante = date("Y-m-d H:i:s");
        }

        public function setPageCourante(){
            $this->page_courante = $_SERVER["REQUEST_URI"];
        }
        
    }