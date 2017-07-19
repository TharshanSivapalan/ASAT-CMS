<?php
class InstallerController{

	public function __construct(){

		// Vérifier si le fichier config n'est pas configuré sinon rediriger vers l'accueil du site
		if(Helper::checkConfig()){
			header("Location: /index");
		}
	}

	// Page d'accueil de l'installeur
	public function indexAction(){
		$view = new View('installer/welcome');
        $view->setTemplate('installer/installer');
	}

	// Page formulaire de la base de données 
	public function dbConfigAction(){
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
        $view = new View('installer/dbconfig');
        $view->setTemplate('installer/installer');

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
			fwrite($config, PHP_EOL . PHP_EOL . "\t//EMAIL" . PHP_EOL . "\tdefine('HOSTMAIL', '" . $host . "'); " . PHP_EOL . "\tdefine('USERMAIL', '" . $address . "'); " . PHP_EOL . "\tdefine('PASSMAIL', '" . $password . "'); " . PHP_EOL . "\tdefine('PORTMAIL', '" . $port . "');");
			fclose($config);

			// Rafraichir la page (Pour que le fichier conf.inc.php soit bien pris en compte)
			header('Location: /installer/siteconfig');
			exit();
		}

		// Condition si la session settings existe bien
		if(isset($_SESSION['settings']) && empty($_POST)){
			// Try catch --> Pour finaliser l'installeur
			try {

				// Connexion à la base de données et installer la base de données
				$db = new PDO("mysql:host=".DBHOST."; port=".DBPORT.";dbname=".DATABASE.";", USERDB, PASSDB);
				$sql = stream_get_contents(fopen("db_structure.sql", 'r'));
				$sql = str_replace("SITETITLE", $_SESSION['settings']['website'], $sql);
				$db->exec($sql);

				// Création groupe user dans la base de données
				$groupuser = new GroupUser();
				$groupuser->setId(-1);
				$groupuser->setName('Administrateurs');
				$groupuser->setPermission(1);
                $groupuser->setDateCreated();
                $groupuser->setDateUpdated();
				$groupuser->save();
				$groupuser = $groupuser->populate(["name"=>"Administrateurs"]);

				// Création d'un utilisateur dans la base de données
				$user = new User();
				if(!$user->populate(['email' => $_SESSION['settings']['email']]) && !$user->populate(['login' => $_SESSION['settings']['login']])){
					$user->setId(-1);
	                $user->setEmail($_SESSION['settings']['email']);
	                $user->setLogin($_SESSION['settings']['login']);
	                $user->setPwd($_SESSION['settings']['password']);
	                $user->setStatus(1);
	                $user->setIdGroupUser($groupuser->getId());
	                $user->setDateInserted();
	                $user->setDateUpdated();
	                $user->setToken(null);
	                $user->save();
				}

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
			// Détruire la session database
			unset($_SESSION['database']);	
			// Redigirer l'utilisateur vers la page d'accueil
			header('Location: /index');
			exit();

		}

		$view = new View('installer/siteconfig');
		$view->setTemplate('installer/installer');
	}

	public function errorAction(){
		$view = new View('installer/error');
		$view->setTemplate('installer/installer');
	}
}