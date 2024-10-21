<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {
        return[
            "view" => VIEW_DIR."security/register.php",
            "meta_description" => "Page d'inscription du forum"
            ];
    }
    public function login () {
        return[
        "view" => VIEW_DIR."security/login.php",
        "meta_description" => "Page de connection du forum"
        ];
    }
    public function logout () {}
}