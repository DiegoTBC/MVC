<?php

namespace Src\Controllers;

use League\Plates\Engine;

class Controller
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../view", "php");
    }

    public function home($data)
    {
        echo $this->view->render("home", ["title" => "Home"]);
    }

    public function erro($data)
    {
        echo $this->view->render('erro', ['erro' => $data['errcode']]);
    }
}