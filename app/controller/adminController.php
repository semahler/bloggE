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

    public function savePostAction($post_title, $post_content, $post_created_at = '')
    {
        $post = new Post($post_title, $post_content, $post_created_at);
        $post->savePost();
    }

}