<?php
class DashboardController{

    public function indexAction() {

        self::checkadmin();

        // Création de la page de vue
        $view = new View('dashboard');
        $view->setTemplate('backoffice');

        // Recuperation des reglages du site
        $setting = new Settings();
        $list_setting = $setting->getall();
        $view->assign('list_setting'  , $list_setting);
    
        // Récupération du nombre de menu
        $Menu = new Menu();
        $view->assign('countMenu', count($Menu->getAll()));

        // Récupération du nombre de repas
        $repas = new Repas();
        $view->assign('countRepas', count($repas->getAll()));

        // Récupération du nombre d'utilisateurs
        $user = new User();
        $view->assign('countUser', count($user->getAll()));

        // Récupération du nombre de visiteur le mois actuel
        $datetime = new DateTime();
        $dateending = $datetime->modify('+1 month')->format('Y-m-01 00:00:00');
        $datedebut = $datetime->modify('-1 month')->format('Y-m-01 00:00:00');
        $stats = new Statistique();
        $stats = $stats->dateBetween(['column' => 'date_courante', 'date_beginning' => $datedebut, 'date_ending' => $dateending]);
        $moisActuel = ['nom' => $datetime->format('F'), 'result' => $stats['result']];
        // Enregistrement dans la variable $moisActuel
        // le nombre de visite afin de l'afficher dans la vue
        $view->assign('moisActuel', $moisActuel);

        // Récupération du nombre de visiteur le mois dernier
        $dateending = $datetime->format('Y-m-01 00:00:00');
        $datedebut = $datetime->modify('-1 month')->format('Y-m-01 00:00:00');
        $stats = new Statistique();
        $stats = $stats->dateBetween(['column' => 'date_courante', 'date_beginning' => $datedebut, 'date_ending' => $dateending]);
        $moisDernier = ['nom' => $datetime->format('F'), 'result' => $stats['result']];
        // Enregistrement dans la variable $moisDernier
        // le nombre de visite afin de l'afficher dans la vue
        $view->assign('moisDernier', $moisDernier);

        // Récupération du nombre de visiteur mois - 2
        $dateending = $datetime->format('Y-m-01 00:00:00');
        $datedebut = $datetime->modify('-1 month')->format('Y-m-01 00:00:00');
        $stats = new Statistique();
        $stats = $stats->dateBetween(['column' => 'date_courante', 'date_beginning' => $datedebut, 'date_ending' => $dateending]);
        $deuxDernierMois = ['nom' => $datetime->format('F'), 'result' => $stats['result']];
        // Enregistrement dans la variable $deuxDernierMois
        // le nombre de visite afin de l'afficher dans la vue
        $view->assign('deuxDernierMois', $deuxDernierMois);

    }

    public function selectAction ($id){

        self::checkadmin();
        
        if (empty($id)) {

            header('Location: /theme');
        }

        else {
            $mTheme = new Theme();

            if($mTheme->populate(["id"=> intval($id[0]) ])) {


                $mTheme->setId(intval($id[0]));
                $mTheme->setStatus(1);
                $mTheme->resetToNull(['statut' => 0]);
                $mTheme->updateOneBy(['statut' => 1,'id' => $id[0]]);

                header('Location: /theme');

            } else {
                header('Location: /inaccessible');
            }

        }
    }

    private function checkadmin () {

        if (!isset($_SESSION['user']['id'])){

            header("Location: /user/login");
            exit(0);
        }
    }

}