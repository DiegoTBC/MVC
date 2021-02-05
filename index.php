<?php

use CoffeeCode\Router\Router;

require 'vendor/autoload.php';

$router = new Router(URL_BASE);

/**
 * routes
 * The controller must be in the namespace Src\Controllers
 * this produces routes for route, route/$id, route/{$id}/profile, etc.
 */
$router->namespace("Src\Controllers");

$router->group(null);
$router->get("/", "Controller:home", "controller.home");

$router->get("/register", "Auth\RegisterController:index");
$router->post("/register", "Auth\RegisterController:create");

$router->get("/login", "Auth\LoginController:index");
$router->post("/login", "Auth\LoginController:login");

/**
 * group by routes and namespace
 * this produces routes for /admin/route and /admin/route/$id
 * The controller must be in the namespace Dash\Controller
 */
//$router->group("admin")->namespace("Dash");
//$router->get("/route", "Controller:method");
//$router->post("/route/{id}", "Controller:method");

/**
 * Group Error
 * This monitors all Router errors. Are they: 400 Bad Request, 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
$router->group("ooops");
$router->get("/{errcode}", "Controller:erro" );

/**
 * This method executes the routes
 */
$router->dispatch();

/**
 * Redirect all errors
 */
if ($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}