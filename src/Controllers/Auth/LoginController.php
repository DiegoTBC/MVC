<?php

namespace Src\Controllers\Auth;

use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Src\Models\User;

class LoginController
{
    private $view;
    private $router;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../../view/auth", "php");
        $this->router = new Router(URL_BASE);
    }

    public function index()
    {
        echo $this->view->render('login');
    }

    public function login($data)
    {
        $user = (new User())->find("email = :email", "email={$data['email']}")->fetch();
        if (!$user) {
            $_SESSION['login_warning'] =  "Usuario não existe";
            $this->router->redirect("login");
        }

        $passwordIsCorrect = password_verify($data['password'], $user->password);

        if (!$passwordIsCorrect) {
            $_SESSION['login_warning'] = "Email ou senha invalidos";
            $this->router->redirect("login");
        }

        $_SESSION['auth'] = true;
        $this->router->redirect("");
    }
}