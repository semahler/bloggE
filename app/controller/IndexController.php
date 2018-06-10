<?php

class IndexController extends Controller
{

    /**
     * Action to display a post with relevant data on the main-pages of the blog
     *
     * @param int $pageNumber
     */
    public function pageAction($pageNumber = 1)
    {
        $postReader = new PostReader();
        $postDirectories = $postReader->readPostDirectories(); // get all directories

        $commentReader = new CommentReader();

        $posts = [];
        //get all posts inside the directories
        foreach ($postDirectories as $postDirectory) {
            $postReader->setPostDirectory($postDirectory);
            $post = $postReader->getPost(true);

            // get saved comments to display the number
            $commentReader->setPostDirectory($postDirectory);
            $post['post_comment_count'] = $commentReader->getCommentCountForPost();

            $posts[] = $post;
        }

        // get the last n-posts to display in the sidebar
        $latestPosts = $this->slicePosts($posts, 0, NUMBER_OF_LATEST_POSTS);

        // create the pagination
        $totalNumberOfPosts = sizeof($posts);
        $pagination = $this->getPagination($totalNumberOfPosts, $pageNumber);

        // splitting an displaying the correct posts on the different pages
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

    /**
     * Action to display all available posts information and to read/create comments
     *
     * @param string $post_createdAt
     */
    public function readAction($post_createdAt)
    {
        if (!$post_createdAt) {

        }

        $postReader = new PostReader();
        $postReader->setPostDirectory($post_createdAt);
        $post = $postReader->getPost();


        $postDirectories = $postReader->readPostDirectories();

        $latestPosts = [];
        foreach ($postDirectories as $postDirectory) {
            $postReader->setPostDirectory($postDirectory);
            $latestPost = $postReader->getPost(true);

            $latestPosts[] = $latestPost;
        }
        $latestPosts = $this->slicePosts($latestPosts, 0, NUMBER_OF_LATEST_POSTS);

        $this->view('index/read',
            [
                'title' => $post['post_title'],
                'post' => $post,
                'latestPosts' => $latestPosts

            ]
        );

        $this->view->render();
    }


    public function saveCommentAction($commentAuthor, $commentEmail, $commentContent, $postCreatedAt)
    {
        $jsonData = [];

        $commentWriter = new CommentWriter();
        $commentWriter->setCommentData($commentAuthor, $commentEmail, $commentContent, $postCreatedAt);

        if (!$commentWriter->saveComment()) {
            $jsonData['success'] = false;
        }
        $jsonData['success'] = true;

        echo json_encode($jsonData);
    }

    public function getCommentsAction($postIdentifier)
    {
        $commentReader = new CommentReader();
        $commentReader->setPostDirectory($postIdentifier);
        $comments = $commentReader->getComments();

        $this->view('index/comments-section',
            [
                'comments' => $comments
            ],
            false
        );

        return json_encode($this->view->render());
    }

    /**
     * Creates the pagination for the sites and set the correct classes
     *
     * @param int $totalNumberOfPosts
     * @param int $currentPage
     *
     * @return array
     */
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
                'href' => NAV_PATH_INDEX_PAGE . $i,
                'class' => $class
            ];
        }

        return $paginationArr;
    }

    /**
     * Calculates the array-index of the last post displaying on a page
     *
     * @param int $pageNumber
     * @return float|int
     */
    protected function getPostOffsetByPageNumber($pageNumber)
    {
        $offset = 0;

        if ($pageNumber > 1) {
            $offset = ($pageNumber - 1) * POSTS_PER_PAGE;
        }

        return $offset;
    }

    /**
     * Splits the whole array and returns only a section of it for a page
     *
     * @param array $postArray
     * @param int $offset
     * @param int $length
     *
     * @return array
     */
    protected function slicePosts($postArray, $offset, $length)
    {
        $postArray = array_slice($postArray, $offset, $length);

        return $postArray;
    }

}