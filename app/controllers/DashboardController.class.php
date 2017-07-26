<?php
class DashboardController{

    public function indexAction() {

        self::checkadmin();

        $view = new View('dashboard');
        $view->setTemplate('backoffice');

        // Recuperation des reglages du site

        $setting = new Settings();
        $list_setting = $setting->getall();
        $view->assign('list_setting'  , $list_setting);
    
        $Menu = new Menu();
        $view->assign('countMenu', count($Menu->getAll()));

        $repas = new Repas();
        $view->assign('countRepas', count($repas->getAll()));

        $user = new User();
        $view->assign('countUser', count($user->getAll()));

        $datetime = new DateTime();
        $dateending = $datetime->modify('+1 month')->format('Y-m-01 00:00:00');
        $datedebut = $datetime->modify('-1 month')->format('Y-m-01 00:00:00');
        $stats = new Statistique();
        $stats = $stats->dateBetween(['column' => 'date_courante', 'date_beginning' => $datedebut, 'date_ending' => $dateending]);
        $moisActuel = ['nom' => $datetime->format('F'), 'result' => $stats['result']];

        $view->assign('moisActuel', $moisActuel);

        $dateending = $datetime->format('Y-m-01 00:00:00');
        $datedebut = $datetime->modify('-1 month')->format('Y-m-01 00:00:00');
        $stats = new Statistique();
        $stats = $stats->dateBetween(['column' => 'date_courante', 'date_beginning' => $datedebut, 'date_ending' => $dateending]);
        $moisDernier = ['nom' => $datetime->format('F'), 'result' => $stats['result']];

        $stats = new Statistique();
        $stats = $stats->dateBetween(['column' => 'date_courante', 'date_beginning' => $datedebut, 'date_ending' => $dateending]);
        $view->assign('moisDernier', $moisDernier);

        $dateending = $datetime->format('Y-m-01 00:00:00');
        $datedebut = $datetime->modify('-1 month')->format('Y-m-01 00:00:00');
        $stats = new Statistique();
        $stats = $stats->dateBetween(['column' => 'date_courante', 'date_beginning' => $datedebut, 'date_ending' => $dateending]);
        $deuxDernierMois = ['nom' => $datetime->format('F'), 'result' => $stats['result']];
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