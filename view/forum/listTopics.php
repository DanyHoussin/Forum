<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics</h1>
<a href="index.php?ctrl=forum&action=newTopicInCategory&id=<?= $category->getId() ?>">Nouveau Topic</a>
<?php
foreach($topics as $topic){ ?>
    <p><a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>"><?= $topic ?></a> par <a href="#"><?= $topic->getUser() ?></a> le <?= $topic->getCreationDate()->format('d/m/Y à H:i') ?></p>
<?php }
// var_dump($topics);
