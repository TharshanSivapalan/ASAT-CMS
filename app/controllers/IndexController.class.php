<?php
class IndexController{

    public function indexAction($params){

        // Recuperation du theme
        
        $theme = new Theme();
        $theme = $theme->populate(['statut' => 1]);

        $view = new View('index');
        $view->setTemplate('theme'.$theme->getId());
        $view->assign('theme_id', $theme->getId());


        // Recuperation des reglages du site

        $setting = new Settings();
        $list_setting = $setting->getall();
        $view->assign('list_setting'  , $list_setting);

        // Recuperation des articles du site

        $articles = new Article();
        $list_article = $articles->getall();
        $view->assign('list_article'  , $list_article);
        
        // Recuperation des menus

        $menu = new Menu();
        $list_menu = $menu->getall();
        $view->assign('list_menu'  , $list_menu);
        
        
        //$view->assign("form" , $user->getForm());
        
    }

    public function carteAction($params){
        echo "Page carte";
    }

    public function contactAction($params){
        echo "Page contact";
    }

    public function livreAction () {
        echo "Page livredor";
    }
    
    public function error404Action(){

        $view = new View('404');

        $view->includeCss("home.css");
        $view->includeJS("home.js");
    }

    public function messageAction ()
    {

        if ($_POST && isset($_POST['email']) && isset($_POST['message']) && !empty($_POST['email']) && !empty($_POST['message']) && (count($_POST) == 2)) {


            if (!filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL)){

                header("Location: /inaccesible");
                exit(0);
            }

            if (strlen($_POST['message']) > 1000 ){

                header("Location: /inaccesible");
                exit(0);
            }
            
            // Envoie email
            
            // Recuperation adresse


            $setting = new Settings();
            $list_setting = $setting->getall();


            $email_to = $list_setting[9]['valeur'];


            require_once '../app/lib/SwiftMailer/swift_required.php';

            // Transport

            $transport = Swift_SmtpTransport::newInstance(HOSTMAIL, PORTMAIL , 'tls');
            $transport->setUsername(USERMAIL);
            $transport->setPassword(PASSMAIL);

            // Message

            $message = Swift_Message::newInstance();
            $message->setFrom(array($_POST['email'] => 'Utilisateur'));
            $message->setTo($email_to);
            $message->setSubject('Formulaire de contact depuis le site ASAT CMS');
            $message->setBody($_POST['message']);

            $type = $message->getHeaders()->get('Content-Type');
            $type->setValue('text/html');
            $type->setParameter('charset', 'utf-8');

            // Envoi

            $mailer = Swift_Mailer::newInstance($transport);
            $result = $mailer->send($message);

            if(!$result) {

                $_SESSION["flash"]["type"] = "error";
                $_SESSION["flash"]["message"] = "Une erreur s'est produite avec l'envoi de l'email";

                header('Location: /');
                exit(0);
            }

            $_SESSION["flash"]["type"] = "success";
            $_SESSION["flash"]["message"] = "L'email a été envoyé à l'adresse " . $email_to;

            header('Location: /');
            exit(0);
        }

        else {

            header("Location: /inaccesible");
            exit(0);
        }

    }
}