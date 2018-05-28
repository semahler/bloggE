<?php

class indexController extends Controller
{
    public function pageAction($page = 1)
    {
        echo $page;
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