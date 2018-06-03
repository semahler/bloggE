<?php

class adminController extends Controller
{

    public function newPostAction()
    {
        $this->view('admin/new-post',
            [
                'title' => 'Create a new post'
            ]
        );

        $this->view->render();
    }

    public function selectPostAction()
    {
        $postReader = new PostReader();
        $postDirectories = $postReader->readPostDirectories();

        $posts = [];
        foreach ($postDirectories as $postDirectory) {
            $postReader->setPostDirectory($postDirectory);
            $post = $postReader->getPost(true);

            $posts[] = $post;
        }

        $this->view('admin/select-post',
            [
                'title' => 'Select a post',
                'posts' => $posts
            ]
        );

        $this->view->render();
    }

    public function editPostAction($post_createdAt)
    {
        $postReader = new PostReader();
        $postReader->setPostDirectory($post_createdAt);
        $post = $postReader->getPost(false, false);

        $this->view('admin/edit-post',
            [
                'title' => 'Edit post',
                'post' => $post
            ]
        );

        $this->view->render();
    }

    public function deletePostAction($post_createdAt)
    {
        $postWriter = new PostWriter();

        $postWriter->setPostDirectory($post_createdAt);
        $postWriter->deletePost();

        header('Location: /admin/select-post');
    }

    public function uploadPictureAction()
    {
        $this->view('admin/upload-picture',
            [
                'title' => "Upload pictures"
            ]
        );

        $this->view->render();
    }

    public function savePostAction($postTitle, $postContent, $postCreatedAt = '')
    {
        $postWriter = new PostWriter();

        $postWriter->setPostData($postTitle, $postContent, $postCreatedAt);
        $postWriter->savePost();

        header('Location: /');
    }

}