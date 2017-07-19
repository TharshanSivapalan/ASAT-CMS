<?php

    class BaseSql {

        private $db;
        private $table;
        private $columns = [];

        public function __construct() {

            try{
                $this->db = new PDO("mysql:host=".DBHOST."; port=".DBPORT.";dbname=".DATABASE.";", USERDB, PASSDB);

            }catch(Exception $e){
                die("Erreur SQL ".$e->getMessage());
            }

            $this->table = strtolower(get_called_class());

            $objectVars = get_class_vars($this->table);
            $sqlVars = get_class_vars(get_class());

            $this->columns = array_diff_key($objectVars , $sqlVars);

        }

        public function save () {

            if ($this->id == -1) {

                unset($this->columns['id']);

                $sqlCol = null;
                $sqlKey = null;

                foreach ($this->columns as $column => $value) {

                    $data[$column] = $this->$column;
                    $sqlCol .= ",".$column;
                    $sqlKey .= ",:".$column;
                }

                $sqlCol = ltrim($sqlCol , ",");
                $sqlKey = ltrim($sqlKey , ",");

                $query = $this->db->prepare("INSERT INTO " .$this->table. " (".$sqlCol.") VALUES (".$sqlKey.") ;");
                
                $query->execute($data);
            }

            else {

            

                $sqlSet = null;

              
                foreach ($this->columns as $column => $value) {

                    $data[$column] = $this->$column;
                    $sqlSet [] .= $column."=:".$column;

                    echo $column;


                }


                var_dump($data);


                $query = $this->db->prepare("UPDATE " .$this->table. " SET ".implode("," , $sqlSet)." WHERE id=:id ;");


                var_dump($query);

                
                $query->execute($data);

                if ($query->execute($data)) {

                return true;
            }


            }


        }





        public function populate( $search = ["id"=>3] ){
           
            $query = $this->getOneBy($search, true);
            $query->setFetchMode(PDO::FETCH_CLASS, $this->table);
            $object = $query->fetch();
            return $object;
        }

        public function getOneBy ($search = [] , $returnQuery = false) {

            foreach ($search as $key => $value) {

                $where [] = $key. '=:' .$key;
            }

            $query = $this->db->prepare("SELECT * FROM " .$this->table. " WHERE " .implode(" AND " , $where));

            $query->execute($search);

            if ($returnQuery) {

                return $query;
            }

            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function getall () {

            $query = $this->db->prepare("SELECT * FROM " .$this->table);
            
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function getallBy ($search = [] , $returnQuery = false) {

            foreach ($search as $key => $value) {

                $where [] = $key. '=:' .$key;
            }

            $query = $this->db->prepare("SELECT * FROM " .$this->table. " WHERE " .implode(" AND " , $where));

            $query->execute($search);

            if ($returnQuery) {

                return $query;
            }

            return $query->fetchAll(PDO::FETCH_ASSOC);
            
        }


        public function deleteBy ($search = [] , $returnQuery = false) {

            foreach ($search as $key => $value) {

                $where [] = $key. '=:' .$key;
            }

            $query = $this->db->prepare("DELETE FROM " .$this->table. " WHERE " .implode(" AND " , $where));

            $query->execute($search);

            if ($returnQuery) {

                return $query;
            }
            
        }

        public function resetToNull ($search = []  , $returnQuery = false) {
            foreach ($search as $key => $value) {

                $set [] = $key. '=:' .$key;
            }

            $query = $this->db->prepare("UPDATE " .$this->table. " SET ".implode(" , " , $set));

            $query->execute($search);

            if ($returnQuery) {

                return $query;
            }
        }


        public function updateOneBy($search = []  , $returnQuery = false) {
            foreach ($search as $key => $value) {

                $set [] = $key. '=:' .$key;
            }

            $query = $this->db->prepare("UPDATE " .$this->table. " SET ".implode(" , " , $set). " WHERE id=:id ;");

           

            $query->execute($search);
            
            if ($returnQuery) {

                return $query;
            }
        }

    }