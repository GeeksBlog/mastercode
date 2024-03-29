<?php
require_once('../App/Conf/Database.php');
require_once('../App/Models/Article.php');
require_once('../App/Models/Comment.php');
require_once('../App/Models/DataUser.php');
require_once('../App/Models/Like.php');
require_once('../App/Models/ViewArticle.php');
class ArticleController
{
    use Crypt;
    // Déclaration des variables
    private $article, $id, $title, $image, $code_html, $category_id, $user_id, $created_at, $updated_at, $views;

    // sanitaze(); pour les espacements et les injections de codes
    public function sanitaze($data)
    {
        $reg = preg_replace("/\s+/", " ", $data);
        $reg = preg_replace("/^\s*/", "", $reg);
        $reg = htmlspecialchars($reg);
        $reg = stripslashes($reg);
        $data = $reg;
        return $data;
    }

    // Ajout des articles
    public function addArticles()
    {
        @session_start();
        if ((isset($_GET["categoryid"])) && (isset($_SESSION["Auth"]))) {
            $datas = file_get_contents("php://input");
            $datas = json_decode($datas);
            $this->category_id = $this->datadecrypt($_GET["categoryid"]);
            $this->user_id = $this->datadecrypt($_SESSION["Auth"]["id"]);
            $this->created_at = date("Y-m-d h:i:s");

            // instanciation de la classe model article
            $this->article = new Article();

            // Insertion de l'article
            $insert = $this->article->addArticle($datas->img, $datas->title, $datas->code_html, $datas->state, $this->category_id, $this->user_id, $this->created_at);
            $controller = "?goto=" . $this->datacrypt('dashboard');
            $action = "action=" . $this->datacrypt('articles');
            $url = $controller . "&" . $action;
            echo json_encode("$url");
        }
    }

    // Vérification du titre de l'article dans la bdd pour qu'il n'y ait pas de doublons
    public function verifyTitle()
    {
        $datas = file_get_contents("php://input");
        $datas = json_decode($datas);
        $this->article = new Article();
        $array = $this->article->getTitlesArticle($this->sanitaze($datas->title));
        if (count($array) == 0) {
            echo json_encode("good");
        } else {
            echo json_encode("Article_exist");
        }
    }


    public function verifyImgArticles()
    {
        // Réccupération du nom, du chemin, de la taille et de l'erreur de l'image
        $filename = $_FILES['file']['name'];
        $filetmp_name = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];
        $fileerror = $_FILES['file']['error'];

        // Extension de l'image
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        // Tableau d'extensions que nous acceptons
        $tab_ext = ["jpg", "jpeg", "png"];

