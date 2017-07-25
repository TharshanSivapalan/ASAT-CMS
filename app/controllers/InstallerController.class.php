<?php
class InstallerController{

	// Page d'accueil de l'installeur
	public function indexAction(){
		// Vérifier si le fichier config n'est pas configuré sinon rediriger vers l'accueil du site
		if(Helper::checkConfig()){
			header("Location: /");
		}
		$view = new View('welcome');
        $view->setTemplate('installer');
	}

	// Page formulaire de la base de données 
	public function dbConfigAction(){
		// Vérifier si le fichier config n'est pas configuré sinon rediriger vers l'accueil du site
		if(Helper::checkConfig()){
			header("Location: /");
		}
		// Condition si la session database existe - si oui --> détruire la session
		if(isset($_SESSION['database'])){
	        	session_unset($_SESSION['database']);
	    }
		
		// Condition si un formulaire a été envoyé 
		if(isset($_POST) && !empty($_POST['database_address']) && !empty($_POST['database_port']) && !empty($_POST['database_name']) && !empty($_POST['database_login'])){
			// Instanciation d'un tableau d'erreur
			if(isset($errors)){
				$errors = [];
			}

			// Try catch --> Connexion base de données
			try{
				// Cacher les messages d'erreur
				error_reporting(0);
				// Connection base de données
            	new PDO("mysql:host=".$_POST['database_address']."; port=". $_POST['database_port'] .";dbname=".$_POST['database_name'].";", $_POST['database_login'], $_POST['database_password']);
					
				// Enregistrer les donnees de connexion dans la session database
				$_SESSION['database'] = [
					"database_address" => $_POST['database_address'],
					"database_port" => $_POST['database_port'],
					"database_name" => $_POST['database_name'],
					"database_login" => $_POST['database_login'],
					"database_password" => $_POST['database_password']
				];
				$result = true;

			// Si erreur
			}catch(Exception $e){
				// Si code d'erreur est 1045 (Probleme authentification) --> enregistrer dans le tableau d'erreur
                if($e->getCode() == 1045){
                	$errors['code'] = 1045;

				// Si code d'erreur est 1049 (Probleme nom de base de données) --> enregistrer dans le tableau d'erreur	
                }elseif ($e->getCode() == 1049) {
                	$errors['code'] = 1049;

				// S'il n'y pas de message d'erreur alors mauvais url
                }else{
                	$errors['code'] = "no_database";
                }
            }
        }

        // Création de la page de vue
        $view = new View('dbconfig');
        $view->setTemplate('installer');

        // Condition si tableau d'erreur existe et qu'il n'est pas vide
        // alors enregistrer dans la variable error pour l'afficher dans la vue
        if(isset($errors) && !empty($errors)){
        	$view->assign("errors", $errors);
        }
        // Condition s'il existe un booleen result et qu'il est true
        // si oui enregistrer dans la variable result pour l'executer javascript dans la vue
        if(isset($result) && $result === true){
			$view->assign("result", true);
        }

	}


