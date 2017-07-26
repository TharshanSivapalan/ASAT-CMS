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
            unset($this->columns['validation']);

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
                    
                }

                $query = $this->db->prepare("UPDATE " .$this->table. " SET ".implode("," , $sqlSet)." WHERE id=:id ;");

                
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

        public function dateBetween($search = []){
            $query = $this->db->prepare("SELECT count(*) as result FROM ".$this->table." where ".$search['column']." between '".$search['date_beginning']."' and '".$search['date_ending']."'");
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
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


        public function validate (array $data) {
            
            $validation = get_class_vars($this->table)['validation'];
            
            foreach ($validation as $key => $value){
                
                // Verification isset

                if (!isset($data[$key])){

                    return false;
                    break;
                }
                
                else {

                    // Verification empty

                    if (!$validation[$key]['empty']){

                        if (empty(trim($data[$key]))){

                            return false;
                            break;
                        }
                    }

                    // Verification lenght

                    if (isset($validation[$key]['lenght'])){

                        $max = $validation[$key]['lenght'][1];
                        $min = $validation[$key]['lenght'][0];

                        if (strlen($data[$key]) > $max || strlen($data[$key]) < $min ){

                            return false;
                            break;
                        }

                    }

                    // Verification alphanumeric

                    if (isset($validation[$key]['alphanumeric'])){

                        if (!preg_match('/^[a-z0-9 .\-]+$/i', $data[$key]) ){

                            return false;
                            break;
                        }

                    }


                    // Verification IN

                    if (isset($validation[$key]['in'])){

                        if (!in_array($data[$key] , $validation[$key]['in'] )) {

                            //echo "IN";
                            return false;
                            break;
                        }

                    }


                    // Verification Email

                    if (isset($validation[$key]['email'])){

                        if (!filter_var($data[$key], FILTER_VALIDATE_EMAIL)) {

                            //echo "EMAIL";
                            return false;
                            break;
                        }

                    }

                    // Verification Numerique

                    if (isset($validation[$key]['number'])){

                        if (!is_numeric($data[$key]) || $data[$key] < 0 || $data[$key] > 10000  ) {

                            //echo "NUMBER";
                            return false;
                            break;
                        }

                    }

                }
            }

            return true;

        }

    }