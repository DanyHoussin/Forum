<?php
if(App\Session::getUser()){
    header("Location: index.php?ctrl=forum&action=index");
}else{ ?>
<div class="homeRegister">
        <div class="fondRegister">
            <div class="register">
                <div class="registerContainer">
                    <h2>Inscription</h2>
                    <form action="index.php?ctrl=security&action=registerTraitement" method="post">
                        <p>
                            <label>
                                <p>Pseudo</p>
                                <input type="text" name="nickname" class="inputTextLogin" maxlength="255" placeholder="Entre ton pseudo">
                            </label>
                        </p>
                        <p>
                            <label>
                                <p>Email</p>
                                <input type="email"  name="email" class="inputTextLogin" maxlength="255" placeholder="Entre ton email">
                            </label>
                        </p>
                        <p>
                            <label>
                                <p>Mot de passe</p>
                                <input type="password"  name="password1" class="inputTextLogin" maxlength="255" placeholder="Entre ton mot de passe">
                            </label>
                        </p>
                        <p>
                            <label>
                                <p>Confirmer Mot de passe</p>
                                <input type="password"  name="password2" class="inputTextLogin" maxlength="255" placeholder="Entre ton mot de passe">
                            </label>
                        </p>
                        <p>
                            <input type="submit" name="submit" class="btnLogin roboto-thin" value="M'inscrire">
                        </p>
                    </form>
                    <p class="signUp">Tu as déjà un compte ? <a href="index.php?ctrl=security&action=login">Connecte toi</a></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>