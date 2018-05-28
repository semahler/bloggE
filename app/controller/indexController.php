<?php

class indexController extends Controller
{
    public function indexAction()
    {

        $postReader = new PostReader();
        $postDirectories = $postReader->getPostDirectories();

        $posts = [];
        foreach ($postDirectories as $postDirectory) {
            $postReader->setPostDirectory($postDirectory);

            $posts[] = $postReader->getPost();
        }

        $this->view('index/index',
            [
                'title' => 'bloggE - Blogging Platform',
                'posts' => $posts
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