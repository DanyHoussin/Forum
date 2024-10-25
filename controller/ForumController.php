<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["id_category", "name"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function listTopicsByCategory($id) {

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }

    public function newTopicInCategory($id) {
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/newTopic.php",
            "meta_description" => "Nouveau topic dans la catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];

    }

    public function sendNewTopicInCategory($id) {
        if(isset($_POST['submit'])){

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $messageText = filter_input(INPUT_POST, "messageText", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($title && $messageText){
                $topicManager = new TopicManager();
                $categoryManager = new CategoryManager();
                $category = $categoryManager->findOneById($id);
                $topic_id = $topicManager->add(['title' => $title, 'category_id' => $id, 'user_id' => $_SESSION["user"]->getId()]);

                $postManager = new PostManager();
                $postManager->add(['messageText' => $messageText, 'user_id' => $_SESSION["user"]->getId(), 'topic_id' => $topic_id]);

                $topics = $topicManager->findTopicsByCategory($id);
            }
            $this->redirectTo("forum", "listTopicsByCategory", $id);
        }
    }

    
    public function listPostsByTopic($id) {

        $postManager = new PostManager();
        $topicManager = new TopicManager();
        $posts = $postManager->findPostsByTopics($id);
        $topic = $topicManager->findOneById($id);

        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Liste des posts dans le topic : ".$topic,
            "data" => [
                "posts" => $posts,
                "topic" => $topic
            ]
        ];
    }

    public function sendPostOnTopic($id) {
        if(isset($_POST['submit'])){

            $messageText = filter_input(INPUT_POST, "messageText", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($messageText){
                $postManager = new PostManager();
                $topicManager = new TopicManager();
                $topic = $topicManager->findOneById($id);
                $postManager->add(['messageText' => $messageText, 'user_id' => $_SESSION["user"]->getId(), 'topic_id' => $id]);
                $posts = $postManager->findPostsByTopics($id);
            }
            $this->redirectTo("forum", "listPostsByTopic", $id);
        }
    }

    public function deletePost($id) {
        $postManager = new PostManager();
        $post = $postManager->findOneById($id);
        $topic_id = $post->getTopic()->getId();
        if($topic_id){
            $postManager->delete($id);
            $this->redirectTo("forum", "listPostsByTopic", $topic_id);
        }

    }

    public function deleteTopic($id) {

        $topicManager = new TopicManager();
        $postManager = new PostManager();
        $posts = $postManager->findPostsByTopics($id);
        $topic = $topicManager->findOneById($id);
        $category = $topic->getCategory()->getId();
        var_dump($posts);
        // if($category){
        //     $posts->delete($id);
        //     $topicManager->delete($id);
        //     $this->redirectTo("forum", "listTopicsByCategory", $category);
        // }


    }
}
