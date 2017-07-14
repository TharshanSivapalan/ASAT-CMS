<?php
class ArticleController
{

    public function indexAction() {

        if (self::checkadmin()) {

            $view = new View('article-set');
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