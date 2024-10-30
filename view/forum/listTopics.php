<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 

if(App\Session::getUser()){
?>
    <div class="listTopic">
        <p class="getBack"><a href="index.php?ctrl=forum&action=index"><i class="fa-solid fa-arrow-left"></i> Revenir dans les catégories</a></p>
        <h1>Liste des topics - <?= $category->getName() ?></h1>
        <a class="btnNewTopic" href="index.php?ctrl=forum&action=newTopicInCategory&id=<?= $category->getId() ?>">Nouveau Topic</a>
        <ul class="topics">
            <?php
                if($topics == NULL){?>
                    <p>Aucun sujet trouvé</p>
                <?php } else {
                foreach($topics as $topic){ ?>
                <li>
                    <div class="topicInfo">
                        <?php if($topic->getClosed() == 0){ ?>
                            <div class="unlockBox"></div>
                        <?php } else { ?>
                            <div class="lockBox"></div>
                        <?php } ?>
                        <div class="topicDetail">
                            <p><a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>"><?= $topic ?><p></a>
                            <p>Par <a href="#"><?= $topic->getUser() ?></a> le <?= $topic->getCreationDate()->format('d/m/Y à H:i') ?>
                        </div>
                    </div>
                    <?php
                    if(App\Session::getUser() == $topic->getUser()){?>
                        <div class="topicSettings">
                        <?php if($topic->getClosed() == 0){?>
                            <a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>"><i class="fa-solid fa-lock"></i></a>
                            <?php 
                        } else {
                            ?>
                            <a href="index.php?ctrl=forum&action=unlockTopic&id=<?= $topic->getId() ?>"><i class="fa-solid fa-lock-open"></i></a>
                        <?php }?>
                            <a href="index.php?ctrl=forum&action=deleteTopic&id=<?= $topic->getId() ?>"><i class="fa-solid fa-trash"></i></a>
                        </div>
                </li>
            <?php } } } ?>
        </ul>
    </div>
<?php
} else {?>

<p> Oups, vous n'avez pas accès cette page, identifiez-vous d'abord.</p>
<a href="index.php?ctrl=security&action=login">Se connecter</a>
<a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php } ?>