<?php
class ArticleController
{

    public function indexAction() {

        self::checkadmin();

            $view = new View('article-list');
            $view->setTemplate('backoffice');

            // Recuperation des articles du site

            $articles = new Article();
            $list_article = $articles->getall();
            $view->assign('list_article'  , $list_article);
        
    }

    public function updateAction ($params) {

        self::checkadmin();

        if (empty($params[0])) {
            header('Location: /inaccesible');
            exit(0);
        }

        $id = $params[0];

        $mArticle = new Article();

        // Partie vue

        if($mArticle->populate(["id"=> $id])) {

            $view = new View('article-set');
            $view->setTemplate('backoffice');

            $article = $mArticle->getallBy(['id' => $id]);
            $view->assign('article'  , $article[0]);

        }

        else {

            header('Location: /inaccesible');
            exit(0);
        }

        // Partie POST

        if ($_POST) {

            if($mArticle->populate(["id"=> $_POST['id']])) {

                if ($mArticle->validate($_POST)) {

                    $mArticle->setId(intval($_POST['id']));
                    $mArticle->setTitre($_POST["titre"]);
                    $mArticle->setContent($_POST['content']);
                    $mArticle->save();

                    $_SESSION["flash"]["type"] = "success";
                    $_SESSION["flash"]["message"] = "L'article a bien été modifié";

                    header('Location: /article');
                    exit(0);
                }

                else {

                    $_SESSION["flash"]["type"] = "error";
                    $_SESSION["flash"]["message"] = "Champs invalides";

                    header('Location: /article/update/' .$_POST['id']);
                    exit(0);

                }

            }

            else {

                header('Location: /inaccesible');
                exit(0);
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