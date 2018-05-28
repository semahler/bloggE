<?php

class indexController extends Controller
{
    public function pageAction($page = 1)
    {
        $pagination = $this->getPagination(8, $page);

        $this->view('index/index',
            [
                'title' => 'Titel',
                'pagination' => $pagination

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