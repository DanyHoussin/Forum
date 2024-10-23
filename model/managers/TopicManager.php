<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class TopicManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les topics d'une catégorie spécifique (par son id)
    public function findTopicsByCategory($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.category_id = :id
                ORDER BY creationDate DESC";
                
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function sendTopic($id) {
        $pdo = new \PDO('mysql:host=127.0.0.1;port=3306;dbname=forum_dany', 'root', '');
        if(isset($_POST['submit'])){
            
            $title = $_POST['title'];
            $creationDate = new \DateTime();
            $category_id = $id;
            $user_id = 16;
            
            $stmt = $pdo->prepare("
            INSERT INTO topic (title, creationDate, category_id, user_id)
            VALUES 
            (:title, :creationDate, :category_id, :user_id)");
            
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':creationDate', $creationDate->format('Y-m-d H:i'));
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':user_id',$user_id);
            
            $stmt->execute();
            
            $messageText = $_POST['messageText'];
            
            $stmtt = $pdo->prepare("
            INSERT INTO post (messageText, creationDate, user_id, topic_id)
            VALUES 
            (:messageText, :creationDate, :user_id, :topic_id)");

            $stmtt->bindParam(':messageText', $messageText);
            $stmtt->bindParam(':creationDate', $creationDate->format('Y-m-d H:i'));
            $stmtt->bindParam(':user_id', $user_id);
            $stmtt->bindParam(':topic_id',$topic_id);
            
            $last_id = $pdo->lastInsertId();
            $topic_id = $last_id;
            
            $stmtt->execute();
            

            header("Location: index.php?ctrl=forum&action=listTopicsByCategory&id=$id");
        }

    }
}