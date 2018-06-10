<?php

class Controller
{
    protected $view;

    /**
     * Initialize a new view model
     *
     * @param string $view_file
     * @param array $view_data
     *
     * @return View
     */
    public function view($view_file, $view_data = [], $show_header = true)
    {
        $this->view = new View($view_file, $view_data, $show_header);

        return $this->view;
    }
}