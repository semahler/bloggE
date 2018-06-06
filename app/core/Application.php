<?php


class Application
{
    protected $controller = 'indexController';
    protected $action = 'pageAction';
    protected $params = [];

    public function __construct()
    {
        $this->prepareUrl();

        if (file_exists(CONTROLLER_DIR . $this->controller . '.php')) {
            $this->controller = new $this->controller;

            if (method_exists($this->controller, $this->action)) {
                call_user_func_array([$this->controller, $this->action], $this->params);
            }
        }
    }

    protected function prepareUrl()
    {
        $requestUrl = $_SERVER['REQUEST_URI'];
        $requestUrl = str_replace(SUB_DIR, "", $requestUrl);

        if (isset($requestUrl)) {
            $requestUrl = trim($requestUrl, '/');
            $requestUrl = filter_var($requestUrl, FILTER_SANITIZE_URL);
            $requestUrl = explode('/', $requestUrl);

            if (!empty($requestUrl[0])) {
                $this->controller = $requestUrl[0].'Controller';
            }

            if (!empty($requestUrl[1])) {
                $this->action = $requestUrl[1].'Action';
            }
            unset($requestUrl[0], $requestUrl[1]);

            $this->action = str_replace('-', '', ucwords($this->action, '-'));
            $this->action = $str = lcfirst($this->action);

            if (!empty($requestUrl)) {
                $this->params = array_values($requestUrl);
            }

            if (!empty($_POST)) {
                $this->params = array_values($_POST);
            }

            if (!empty($_FILES)) {
                $this->params = array_values($_FILES);
            }

        }
    }
}