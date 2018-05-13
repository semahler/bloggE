<?php

class Application
{
    protected $controller = '';
    protected $method = '';
    protected $params = [];

    public function __construct()
    {
        echo $_SERVER['REQUEST_URI'];
    }

}