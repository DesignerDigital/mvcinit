<?php
ob_start();
require dirname(__DIR__,1)."/vendor/autoload.php";

use CoffeeCode\Router\Router;

session_start();
$router = new Router(SITE['URL_BASE']);

/**
 * routes
 * The controller must be in the namespace Test\Controller
 * this produces routes for route, route/$id, route/{$id}/profile, etc.
 */
$router->namespace("DCabral\Controllers\Web");

$router->group(null);
$router->get("/", "Home:index","home.index");


// API Routes
//$router->namespace("IeqChurch\Controllers\Api\Login");
$router->group("api");

/**
 * Group Error
 * This monitors all Router errors. Are they: 400 Bad Request, 404 Not Found, 405 Method Not Allowed and 501 Not Implemented
 */
$router->group("error")->namespace("IeqChurch\Controllers\Error");
$router->get("/{errcode}", "Coffee:notFound");

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}
ob_end_flush();