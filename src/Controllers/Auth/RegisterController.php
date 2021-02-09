<?php


namespace Src\Controllers\Auth;

use CoffeeCode\Router\Router;
use League\Plates\Engine;
use Src\Models\User;

class RegisterController
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
        echo $this->view->render('register');
    }


    public function create($data)
    {
        $emailIsValid = filter_var($data['email'], FILTER_VALIDATE_EMAIL);

        if (!$emailIsValid){
            $_SESSION['register_warning'] = "Email informado possui formato inválido";
            $this->router->redirect(url("register"));
        }

        $user = (new User())->find("email = :email", "email={$emailIsValid}")->fetch();
        if ($user) {
            unset($user);
            $_SESSION['register_warning'] = "Email ja cadastrado";
            $this->router->redirect(url("register"));
        }

        $user = new User();
        $user->name = ucwords($data['name']);
        $user->email = filter_var($emailIsValid, FILTER_SANITIZE_EMAIL);
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->save();

        $_SESSION['auth'] = true;
        $this->router->redirect(url(""));
    }

}