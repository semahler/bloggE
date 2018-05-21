<?php

class Controller
{
    protected $view;

    public function view($view_file, $view_data = [])
    {
        $this->view = new View($view_file, $view_data);

        return $this->view;
    }
}