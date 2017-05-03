<?php
class UserController{

    public function indexAction($params){
        echo "tous mes utilisateurs";
    }

    public function addAction($params){
        echo "ajout d'un utilisateur";
    }

    public function loginAction () {

        $view = new View('login');
        $user = new User();

        $view->assign("form" , $user->getConnectionForm());

        $view->includeCss("home.css");
        $view->includeJS("home.js");

        if ($_POST) {

            $login = $_POST['login'];
            $password = $_POST['password'];

            echo $login;
            
            // Chercher le user associe
            
            $user = '';
            
            if ($user) {
                
                $user->
                $_SESSION[$user] = $user;
            }
        }

    }

    public function signupAction () {

        if(isset($_POST['email']) && !empty($_POST['email'])){

            $email = $_POST['email'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $pwdConfirmation = $_POST['password_confirm'];

            $user = new User();

            if(!$user->populate(["email"=>$email]) && !$user->populate(["login"=>$login])){

                if($password == $pwdConfirmation){
                    $user->setId(-1);
                    $user->setEmail($email);
                    $user->setLogin($login);
                    $user->setPwd($password);
                    $user->setStatus(1);
                    $user->setIdGroupUser(1);
                    $user->setDateInserted();
                    $user->setDateUpdated();
                    $user->setToken(null);
                    $user->save();
                    header('Location: login');
                }
            }

        } else {
            $user = new User();
            $view = new View('signup');

            $view->includeCss("home.css");
            $view->includeJS("home.js");

            $view->assign("form" , $user->getInscriptionForm());
        }
    }

    public function activateAction ($token = null) {

        if (empty($token)){

            // Redirection
        }

        else {

        }

    }

    public function forgotAction () {

        $view = new View('forgot');

        $user = new User();
        $view->assign("form" , $user->getForgetForm());

        $view->includeCss("home.css");
        $view->includeJS("home.js");

    }

    public function passwordAction ($token = null) {


        if (empty($token)){

            // redirection
            die('pas de token');
        }

        else {
            
            $view = new View('password');

            $user = new User();
            $view->assign("form" , $user->getPasswordForm());

            $view->includeCss("home.css");
            $view->includeJS("home.js");
            
        }
    }

    public function logoutAction () {

        
    }


}