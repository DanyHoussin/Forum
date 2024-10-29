<?php
if(App\Session::getUser()){
    header("Location: index.php?ctrl=forum&action=index");
}else{ ?>
<div class="homeRegister">
        <div class="fondRegister">
            <div class="register">
                <div class="registerContainer">
                    <h2>Registration</h2>
                    <form action="index.php?ctrl=security&action=registerTraitement" method="post">
                        <p>
                            <label>
                                <p>Nickname</p>
                                <input type="text" name="nickname" class="inputTextLogin" maxlength="255" placeholder="Enter your nickname">
                            </label>
                        </p>
                        <p>
                            <label>
                                <p>Email</p>
                                <input type="email"  name="email" class="inputTextLogin" maxlength="255" placeholder="Enter your Email">
                            </label>
                        </p>
                        <p>
                            <label>
                                <p>Password</p>
                                <input type="password"  name="password1" class="inputTextLogin" maxlength="255" placeholder="Enter your password">
                            </label>
                        </p>
                        <p>
                            <label>
                                <p>Confirm Password</p>
                                <input type="password"  name="password2" class="inputTextLogin" maxlength="255" placeholder="Enter your password">
                            </label>
                        </p>
                        <p>
                            <input type="submit" name="submit" class="btnLogin roboto-thin" value="Sign me up">
                        </p>
                    </form>
                    <p class="signUp">You already have an account ? <a href="index.php?ctrl=security&action=login">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>