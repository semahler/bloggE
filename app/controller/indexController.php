<?php

class indexController extends Controller
{
    public function indexAction()
    {
        $this->view('index/index',
            [
                'title' => 'bloggE - Blogging Platform',
                'posts' => []
            ]
        );

        $this->view->render();
    }

    public function readAction()
    {
        $this->view('index/read',
            [
                'title' => ''
            ]
        );

        $this->view->render();
    }

}