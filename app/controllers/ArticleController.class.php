<?php
class ArticleController
{

    public function indexAction() {

        if (self::checkadmin()) {

            $view = new View('article-set');
            $view->setTemplate('backoffice');

            // Recuperation des articles du site

            $articles = new Article();
            $list_article = $articles->getall();
            $view->assign('list_article'  , $list_article);
        }


        else {

            header('Location: /user/login');
        }



    }


    private function checkadmin () {

        return true;
    }
}