	// Page formulaire configuration site web
	// Creation base de données
	// Insertion groupuser & user dans base de données
	public function siteconfigAction(){
		// Vérifier si le fichier config n'est pas configuré sinon rediriger vers l'accueil du site
		if(Helper::checkConfig()){
			header("Location: /");
		}
		// Condition s'il existe une session database 
		// sinon redirection page de formulaire base de données
		if(!isset($_SESSION['database'])){
			header("Location: /installer/dbconfig");
			exit();
		}

		// Condition si un formulaire a été envoyé
		if(isset($_POST['website_name']) && strlen(trim($_POST['website_name'])) > 2 && isset($_POST['admin_login']) && strlen(trim($_POST['admin_login'])) > 2 && isset($_POST['admin_email']) && filter_var(trim($_POST['admin_email']), FILTER_VALIDATE_EMAIL) && isset($_POST['admin_password']) && strlen(trim($_POST['admin_password'])) >= 8){
			
			// Ajout des données du formulaire dans une variable
			// en faisant d'abord un trim pour supprimer les espaces
			$website = trim($_POST['website_name']);
			$login = trim($_POST['admin_login']);
			$password = trim($_POST['admin_password']);
			$email = trim($_POST['admin_email']);

			// Verification si l'utilisateur a renseigner les champs 
			// pour configurer l'envoi d'email sinon assigner null
			if(isset($_POST['email_host']) && !empty($_POST['email_host']) && isset($_POST['email_address']) && !empty($_POST['email_address']) && isset($_POST['email_password']) && !empty($_POST['email_password']) && isset($_POST['email_port']) && !empty($_POST['email_port'])){
				$host = trim($_POST['email_host']);
				$address = trim($_POST['email_address']);
				$email_password = trim($_POST['email_password']);
				$port = trim($_POST['email_port']);
			}else{
				$host = null;
				$address = null;
				$email_password = null;
				$port = null;
			}

			// Enregistrer les données dans la session settings
			$_SESSION['settings'] = [
				'website' => $website,
				'login' => $login,
				'password' => $password,
				'email' => $email,
				'host' => $host,
				'address' => $address,
				'email_password' => $email_password,
				'port' => $port
			];

			// Ouvrir le fichier conf.inc.php
			// Ecrire les paramètres de connexion et email
			// Ensuite fermer le fichier
			$config = fopen('../conf.inc.php', 'a+');
			fwrite($config, PHP_EOL . PHP_EOL ."\t//DATABASE" . PHP_EOL . "\tdefine('DATABASE', '" . $_SESSION['database']['database_name'] . "'); " . PHP_EOL . "\tdefine('USERDB', '" . $_SESSION['database']['database_login'] . "'); " . PHP_EOL . "\tdefine('PASSDB', '" . $_SESSION['database']['database_password'] . "'); " . PHP_EOL . "\tdefine('DBHOST', '" . $_SESSION['database']['database_address'] . "');" . PHP_EOL . "\tdefine('DBPORT', '" . $_SESSION['database']['database_port'] . "');");
			fwrite($config, PHP_EOL . PHP_EOL . "\t//EMAIL" . PHP_EOL . "\tdefine('HOSTMAIL', '" . $host . "'); " . PHP_EOL . "\tdefine('USERMAIL', '" . $address . "'); " . PHP_EOL . "\tdefine('PASSMAIL', '" . $email_password . "'); " . PHP_EOL . "\tdefine('PORTMAIL', '" . $port . "');");
			fclose($config);

			// Rafraichir la page (Pour que le fichier conf.inc.php soit bien pris en compte)
			header('Location: /installer/complete');
			exit();
		}

		$view = new View('siteconfig');
		$view->setTemplate('installer');
	}

	// Page formulaire configuration site web
	// Creation base de données
	// Insertion groupuser & user dans base de données
	public function completeAction(){

		// Condition si la session settings existe bien
		if(isset($_SESSION['settings'])){
			
			// Try catch --> Pour finaliser l'installeur
			$one = 1;
			try {
			// Connexion à la base de données et installer la base de données
			$db = new PDO("mysql:host=".$_SESSION['database']['database_address']."; port=".$_SESSION['database']['database_port'].";dbname=".$_SESSION['database']['database_name'].";", $_SESSION['database']['database_login'], $_SESSION['database']['database_password']);
			$sql = stream_get_contents(fopen("db_structure.sql", 'r'));
			$sql = str_replace("SITETITLE", $_SESSION['settings']['website'], $sql);
			$db->exec($sql);

			// Création d'un utilisateur dans la base de données
			$stmt = $db->prepare ("INSERT INTO user (email, login, password, status, date_inserted, date_updated, id_groupuser) VALUES (:email, :login, :password, :status, :date_inserted, :date_updated, :id_groupuser)");
			$stmt -> bindParam(':email', $_SESSION['settings']['email']);
			$stmt -> bindParam(':login', $_SESSION['settings']['login']);
			$stmt -> bindParam(':password', password_hash($_SESSION['settings']['password'], PASSWORD_DEFAULT));
			$stmt -> bindParam(':status', $one);
			$stmt -> bindParam(':date_inserted', date("Y-m-d H:i:s"));
			$stmt -> bindParam(':date_updated', date("Y-m-d H:i:s"));
			$stmt -> bindParam(':id_groupuser', $one);
			$stmt -> execute();
			$db = null;
			// Détruire la session database
			$_SESSION = [];

			/* PERMET DE SUPPRIMER LES FICHIERS D'INSTALLATION
				unlink("db_structure.sql");
				unlink("../app/controllers/InstallerController.php");
				foreach(glob('../app/views/Installer/*') as $file){
					unlink($file);
				}
				rmdir("../app/views/Installer/"); 
			*/

			// Si erreur alors rediriger vers page d'erreur
			} catch (Exception $e) {
				header('Location: /installer/error');
			}
		}
		$view = new View('complete');
		$view->setTemplate('installer');
	}

	public function errorAction(){
		$view = new View('error');
		$view->setTemplate('installer');
	}
}