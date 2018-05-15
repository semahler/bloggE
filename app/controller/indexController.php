<?php

class indexController extends Controller
{
    public function indexAction()
    {
        $this->view('index/index');
        $this->view->render();
    }

}