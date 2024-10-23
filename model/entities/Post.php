<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Post extends Entity{

    private $id;
    private $messageText;
    private $creationDate;
    private $user_id;
    private $topic_id;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getMessageText(){
        return $this->messageText;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setMessageText($messageText){
        $this->messageText = $messageText;
        return $this;
    }

    /**
     * Get the value of user
     */ 
    
    public function getCreationDate(){
        return $this->creationDate;
    }
    public function setCreationDate($creationDate) {
        $this->creationDate = new \DateTime($creationDate);
    }
    
    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function getUser(){
        return $this->user_id;
    }
    public function setUser($user_id){
        $this->user_id = $user_id;
        return $this;
    }

    public function getTopic(){
        return $this->topic_id;
    }
    public function setTopic($topic_id){
        $this->topic_id = $topic_id;
        return $this;
    }
    
    public function __toString(){
        return $this->messageText;
    }
}