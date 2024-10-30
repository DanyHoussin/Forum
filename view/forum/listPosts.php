<?php
    $topic = $result["data"]['topic']; 
    $posts = $result["data"]['posts']; 

if(App\Session::getUser()){
?>
    <div class="listPost">
        <p class="getBack"><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $topic->getCategory()->getId() ?>"><i class="fa-solid fa-arrow-left"></i> Revenir dans les topics</a></p>
        <div class="topicInfoInPost">
            <h3><?= $topic->getTitle() ?></h3>
            <p>Par <a href="#"><?= $topic->getUser() ?></a></p>
        </div>
        <ul class="posts">
            <?php
            foreach($posts as $post ){ ?>
                <li>
                    <div class="postByUser">
                        <div class="user">
                            <p><a href="#"><?= $post->getUser() ?></a></p>
                            <p>Posté le <?= $post->getCreationDate()->format('d/m/Y à H:i')  ?></p>
                        </div>
                        <div class="messageText">
                            <p><?= $post ?></p> 
                        </div>
                        <?php
                        if(App\Session::getUser() == $post->getUser()){?>
                        <div class="">
                            <a href="index.php?ctrl=forum&action=deletePost&id=<?= $post->getId() ?>"><i class="fa-solid fa-trash"></i></a>
                        <?php }?>
                    </div>
                </li>
            <?php } ?>
        </ul>
            <?php 
            if($topic->getClosed() == 0){?>
                <div class="sendPostForm">
                    <form action="index.php?ctrl=forum&action=sendPostOnTopic&id=<?= $topic->getId() ?>" method="post">
                        <p>
                            <label>
                                <textarea type="text" name="messageText" cols="100%" placeholder="Enter your message"></textarea>
                            </label>
                        </p>
                        <p>
                            <input class="sendPost" type="submit" name="submit" value="Répondre">
                        </p>
                    </form>
                </div>
            <?php } else { ?>
                <div class="topicLockMessage">
                    <strong><i class="fa-solid fa-lock"></i> le sujet est verrouillé, vous ne pouvez pas poster.</strong>
                </div>
            <?php } ?>
            </div>
<?php } else {?>

<p> Oups, vous n'avez pas accès cette page, identifiez-vous d'abord.</p>
<a href="index.php?ctrl=security&action=login">Se connecter</a>
<a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php } ?>