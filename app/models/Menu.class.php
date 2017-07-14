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

    public function __construct(){

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
    
    public function getInscriptionForm(){
        return [
            "struct"=>[
                "method"=>"POST",
                "action"=>"/user/signup",
                "submit"=>"Creer un compte",
                "class" => "basic-button",
            ],
            "data"=>[
                "login"=>[
                    "type"=>"text",
                    "class" => "basic-input",
                    "placeholder"=>"Login",
                    "required"=>1
                ],
                "email"=>[
                    "type"=>"email",
                    "class" => "basic-input",
                    "placeholder"=>"Adresse e-mail",
                    "required"=>1
                ],
                "password"=>[
                    "type"=>"password",
                    "class" => "basic-input",
                    "placeholder"=>"Mot de passe",
                    "required"=>1
                ],
                "password_confirm"=>[
                    "type"=>"password",
                    "class" => "basic-input",
                    "placeholder"=>"Confirmer votre mot de passe",
                    "required"=>1
                ]
            ]
        ];
    }
    public function getConnectionForm(){
        return [
            "struct" => [
                "method"=>"POST",
                "action"=>"/user/login",
                "submit"=>"Connexion",
                "class" => "basic-button",
            ],
            "data" => [
                "login"=>[
                    "type"=>"text",
                    "class" => "basic-input",
                    "placeholder"=>"Login",
                    "required"=>1
                ],
                "password"=>[
                    "type"=>"password",
                    "class" => "basic-input",
                    "placeholder"=>"Mot de passe",
                    "required"=>1
                ]
            ]
        ];
    }

    public function getForgetForm(){
        return [
            "struct" => [
                "method"=>"POST",
                "action"=>"/user/forget",
                "submit"=>"M'envoyer les instructions par e-mail ",
                "class" => "basic-button",
            ],

            "data" => [
                "email"=>[
                    "type"=>"email",
                    "class" => "basic-input",
                    "placeholder"=>"Adresse e-mail",
                    "required"=>1
                ]
            ]
        ];
    }

    public function getPasswordForm(){
        return [
            "struct" => [
                "method"=>"POST",
                "action"=>"/user/password",
                "submit"=>"Changer le mot de passe",
                "class" => "basic-button",
            ],

            "data" => [
                "password"=>[
                    "type"=>"password",
                    "class" => "basic-input",
                    "placeholder"=>"Nouveau mot de passe",
                    "required"=>1
                ],
                "password_confirm"=>[
                    "type"=>"password",
                    "class" => "basic-input",
                    "placeholder"=>"Confirmer nouveau mot de passe",
                    "required"=>1
                ]
            ]
        ];
    }
}