<?php

class indexController extends Controller
{
    public function indexAction()
    {
        $this->view('index/index',
            [
                'title' => 'Titel'
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