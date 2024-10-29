<div class="home">
    <div class="fond">
        <div class="welcome">
            <h1 class="roboto-bold">Welcome to the lounge</h1>
            <p class="roboto-thin-italic">Talk to whoever you want,</p>
            <p class="roboto-thin-italic">Whenever you want,</p>
            <p class="roboto-thin-italic">About anything you want.</p>
        </div>

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
</div>