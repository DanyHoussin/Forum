<div class="home">
    <div class="fond">
        <div class="welcome">
        <h1 class="roboto-bold">Bienvenu au lounge</h1>
                <p class="roboto-thin-italic">Parle à qui tu veux,</p>
                <p class="roboto-thin-italic">Quand tu veux,</p>
                <p class="roboto-thin-italic">Sur ce que tu veux.</p>
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