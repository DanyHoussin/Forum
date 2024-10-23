<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Ajouter un topic</h1>
<form action="index.php?ctrl=forum&action=sendNewTopicInCategory&id=<?= $category->getId() ?>" method="post">
    <p>
        <label>
            Titre du Topic :
            <input type="text" name="title" class="form-control" maxlength="255">
        </label>
    </p>
    <p>
        <label>
            Post :
            <textarea type="text"  name="messageText"></textarea>
        </label>
    </p>
    <p>
        <input type="submit" class="btn btn-success" name="submit" value="Créer le topic">
    </p>
</form>
