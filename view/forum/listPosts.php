<?php
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts']; 
?>

<h1>Liste des posts</h1>

<?php
foreach($posts as $post ){ ?>
    <p>
        <?= $post ?> par <a href="#"><?= $post->getUser() ?></a> le <?= $post->getCreationDate()->format('d/m/Y à H:i')  ?>
        <?php
        if(App\Session::getUser() == $post->getUser()){?>
            <a href="index.php?ctrl=forum&action=deletePost&id=<?= $post->getId() ?>">Supprimer</a>
        <?php } } ?>
    </p>

<form action="index.php?ctrl=forum&action=sendPostOnTopic&id=<?= $topic->getId() ?>" method="post">
    <p>
        <label>
            <textarea type="text" name="messageText"></textarea>
        </label>
    </p>
    <p>
        <input type="submit" name="submit" value="Répondre">
    </p>
</form>
