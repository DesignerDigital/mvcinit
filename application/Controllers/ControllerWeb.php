<?php

namespace Name\Controllers;

use CoffeeCode\Router\Router;
use League\Plates\Engine;

abstract class ControllerWeb
{
    /**
     * @var Engine
     */
    public Engine $views;

    public Router $router;

    public function __construct($router)
    {
        $this->views = new Engine(dirname(__DIR__, 2) . "/views/", "php");
        $this->router = $router;
    }
}