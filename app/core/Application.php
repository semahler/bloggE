<?php

class Application
{
    protected $controller = '';
    protected $action = '';
    protected $params = [];

    public function __construct()
    {
        //echo $_SERVER['REQUEST_URI'];
    }

    public function run()
    {
        $this->prepareUrl();

        if (file_exists(CONTROLLER_DIR . $this->controller . '.php')) {

            require_once CONTROLLER_DIR . $this->controller . '.php';
            $this->controller = new $this->controller;

            if (method_exists($this->controller, $this->action)) {
                call_user_func_array([$this->controller, $this->action], $this->params);
            }
        }

        echo 'Controller:' . $this->controller . "<br />";
        echo 'Action:' . $this->action . "<br />";

        echo 'Parameter:<br />';
        echo '<pre>';
        print_r($this->params);
        echo '</pre>';
    }

    protected function prepareUrl()
    {
        $requestUrl = $_SERVER['REQUEST_URI'];

        if (isset($requestUrl)) {

            $requestUrl = trim($requestUrl, '/');
            $requestUrl = filter_var($requestUrl, FILTER_SANITIZE_URL);
            $requestUrl = explode('/', $requestUrl);

            $this->controller = 'indexController';
            if ($requestUrl[0]) {
                $this->controller = $requestUrl[0].'Controller';
            }

            $this->action = 'indexAction';
            if ($requestUrl[1]) {
                $this->action = $requestUrl[1].'Action';
            }
            unset($requestUrl[0], $requestUrl[1]);

            if (isset($requestUrl)) {
                $this->params = array_values($requestUrl);
            }

        }
    }
}