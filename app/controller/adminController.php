<?php

class adminController extends Controller
{

    public function newPostAction()
    {
        $this->view('admin/new-post',
            [
                'title' => 'Neuen PostWriter erstellen'
            ]
        );

        $this->view->render();
    }

    public function editPostAction()
    {
        $this->view('admin/edit-post',
            [
                'title' => "PostWriter bearbeiten"
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
        $postWriter = new PostWriter();

        $postWriter->setPostData($postTitle, $postContent, $postCreatedAt);
        $postWriter->savePost();
    }

    public function saveCommentAction($commentAuthor, $commentEmail, $commentContent, $postCreatedAt)
    {
        $commentWriter = new CommentWriter();

        $commentWriter->setCommentData($commentAuthor, $commentEmail, $commentContent, $postCreatedAt);
        $commentWriter->saveComment();
    }

}