<?php
    $categories = $result["data"]['categories']; 

if(App\Session::getUser()){
?>
<div class="listCategorie">
    <h1>Liste des catégories</h1>
    <ul class="categories">
        <?php
        foreach($categories as $category ){ ?>
            <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><li><?= $category->getName() ?></li></a>
        <?php } ?>
    </div>
</div>
<?php } else { ?>

<p> Vous n'avez pas accès cette page, identifiez-vous.</p>
<a href="index.php?ctrl=security&action=login">Se connecter</a>
<a href="index.php?ctrl=security&action=register">S'inscrire</a>
<?php } ?>