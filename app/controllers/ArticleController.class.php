<?php
class ArticleController
{

    public function indexAction() {

        self::checkadmin();

            $view = new View('article-set');
            $view->setTemplate('backoffice');

            // Recuperation des articles du site

            $articles = new Article();
            $list_article = $articles->getall();
            $view->assign('list_article'  , $list_article);
        
    }


    private function checkadmin () {

        if (!isset($_SESSION['user']['id'])){

            header("Location: /user/login");
            exit(0);
        }
    }
}