<?php
if(App\Session::getUser()){
    header("Location: index.php?ctrl=forum&action=index");
}else{ ?>
    <div class="home">
        <div class="fond">
            <div class="welcome">
                <h1 class="roboto-bold">Bienvenu au lounge</h1>
                <p class="roboto-thin-italic">Parle à qui tu veux,</p>
                <p class="roboto-thin-italic">Quand tu veux,</p>
                <p class="roboto-thin-italic">Sur ce que tu veux.</p>
            </div>
            <div class="login">
                <div class="loginContainer">
                    <h2>Se connecter</h2>
                    <form action="index.php?ctrl=security&action=loginTraitement" method="post">
                        <p>
                            <label>
                                <p>Email</p>
                                <input type="text" name="email" class="inputTextLogin" maxlength="255" placeholder="Entre ton email">
                            </label>
                        </p>
                        <p>
                            <label>
                                <p>Mot de passe</p>
                                <input type="password"  name="password" class="inputTextLogin" maxlength="255" placeholder="Entre ton mot de passe">
                            </label>
                            <a href="#" class="forgotPassword roboto-thin">Mot de passe oublié ?</a>
                        </p>
                        <p>
                            <input type="submit" class="btnLogin roboto-thin" name="submit" value="Me connecter">
                        </p>
                    </form>
                    <p class="signUp">Tu n'as pas de compte ? <a href="index.php?ctrl=security&action=register">Inscrit toi</a></p>
                </div>
            </div>
        </div>
    </div>
<?php
}