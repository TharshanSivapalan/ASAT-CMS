<?php
class Settings extends BaseSql{

    protected $id;
    protected $nom;
    protected $value;


    public function __construct($id=-1, $nom=null, $value=null){

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
    public function setValue($value){
        $this->value=trim($value);
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
    public function getValue(){
        return $this->value;
    }
}