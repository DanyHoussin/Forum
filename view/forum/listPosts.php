<?php
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts']; 

if(App\Session::getUser()){
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

<?php 
if($topic->getClosed() == 0){?>
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

<?php } else { ?>
    <strong> le sujet est verrouillé, vous ne pouvez pas poster</strong>
<?php } 

} else {?>

<p> Oups, vous n'avez pas accès cette page, identifiez-vous d'abord.</p>
<a href="index.php?ctrl=security&action=login">Se connecter</a>
<a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php } ?>