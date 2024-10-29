<?php
if(App\Session::getUser()){
    header("Location: index.php?ctrl=forum&action=index");
}else{ ?>
    <div class="home">
        <div class="fond">
            <div class="welcome">
                <h1 class="roboto-bold">Welcome to the lounge</h1>
                <p class="roboto-thin-italic">Talk to whoever you want,</p>
                <p class="roboto-thin-italic">Whenever you want,</p>
                <p class="roboto-thin-italic">About anything you want.</p>
            </div>
            <div class="login">
                <div class="loginContainer">
                    <h2>Sign In</h2>
                    <form action="index.php?ctrl=security&action=loginTraitement" method="post">
                        <p>
                            <label>
                                <p>Email</p>
                                <input type="text" name="email" class="inputTextLogin" maxlength="255" placeholder="Enter your Email">
                            </label>
                        </p>
                        <p>
                            <label>
                                <p>Password</p>
                                <input type="password"  name="password" class="inputTextLogin" maxlength="255" placeholder="Enter your password">
                            </label>
                            <a href="#" class="forgotPassword roboto-thin">Forgot password ?</a>
                        </p>
                        <p>
                            <input type="submit" class="btnLogin roboto-thin" name="submit" value="Login">
                        </p>
                    </form>
                    <p class="signUp">You don't have an account ? <a href="index.php?ctrl=security&action=register">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
<?php
}