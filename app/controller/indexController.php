<?php

class indexController extends Controller
{
    public function indexAction()
    {
        $this->view('index/index',
            ['title' => 'Titel']
        );

        $this->view->render();
    }

}