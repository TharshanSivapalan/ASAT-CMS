<?php
class UserController{

    public function indexAction(){

        self::checkadmin();

        $view = new View('user-list');
        $view->setTemplate('backoffice');

        $user = new User();

        $mUser = new User();
        $list_user = $mUser->getall();
        $view->assign('list_user'  , $list_user);
        
    }

    public function addAction($params){
        $view = new View('user-add');
        $view->setTemplate('backoffice');
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

            // Chercher le user associe

            $user = new User();

            $user = $user->populate(['login' => $login , 'status' => 1]);

            if ($user && password_verify($password , $user->getPassword())) {

                // Sauvegarde du user dans la session

                    $_SESSION["user"] = array(
                        'login' => $user->getLogin(),
                        'email' => $user->getEmail(),
                        'id' => $user->getId(),
                        'id_groupe_user' => $user->getIdGroupUser(),
                    );

                    header("Location: /theme");
                    exit();

            }

            else {

                $_SESSION["flash"]["type"] = "error";
                $_SESSION["flash"]["message"] = "Login ou mot de passe incorrect";
            }
        }

    }

    public function signupAction () {

        self::checkadmin();

        $error = false;

        if( $_POST &&
            count($_POST) == 4 &&
            !empty($_POST['email']) &&  
            !empty($_POST['login']) &&  
            !empty($_POST['password']) && 
            !empty($_POST['password_confirm'])) {

                        $email = trim($_POST['email']);
                        $login = trim($_POST['login']);
                        $password = $_POST['password'];
                        $pwdConfirmation = $_POST['password_confirm'];

                        $user = new User();

                        if($user->populate(["email"=>$email]) ){
                            $messsages [] = "L'adresse mail saisie est déjà utilisé par un compte !";
                            $error = true;
                        }

                        //Vérification email
                        if( !filter_var($email, FILTER_VALIDATE_EMAIL)  ){
                            $messsages [] = "L'email n'est pas valide";
                            $error = true;
                        }


                        //Vérification de la longueur du login
                        if(strlen($login) < 3 ){
                            $messsages [] = "Votre login est trop court !";
                            $error = true;
                        }

                        //Vérification de la longueur du mpd
                        if(strlen($password) < 8 || strlen($pwdConfirmation) > 16 ){
                            $messsages [] = "Le mot de passe doit faire entre 8 et 16 caractères";
                            $error = true;
                        }

                        //Vérification confirmation
                        if($password != $pwdConfirmation){
                            $messsages [] = "Les 2 mots de passe saisient ne sont pas identiques";
                            $error = true;;
                        }
                                               
                        if(!$error) {
                            $token = bin2hex(openssl_random_pseudo_bytes(60));

                            if($password == $pwdConfirmation){
                                $user->setId(-1);
                                $user->setEmail($email);
                                $user->setLogin($login);
                                $user->setPwd($password);
                                $user->setStatus(0);
                                $user->setIdGroupUser(1);
                                $user->setDateInserted();
                                $user->setDateUpdated();
                                $user->setToken($token);
                                $user->save();
                                $user = $user->populate(["email"=>$email]);

                                $link = $user->getId() . '-' . $user->getToken();
                                // Envoie email

                                require_once '../app/lib/SwiftMailer/swift_required.php';

                                // Transport

                                $transport = Swift_SmtpTransport::newInstance(HOSTMAIL, PORTMAIL, 'tls');
                                $transport->setUsername(USERMAIL);
                                $transport->setPassword(PASSMAIL);

                                // Message

                                $message = Swift_Message::newInstance();
                                $message->setFrom(array('noreply@asat-cms.com' => 'ASAT-CMS'));
                                $message->setTo($email);
                                $message->setSubject('Confirmation de votre compte');
                                $message->setBody("Merci de cliquer ici pour valider votre compte <a href='http://" . $_SERVER['SERVER_NAME'] . "/user/activate/" .$link ."'> Valider mon compte </a>");

                                $type = $message->getHeaders()->get('Content-Type');
                                $type->setValue('text/html');
                                $type->setParameter('charset', 'utf-8');

                                // Envoi

                                $mailer = Swift_Mailer::newInstance($transport);
                                $result = $mailer->send($message);

                                if(!$result) echo "Une erreur s'est produite avec l'envoi de l'email";

                                $messsages [] = "Merci de valider votre compte";
                                $_SESSION["messages"] = $messsages;

                                $_SESSION["value_form"] = $_POST;
                                
                                header('Location: /user/login');
                            }
                        }
                        
            }else {
                if($_POST) {
                    $messsages [] = "Veuillez remplir tous les champs !";
                    $error = true;
                }
                
            }

            $user = new User();
            $view = new View('user-add');
            $view->setTemplate('backoffice');


            $view->includeCss("admin.css");
            $view->includeJS("admin.js");

            $view->assign("form" , $user->getInscriptionForm());

            if($error) {
                $_SESSION["messages"] = $messsages;
            } 
        
    }

    public function activateAction ($token = null) {

        if (empty($token)){

            header('Location: /user/login');
        }

        else {

            $token = explode('-' , $token[0]);

            $user = new User();

            $user = $user->populate(['id' => $token[0]]);

            if($user && $token[1] == $user->getToken()) {

                // Compte active

                $user->setStatus(1);
                $user->setToken(null);
                $user->save();

                $_SESSION["flash"]["type"] = "success";
                $_SESSION["flash"]["message"] = "Votre compte a bien ete activé , vous pouvez vous connecter";

            }

            else {

                $_SESSION["flash"]["type"] = "error";
                $_SESSION["flash"]["message"] = "Token invalide";

            }

            header('Location: /user/login');
            exit(0);

        }

    }

    public function forgetAction () {

        $view = new View('forget');

        $user = new User();
        $view->assign("form" , $user->getForgetForm());

        $view->includeCss("home.css");
        $view->includeJS("home.js");

        if(isset($_POST['email']) && !empty($_POST['email'])){

            $email = $_POST['email'];

            $user = new User();

            $user = $user->populate(['email' => $email , 'status' => 1]);

            if($user) {

                $token = bin2hex(openssl_random_pseudo_bytes(30));

                $user->setToken($token);
                $user->setResetAt();
                $user->save();

                // Envoie email

                $link = $user->getId() . '-' . $user->getToken();

                require_once '../app/lib/SwiftMailer/swift_required.php';

                // Transport

                $transport = Swift_SmtpTransport::newInstance(HOSTMAIL, PORTMAIL);
                $transport->setUsername(USERMAIL);
                $transport->setPassword(PASSMAIL);

                // Message

                $message = Swift_Message::newInstance();
                $message->setFrom(array('no-reply@asat-cms.com' => 'ASAT'));
                $message->setTo($email);
                $message->setSubject('Réinitialisation de votre mot de passe');
                $message->setBody("Merci de cliquer ici pour changer votre mot de passe <a href='http://" . $_SERVER['SERVER_NAME'] . "/user/password/" .$link ."'> Changer mon mot de passe </a>");

                $type = $message->getHeaders()->get('Content-Type');
                $type->setValue('text/html');
                $type->setParameter('charset', 'utf-8');

                // Envoi

                $mailer = Swift_Mailer::newInstance($transport);
                $result = $mailer->send($message);

                if(!$result) {

                    $_SESSION["flash"]["type"] = "error";
                    $_SESSION["flash"]["message"] = "Une erreur s est produite avec l'envoie de l'e-mail";

                }

                $_SESSION["flash"]["type"] = "success";
                $_SESSION["flash"]["message"] = "Un e-mail vous a été envoyé pour changer votre mot de passe";

            }

            else {

                $_SESSION["flash"]["type"] = "error";
                $_SESSION["flash"]["message"] = "Aucun compte n'est accocié à cette adresse e-mail";
            }

            header('Location: /user/forget');
            exit(0);
        }
    }

    public function passwordAction ($token = null) {


        if (empty($token)){
            header('Location: /user/login');
            exit(0);
        }

        else {
            
            $token = explode('-' , $token[0]);
            $user = new User();

            $user = $user->populate(['id' => $token[0]]);
            
            if($user && $token[1] === $user->getToken()) {

                $view = new View('password');

                $view->assign("form", $user->getPasswordForm($user->getId(), $user->getToken()));

                $view->includeCss("home.css");
                $view->includeJS("home.js");

                if ($_POST) {

                    // Ajouter les verification (pwd1 = pwd2 et superier à 8 caracteres)

                    $user->setPwd($_POST['password']);
                    $user->setToken(NULL);
                    $user->setResetAt(NULL);
                    $user->save();

                    $_SESSION["flash"]["type"] = "success";
                    $_SESSION["flash"]["message"] = "Votre mot de passe a été changé avec success";
                    header('Location: /user/login');
                    exit(0);
                }

            }

            else {

                $_SESSION["flash"]["type"] = "error";
                $_SESSION["flash"]["message"] = "Token invalide";
                header('Location: /user/login');
                exit(0);

            } 
        }
    }
    
    public function logoutAction () {

        unset($_SESSION['user']);
        $_SESSION["flash"]["type"] = "success";
        $_SESSION["flash"]["message"] = "Vous êtes maintenant déconnecté";
        header('Location: /user/login');
        exit(0);
    }

    public function deleteAction () {

        self::checkadmin();
        
        $confirm = false;

        if ($_POST) {
            $user = new User();

            if($user->deleteBy(["id"=>$_POST['id']])) {
                $messsages [] = "L'utilisateur a bien été supprimé !";
                $confirm = true;
            }
        }

        
        if($confirm) {
            $_SESSION["messages"] = $messsages;
        }
        
        header('Location: /user');

    }





    private function checkadmin () {

        if (!isset($_SESSION['user']['id_groupe_user']) || $_SESSION['user']['id_groupe_user'] !=  ADMIN){

            header("Location: /user/login");
            exit(0);
        }
    }
    
    
}