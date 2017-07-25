<?php
class Menu extends BaseSql{

    protected $id;
    protected $nom;
    protected $description;
    protected $image;
    protected $entree;
    protected $plat;
    protected $dessert;
    protected $prix;

    protected $validation = array(

        'nom' => array(

            "empty" => false,
            "lenght" => array (3,255),
            "alphanumeric" => true
        ),

        'description' => array(

            "empty" => true,
            "lenght" => array (0,1000)
        ),

        'entree' => array("empty" => true),
        'plat' => array("empty" => true),
        'dessert' => array("empty" => true),

        'prix' => array(

            "empty" => false,
            "number" => true
        )
    );

    public function __construct($id=-1, $nom=null, $description=null, $image=null, $entree=0, $plat=0, $dessert=0, $prix=0 ){

        $this->setId($id)   ; 
        $this->setNom($nom)   ;
        $this->setDescription($description)   ;
        $this->setImage($image)   ;
        $this->setEntree($entree)   ;
        $this->setPlat($plat)   ;
        $this->setDessert($dessert)   ;
        $this->setPrix($prix)   ;
        
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
    public function setDescription($description){
        $this->description=trim($description);
    }

    public function setImage($image){
        $this->image = $image;
    }  

    public function setEntree($entree){
        $this->entree = $entree;
    }  

    public function setPlat($plat){
        $this->plat = $plat;
    }  

    public function setDessert($dessert){
        $this->dessert = $dessert;
    }  

    public function setPrix($prix){
        $this->prix = $prix;
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
    public function getDescription(){
        return $this->description;
    }
    public function getImage(){
        return $this->image;
    }

    public function getEntree(){
        return $this->entree;
    }

    public function getPlat(){
        return $this->plat;
    }

    public function getDessert(){
        return $this->dessert;
    }

    public function getPrix(){
        return $this->prix;
    }
    
    
}