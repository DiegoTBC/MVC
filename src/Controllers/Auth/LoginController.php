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
        $emailIsValid = filter_var($data['email'], FILTER_VALIDATE_EMAIL);

        if (!$emailIsValid){
            $_SESSION['register_warning'] = "Email informado possui formato inválido";
            $this->router->redirect(url("login"));
        }

        $user = (new User())->find("email = :email", "email={$emailIsValid}")->fetch();
        $passwordIsValid = password_verify($data['password'], $user->password);

        if (!$user || !$passwordIsValid) {
            $_SESSION['login_warning'] =  "Email ou senha invalidos.";
            $this->router->redirect("login");
        }

        $_SESSION['auth'] = true;
        $this->router->redirect("");
    }
}