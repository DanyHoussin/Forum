<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        return[
            "view" => VIEW_DIR."security/register.php",
            "meta_description" => "Page d'inscription du forum"
            ];
    }
    public function registerTraitement () {
        if(isset($_POST['submit'])){

            $nickname = filter_input(INPUT_POST, "nickname", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $password1 = filter_input(INPUT_POST, "password1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password2 = filter_input(INPUT_POST, "password2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($nickname && $email && $password1 && $password2){
                
                $userManager = new UserManager();
                $emailVerif = $userManager->findEmail($email);
                var_dump($emailVerif);
                if($emailVerif){
                    header("index.php?ctrl=security&action=register");
                } else {
                    if($password1 == $password2 && strlen($password1) >= 5) {
                        $hashPassword = password_hash($password1, PASSWORD_DEFAULT);
                        $userManager->add(['nickname' => $nickname, 'email' => $email, 'password' => $hashPassword]);
                    }
                }
                return[
                    "view" => VIEW_DIR."security/login.php",
                    "meta_description" => "Page de connection du forum"
                    ];
            }
        }
    }

    public function login () {
        return[
            "view" => VIEW_DIR."security/login.php",
            "meta_description" => "Page de connection du forum"
            ];
    }


    public function loginTraitement () {
        $userManager = new UserManager();
        if(isset($_POST['submit'])){

            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($email && $password){

                $user = $userManager->findEmail($email);
                var_dump($user);
                if($user){
                    $hash = $user->getPassword();
                    if(password_verify($password, $hash)){
                        $_SESSION["user"] = $user;
                        $this->redirectTo("forum", "index");
                    }
                } else {
                    $this->redirectTo("security", "login");
                }
            } else{
                $this->redirectTo("security", "login");
            }
        }
    }
    public function logout () {
        unset($_SESSION["user"]);
        $this->redirectTo("security", "login");
    }
}