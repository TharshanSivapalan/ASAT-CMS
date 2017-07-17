<?php
class Repas extends BaseSql{

    protected $id;
    protected $nom;
    protected $category;


    public function __construct($id=-1, $nom=null, $category=0){

        parent::__construct();
    }

    //----------------
    //----SETTERS-----
    //----------------

    public function setId($id){
        $this->id=$id;
    }
    public function setNom($nom){
        $this->nom=trim($nom);
    }
    public function setCategory($category){
        $this->category=trim($category);
    }


    //----------------
    //----GETTERS-----
    //----------------

    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getCategory(){
        return $this->category;
    }

}
    
    
