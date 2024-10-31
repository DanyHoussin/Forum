<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 

if(App\Session::getUser()){
?>
<div class="newTopic">
    <p class="getBack"><a href="index.php?ctrl=forum&action=index"><i class="fa-solid fa-arrow-left"></i> Revenir dans les catégories</a></p>

    <h1>Ajouter un topic</h1>
    <form action="index.php?ctrl=forum&action=sendNewTopicInCategory&id=<?= $category->getId() ?>" method="post">
        <p class="title">
            <label>
                Titre du Topic :
                <input type="text" name="title" class="form-control" maxlength="255" cols="100%" placeholder="Entre ton titre">
            </label>
        </p>
        <p class="messageTopic">
            <label>
                Post :
                <textarea type="text"  name="messageText" cols="100%" placeholder="Entre ton message"></textarea>
            </label>
        </p>
        <p>
            <input type="submit" class="sendPost" name="submit" value="Créer le topic">
        </p>
    </form>
</div>
<?php
} else {?>
<div class="restrictPage">
    <div class="messageRestrict">
        <p>Vous n'avez pas accès cette page, identifiez-vous d'abord.</p>
        <div>
            <a href="index.php?ctrl=security&action=login">Se connecter</a>
            <a href="index.php?ctrl=security&action=register">S'inscrire</a>
        </div>
    </div>
</div>
<?php } ?>