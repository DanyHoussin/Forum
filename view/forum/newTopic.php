<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 

if(App\Session::getUser()){
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

<?php
} else {?>

<p> Oups, vous n'avez pas accès cette page, identifiez-vous d'abord.</p>
<a href="index.php?ctrl=security&action=login">Se connecter</a>
<a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php } ?>