<?php

class adminController extends Controller
{

    public function newPostAction()
    {
        $this->view('admin/new-post',
            [
                'title' => 'Neuen Post erstellen'
            ]
        );

        $this->view->render();
    }

    public function editPostAction()
    {
        $this->view('admin/edit-post',
            [
                'title' => "Post bearbeiten"
            ]
        );

        $this->view->render();
    }

    public function uploadPictureAction()
    {
        $this->view('admin/upload-picture',
            [
                'title' => "Bild hochladen"
            ]
        );

        $this->view->render();
    }

    public function savePostAction($postTitle, $postContent, $postCreatedAt = '')
    {
        $post = new Post();

        $post->setPostData($postTitle, $postContent, $postCreatedAt);
        $post->savePost();
    }

    public function saveCommentAction($commentAuthor, $commentEmail, $commentContent, $postCreatedAt)
    {
        $comment = new Comment();

        $comment->setCommentData($commentAuthor, $commentEmail, $commentContent, $postCreatedAt);
        $comment->saveComment();
    }

}