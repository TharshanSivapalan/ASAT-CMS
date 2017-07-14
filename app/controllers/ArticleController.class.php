<?php
class RepasController
{

    public function indexAction() {

        if (self::checkadmin()) {

            $view = new View('article-list');
            $view->setTemplate('backoffice');
        }


        else {

            header('Location: /user/login');
        }



    }

    public function addAction () {

        if (self::checkadmin()) {

            $view = new View('article-add');
            $view->setTemplate('backoffice');

        }

        else {

            header('Location: /user/login');
        }

    }

    private function checkadmin () {

        return true;
    }
}