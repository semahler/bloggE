<?php

class indexController extends Controller
{
    public function pageAction($page = 1)
    {
        $postReader = new PostReader();
        $postDirectories = $postReader->getPostDirectories();
        $postDirectories = array_reverse($postDirectories);

        $posts = [];
        foreach ($postDirectories as $postDirectory) {
            $postReader->setPostDirectory($postDirectory);

            $posts[] = $postReader->getPost();
        }

        $pagination = $this->getPagination(sizeof($posts), $page);

        $this->view('index/index',
            [
                'title' => 'bloggE - Blogging Platform',
                'posts' => $posts,
                'pagination' => $pagination

            ]
        );

        $this->view->render();
    }

    public function readAction($post_createdAt)
    {
        if (!$post_createdAt) {

        }

        $postReader = new PostReader();
        $postReader->setPostDirectory($post_createdAt);
        $post = $postReader->getPost();

        $this->view('index/read',
            [
                'title' => $post['post_title'],
                'post' => $post
            ]
        );

        $this->view->render();
    }

    protected function getPagination($numberOfPosts, $currentPage)
    {
        $paginationArr = [];

        $numberOfSites = ceil($numberOfPosts / POST_PER_PAGE);

        for ($i = 1; $i <= $numberOfSites; $i++) {

            $class = "";
            if ($currentPage == $i) {
                $class = "uk-active";
            }

            $paginationArr[$i] = [
                'href' => '/index/page/' . $i,
                'class' => $class
            ];
        }

        return $paginationArr;
    }

}