        if (in_array($ext, $tab_ext)) {
            if ($filesize <= 10000000 && $fileerror === 0) {
                $file = uniqid("image", true);
                $filename = $file . "." . $ext;
                $location = '../public/ressources/images/images_principales/' . $filename;
                move_uploaded_file($filetmp_name, $location);
                echo json_encode($filename);
            } else {
                echo json_encode("Image non correcte");
            }
        }
    }


    // Suppression des articles one by one
    public function deleteOneArticle()
    {
        $datas = file_get_contents("php://input");
        $datas = json_decode($datas);
        $this->id = $this->datadecrypt($datas->id);

        // instanciation de la classe model article
        $this->article = new Article();
        $data = $this->article->getOneArticleById($this->id);
        unlink('../public/ressources/images/images_principales/' . $data[0]["article_image"]);

        // Suppression d'un article
        $array = $this->article->deleteOneArticle($this->id);
    }

    // Affiche tous les articles
    public function getAllArticles()
    {
        // instanciation de la classe model article
        $this->article = new Article();
        $array = $this->article->getAllArticles();
        return $array;
    }
    // Affiche tous les articles=>api
    public function apigetAllArticles()
    {
        // instanciation de la classe model article
        $this->article = new Article();
        $array = $this->article->getAllArticles();
        echo json_encode($array) ;
    }

    // Affiche tous les titres portant ces caractères
    public function getTitlesArticleLike()
    {
        $datas = file_get_contents("php://input");
        $datas = json_decode($datas);
        $value = $this->sanitaze($datas->value);
        // instanciation de la classe model article
        $this->article = new Article();
        $allArticles = $this->article->getTitlesArticleLike($value);
        // instanciation de la classe model viewsarticle
        $this->views = new ViewArticle();
        $comment = new Comment();
        $views = $this->views->getAllviewsArt();
        $numCom = $comment->getCountByArt();
        $like = new Like();
        $numLike = $like->getCountByLike();
        if (count($allArticles) > 0) {
            include_once("../App/Views/FrontendUser/searchArticle.phtml");
        }
    }

    // Affiche tous les titres portant ces caractères et appartenant à une catégorie spécifique
    public function getTitlesArticleLikeByCat()
    {
        $datas = file_get_contents("php://input");
        $datas = json_decode($datas);
        if (isset($_GET["categoryid"])) {
            $value = $this->sanitaze($datas->value);
            // instanciation de la classe model article
            $this->article = new Article();
            $allArticles = $this->article->getTitlesArticleLikeByCat($value, $this->datadecrypt($_GET["categoryid"]));
            // instanciation de la classe model viewsarticle
            $this->views = new ViewArticle();
            $comment = new Comment();
            $views = $this->views->getAllviewsArt();
            $numCom = $comment->getCountByArt();
            $like = new Like();
            $numLike = $like->getCountByLike();
            if (count($allArticles) > 0) {
                include_once("../App/Views/FrontendUser/searchCat.phtml");
            }
        }
    }
    // public function getAllArticleAtBrouillons()
    // {
    //     // instanciation de la classe model article
    //     $this->article = new Article();
    //     $array = $this->article->getAllArticlesAtBrouillons();
    //     return $array;
    // }

    // Affiche tous les articles en attente
    public function getAllArticlesAttente()
    {
        // instanciation de la classe model article
        $this->article = new Article();
        $array = $this->article->getAllArticlesAttente();
        return $array;
    }

    // Affiche tous les articles en attente par Session
    public function getAllArticlesAttenteBySession()
    {
        if (isset($_SESSION["Auth"])) {
            // instanciation de la classe model article
            $this->article = new Article();
            $array = $this->article->getAllArticlesAttenteBySession($_SESSION["Auth"]["pseudo"]);
            return $array;
        }
    }

    // Affiche tous les articles par Session
    public function getAllArticlesBySession()
    {
        if (isset($_SESSION["Auth"])) {
            // instanciation de la classe model article
            $this->article = new Article();
            $array = $this->article->getAllArticlesBySession($_SESSION["Auth"]["pseudo"]);
            return $array;
        }
    }

    // Affiche tous les articles publiés
    public function getAllArticlesPublier()
    {
        // instanciation de la classe model article
        $this->article = new Article();
        $array = $this->article->getAllArticlesPublier();
        return $array;
    }

    // Affiche tous les articles publiés appartenant à une catégoire
    public function getAllArticlesPublierByCat()
    {
        if (isset($_GET["categoryid"])) {
            // instanciation de la classe model article
            $this->article = new Article();
            $array = $this->article->getAllArticlesPublierByCat($this->datadecrypt($_GET["categoryid"]));
        }
        return $array;
    }

    // Pour afficher tous les titres des différents articles se trouvant dans la bdd
    public function getAllTitlesArticle()
    {
        // instanciation de la classe model article
        $this->article = new Article();
        $array = $this->article->getAllTitlesArticle();
        return $array;
    }

    public function getAllviewsArt()
    {
        // instanciation de la classe model viewsarticle
        $this->views = new ViewArticle();
        $array = $this->views->getAllviewsArt();
        return $array;
    }

    public function getAllviewsArtDesc()
    {
        // instanciation de la classe model viewsarticle
        $this->views = new ViewArticle();
        $array = $this->views->getAllviewsArtDesc();
        return $array;
    }

    public function getViewsById()
    {
        if (isset($_GET["articleid"])) {
            // instanciation de la classe model viewsarticle
            $this->views = new ViewArticle();
            $array = $this->views->getViewsById($this->datadecrypt($_GET["articleid"]));
            return $array;
        }
    }

    public function getAllComment()
    {
        if (isset($_GET["articleid"])) {
            // instanciation de la classe model viewsarticle
            $comment = new Comment();
            $array = $comment->getAllComment($this->datadecrypt($_GET["articleid"]));
            return $array;
        }
    }

    // Pour afficher un article spécifique
    public function getOneArticleById()
    {
        if (isset($_GET["id"])) {
            // instanciation de la classe model article
            $this->article = new Article();
            $id = $this->datadecrypt($_GET["id"]);
            $array = $this->article->getOneArticleById($id);
            return $array;
        }
    }
    // Pour afficher un article spécifique=>api
    public function apigetOneArticleById()
    {
        if (isset($_GET["articleid"])) {
            // instanciation de la classe model article
            $this->article = new Article();
            $id = $this->datadecrypt($_GET["articleid"]);
            $array = $this->article->getOneArticleById($id);
            echo json_encode($array) ;
        }
    }

    // Pour afficher un article spécifique
    public function getOneArticleByArtId()
    {
        if (isset($_GET["articleid"])) {
            // instanciation de la classe model article
            $this->article = new Article();
            $id = $this->datadecrypt($_GET["articleid"]);
            $array = $this->article->getOneArticleById($id);
            return $array;
        }
    }

    // Pour afficher les like qu'a un article
    public function selectCountLike()
    {
        if (isset($_GET["articleid"])) {
            // instanciation de la classe model like
            $like = new Like();
            $id = $this->datadecrypt($_GET["articleid"]);
            $array = $like->selectCount($id);
            return $array;
        }
    }

    // Pour afficher les like de chaque article
    public function getCountByLike()
    {
        // instanciation de la classe model like
        $like = new Like();
        $array = $like->getCountByLike();
        return $array;
    }

    // Tant qu'une catégorie a été choisie, il fait une redirection
    public function redirect()
    {
        $datas = file_get_contents("php://input");
        $datas = json_decode($datas);
        $categoryid = $this->datacrypt($datas->categoryid);
        $controller = "?goto=" . $this->datacrypt('dashboard');
        $action = "action=" . $this->datacrypt('editor');
        $id = "categoryid=" . $categoryid;
        $url = $controller . "&" . $id . "&" . $action;
        echo json_encode("$url");
    }

    // Compte le nombre d'articles qu'il y a dans la bdd
    public function countArticle()
    {
        // instanciation de la classe model article
        $this->article = new Article();
        $array = $this->article->countArticle();
        return $array;
    }

    // Connaître le pourcentage des utilisateurs venus dans ce mois
    public function statistique()
    {
        @session_start();
        $pastMonth = intval(date("m")) - 1;
        if ($pastMonth == 0) {
            $pastMonth = 12;
            $currentYear = intval(date("Y")) - 1;
        } else {
            $currentYear = intval(date("Y"));
        }
        $daysPastMonth = DaysPast::daysPastMonth($pastMonth, $currentYear);
        $this->article = new Article();
        if ($_SESSION["Auth"]["role"] === '0') {
            $datas = $this->article->getAllArticles();
        } else {
            $datas = $this->article->getAllArticlesBySession($_SESSION["Auth"]["pseudo"]);
        }
        // $datas = $this->article->getAllArticles();
        $dat = [];
        $articlesPasts = 0;
        for ($i = 0; $i < count($datas); $i++) {
            $el = explode(" ", $datas[$i]["created_at"])[0];
            array_push($dat, $el);
        }
        for ($i = 0; $i < count($dat); $i++) {
            if (in_array($dat[$i], $daysPastMonth)) {
                $articlesPasts += 1;
            }
        }

        // $pourcentage = (100 * $articles_month)/ count($array);
        // $pourcentage = (100 * $articles_month)/ 1;

        return $articlesPasts;
    }

    public function updateState()
    {
        $datas = file_get_contents("php://input");
        $datas = json_decode($datas);
        $this->id = $this->datadecrypt($datas->id);
        echo json_encode($this->id);

        // instanciation de la classe model article
        $this->article = new Article();
        $update = $this->article->updateState($this->id, "publier");
    }

    // Vérifie s'il y'a pas de doublons lors de la modification d'un article
    public function verifyUpArt()
    {
        $data = file_get_contents("php://input");
        $data = json_decode($data);
        $this->id = $this->datadecrypt($data->id);
        $this->article = new Article();
        $array = $this->article->getTitlesArticle($this->sanitaze($data->title));
        if (count($array) > 0) {
            if (intval($this->id) === intval($array[0]["article_id"])) {
                echo json_encode("good");
            } else {
                echo json_encode("error");
            }
        } else {
            echo json_encode("good");
        }
    }

    // Vérifie si l'image respecte certaines caractéristiques pour la modification
    public function verifyImgUpArt()
    {
        // Réccupération du nom, du chemin, de la taille et de l'erreur de l'image
        $filename = $_FILES['file']['name'];
        $filetmp_name = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];
        $fileerror = $_FILES['file']['error'];

        // Extension de l'image
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        // Tableau d'extensions que nous acceptons
        $tab_ext = ["jpg", "jpeg"];

        if (in_array($ext, $tab_ext)) {
            if ($filesize <= 10000000 && $fileerror === 0) {
                $file = uniqid("image", true);
                $filename = $file . "." . $ext;
                $location = '../public/ressources/images/images_principales/' . $filename;
                $img = $_GET["img"];
                unlink('../public/ressources/images/images_principales/' . $img);
                move_uploaded_file($filetmp_name, $location);
                echo json_encode($filename);
            } else {
                echo json_encode("Image non correcte");
            }
        }
    }

    public function updateOneArticle()
    {
        $datas = file_get_contents("php://input");
        $datas = json_decode($datas);
        $this->id = $this->datadecrypt($datas->id);
        $this->article = new Article();
        $this->updated_at = date("Y-m-d h:i:s");
        // Insertion de l'article
        $update = $this->article->updateOneArticle($this->id, $datas->title, $datas->img, $datas->code_html, $datas->state, $this->updated_at);
    }

    public function updateOneArticleWithOutImg()
    {
        $datas = file_get_contents("php://input");
        $datas = json_decode($datas);
        $this->id = $this->datadecrypt($datas->id);
        $this->article = new Article();
        $this->updated_at = date("Y-m-d h:i:s");
        // Insertion de l'article
        $update = $this->article->updateOneArticleWimg($this->id, $datas->title, $datas->code_html, $datas->state, $this->updated_at);
    }

    public function getCountByArt()
    {
        $comments = new Comment();
        $array = $comments->getCountByArt();
        return $array;
    }

    public function selectSessionId()
    {
        @session_start();
        if (isset($_SESSION["Auth"])) {
            $data = new DataUser();
            $array = $data->selectSession($this->datadecrypt($_SESSION["Auth"]["id"]));
            return $array;
        }
    }

    public function dataReg()
    {
        @session_start();
        if (isset($_SESSION["Auth"])) {
            $bigArray = [];
            $data = new DataUser();
            $array = $data->selectSession($this->datadecrypt($_SESSION["Auth"]["id"]));
            if (count($array) > 0) {
                for ($i = 0; $i < count($array); $i++) {
                    $now = time();
                    $dat = strtotime($array[$i]["created_at"]);
                    $diff = abs($now - $dat);
                    $second = $diff % 60;
                    $diff = floor(($diff - $second) / 60);
                    $minute = $diff % 60;
                    $diff = floor(($diff - $minute) / 60);
                    $hour = $diff % 24;
                    $diff = floor(($diff - $hour) / 24);
                    $day = (int) $diff;
                    if ($day >= 15) {
                        $data->deleteData($array[$i]["article_id"], $this->datadecrypt($_SESSION["Auth"]["id"]));
                    }
                }

                for ($i = 0; $i < count($array); $i++) {
                    $now = time();
                    $dat = strtotime($array[$i]["created_at"]);
                    $diff = abs($now - $dat);
                    $second = $diff % 60;
                    $diff = floor(($diff - $second) / 60);
                    $minute = $diff % 60;
                    $diff = floor(($diff - $minute) / 60);
                    $hour = $diff % 24;
                    $diff = floor(($diff - $hour) / 24);
                    $day = (int) $diff;
                    if ($day < 15) {
                        $bigArray[$i]["article_id"] = $array[$i]["article_id"];
                        $bigArray[$i]["day"] = $day;
                    }
                }

            }
            return $bigArray;
        }
    }

    public function catDomine()
    {
        $cat = new Category();
        $array = $cat->allCategories();
        $bigArray = [];
        $number = 0;
        foreach ($array as $key => $arr) {
            $arrays = $cat->allCountArtCat($arr["category_id"]);
            foreach ($arrays as $k => $val) {
                $number += $val["nombre"];
            }
            $bigArray[$arr["category_name"]] = $number;
            $number = 0;
        }
        asort($bigArray);
        $max = max($bigArray);
        foreach ($bigArray as $k => $big) {
            if ($big === $max) {
                $dominante = $k;
            }
        }
        return $dominante;
    }

}