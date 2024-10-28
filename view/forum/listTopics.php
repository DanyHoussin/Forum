<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 

if(App\Session::getUser()){
?>

<h1>Liste des topics</h1>
<a href="index.php?ctrl=forum&action=newTopicInCategory&id=<?= $category->getId() ?>">Nouveau Topic</a>
<?php
foreach($topics as $topic){ ?>
    <p>
        <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>"><?= $topic ?></a> par <a href="#"><?= $topic->getUser() ?></a> le <?= $topic->getCreationDate()->format('d/m/Y à H:i') ?>
        <?php
        if(App\Session::getUser() == $topic->getUser()){
            if($topic->getClosed() == 0){?>
                <a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>">Verrouiller</a>
            <?php 
            } else {
                ?>
                <a href="index.php?ctrl=forum&action=unlockTopic&id=<?= $topic->getId() ?>">Deverrouiller</a>
            <?php }?>
            <a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>">Supprimer</a>
        <?php } } ?>
    </p>

<?php
} else {?>

<p> Oups, vous n'avez pas accès cette page, identifiez-vous d'abord.</p>
<a href="index.php?ctrl=security&action=login">Se connecter</a>
<a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php } ?>