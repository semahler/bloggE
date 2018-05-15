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
        if (file_exists(VIEW_DIR . $this->view_file . '.php')) {
            require_once VIEW_DIR . $this->view_file . '.php';
        }
    }

    public function getAction()
    {
        $action = explode("\\", $this->view_file);
        $action = $action[1];

        return $action;
    }
}