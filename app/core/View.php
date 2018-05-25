<?php

class View
{
    protected $view_file;
    protected $view_data;

    public function __construct($view_file, $view_data)
    {
        $this->view_file = $view_file;
        $this->view_data = $view_data;
    }

    public function render()
    {
        require_once PAGE_HEAD_TEMPLATE_PATH;

        if (file_exists(VIEW_DIR . $this->view_file . '.php')) {
            require_once VIEW_DIR . $this->view_file . '.php';
        } else {
            // TODO: Add error-page
        }

        require_once PAGE_FOOT_TEMPLATE_PATH;
    }

    public function getAction()
    {
        $action = explode("\\", $this->view_file);
        $action = $action[1];

        return $action;
    }
}