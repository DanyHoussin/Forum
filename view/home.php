<div class="home">
    <h1>Welcome to the lounge</h1>

    <p>Talk to whoever you want, whenever you want, about anything you want</p>
    <?php
    if(App\Session::getUser()){?>
        <a href="index.php?ctrl=forum&action=index">Liste des catégories</a>
    <?php
    }else{
    ?>
        <a href="index.php?ctrl=security&action=login">Se connecter</a>
        <a href="index.php?ctrl=security&action=register">S'inscrire</a>
    <?php
    }
    ?>
</div>