<?php

class indexController extends Controller
{
    public function pageAction($pageNumber = 1)
    {
        $postReader = new PostReader();
        $postDirectories = $postReader->readPostDirectories();

        $commentReader = new CommentReader();

        $posts = [];
        foreach ($postDirectories as $postDirectory) {
            $postReader->setPostDirectory($postDirectory);
            $post = $postReader->getPost(true);

            $commentReader->setPostDirectory($postDirectory);
            $post['post_comment_count'] = $commentReader->getCommentCountForPost();

            $posts[] = $post;
        }

        $latestPosts = $this->slicePosts($posts, 0, NUMBER_OF_LATEST_POSTS);

        $totalNumberOfPosts = sizeof($posts);
        $pagination = $this->getPagination($totalNumberOfPosts, $pageNumber);

        $postOffset = $this->getPostOffsetByPageNumber($pageNumber);
        $posts = $this->slicePosts($posts, $postOffset, POSTS_PER_PAGE);

        $this->view('index/index',
            [
                'title' => DEFAULT_TITLE,
                'posts' => $posts,
                'pagination' => $pagination,
                'latestPosts' => $latestPosts

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

        $commentReader = new CommentReader();
        $commentReader->setPostDirectory($post_createdAt);
        $comments = $commentReader->getComments();

        $this->view('index/read',
            [
                'title' => $post['post_title'],
                'post' => $post,
                'comments' => $comments,

            ]
        );

        $this->view->render();
    }

    public function saveCommentAction($commentAuthor, $commentEmail, $commentContent, $postCreatedAt)
    {
        $commentWriter = new CommentWriter();

        $commentWriter->setCommentData($commentAuthor, $commentEmail, $commentContent, $postCreatedAt);

        $commentWriter->saveComment();
    }

    protected function getPagination($totalNumberOfPosts, $currentPage)
    {
        $paginationArr = [];

        $numberOfSites = ceil($totalNumberOfPosts / POSTS_PER_PAGE);

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

    protected function getPostOffsetByPageNumber($pageNumber)
    {
        $offset = 0;

        if ($pageNumber > 1) {
            $offset = ($pageNumber - 1) * POSTS_PER_PAGE;
        }

        return $offset;
    }

    protected function slicePosts($postArray, $offset, $length)
    {
        $postArray = array_slice($postArray, $offset, $length);

        return $postArray;
    }

}