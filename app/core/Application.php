<?php


class Application
{
    protected $controller = 'indexController';
    protected $action = 'pageAction';
    protected $params = [];

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->prepareUrl();

        // Create a new instance of the controller, if the controller exists
        if (file_exists(CONTROLLER_DIR . $this->controller . '.php')) {
            $this->controller = new $this->controller;

            // Check if the given Action is available in the controller
            if (method_exists($this->controller, $this->action)) {
                // Call the action method, if exists
                call_user_func_array([$this->controller, $this->action], $this->params);
            }
        }
    }

    /**
     * Splitting the URL and define the called controller, method and parameters
     */
    protected function prepareUrl()
    {
        // Get the complete Url
        $requestUrl = $_SERVER['REQUEST_URI'];
        $requestUrl = str_replace(SUB_DIR, "", $requestUrl);

        if (isset($requestUrl)) {
            // Splitting the URL by slashes
            $requestUrl = trim($requestUrl, '/');
            $requestUrl = filter_var($requestUrl, FILTER_SANITIZE_URL); // Remove all illegal URL characters
            $requestUrl = explode('/', $requestUrl);

            // Set the controller
            if (!empty($requestUrl[0])) {
                $this->controller = $requestUrl[0].'Controller';
            }

            // Set the action (method=
            if (!empty($requestUrl[1])) {
                $this->action = $requestUrl[1].'Action';
            }
            unset($requestUrl[0], $requestUrl[1]);

            // Realize camel-case
            $this->action = str_replace('-', '', ucwords($this->action, '-'));
            $this->action = $str = lcfirst($this->action);

            // Setting the parameters
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