<?php

namespace Name\Controllers;

class Home extends ControllerWeb
{
    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function index()
    {
        echo $this->views->render('pages/index',[

        ]);
    }
}