<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct(){
        parent::connect();
    }

        // récupérer tous les posts d'un topic spécifique (par son id)
    public function findPostsByTopics($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.topic_id = :id
                ORDER BY creationDate";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function sendPost($id) {
        $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=forum_dany', 'root', '');
        if(isset($_POST['submit'])){
            
            $messageText = $_POST['messageText'];
            $creationDate = new \DateTime();
            $user_id = 16;
            $topic_id = $id;

            $stmt = $pdo->prepare("
            INSERT INTO post (messageText, creationDate, user_id, topic_id)
             VALUES 
              (:messageText, :creationDate, :user_id, :topic_id)");
            
            $stmt->bindParam(':messageText', $messageText);
            $stmt->bindParam(':creationDate', $creationDate->format('Y-m-d H:i'));
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':topic_id',$topic_id);
        
            $stmt->execute();
            header("Location: index.php?ctrl=forum&action=listPostsByTopic&id=$id");
        }

    }
}