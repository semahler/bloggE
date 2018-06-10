<?php

class AdminController extends Controller
{

    /**
     * Action to create a new post
     */
    public function newPostAction()
    {
        $this->view('admin/new-post',
            [
                'title' => 'Create a new post'
            ]
        );

        $this->view->render();
    }

    /**
     * Action to read all saved posts and display it in a table
     */
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

    /**
     * Action to load the saved data for a specified post and display it in the edit-form
     *
     * @param string $post_createdAt
     */
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

    /**
     * Action to delete a specified post
     *
     * @param string $post_createdAt
     */
    public function deletePostAction($post_createdAt)
    {
        $postWriter = new PostWriter();

        $postWriter->setPostDirectory($post_createdAt);
        $postWriter->deletePost();

        $redirect = sprintf('Location: %s', NAV_PATH_ADMIN_SELECT_POST);
        header($redirect);
    }

    /**
     * Action to save a new or edited posts
     *
     * @param string $postTitle
     * @param string $postContent
     * @param string $postCreatedAt
     */
    public function savePostAction($postTitle, $postContent, $postCreatedAt = '')
    {
        $postWriter = new PostWriter();

        $postWriter->setPostData($postTitle, $postContent, $postCreatedAt);
        $postWriter->savePost();

        $redirect = sprintf('Location: %s', NAV_PATH_HOME);
        header($redirect);
    }

    /**
     * Action to read all saved posts and display it in a table
     *
     * @param string $error
     */
    public function managePictureAction($error = '')
    {
        $pictureManager = new PictureManager();
        $pictures = $pictureManager->getUploadedPictures();

        $errorMessage = "";
        switch ($error) {
            case 'unknown_error':
                $errorMessage = "An unknown error occurred while uploading the picture.";
            break;
            case 'error_wrong_file_type':
                $validFileTypes = implode(",", PICTURE_UPLOAD_FILETYPES);
                $validFileTypes = str_replace("image/", "", $validFileTypes);

                $errorMessage = sprintf("Only files of the types %s are allowed", $validFileTypes);
            break;
            case 'error_file_size' :
                $errorMessage = sprintf("The maximum file size for uploads is %s kb", PICTURE_UPLOAD_MAX_FILESIZE);
            break;
        }

        $this->view('admin/manage-picture',
            [
                'title' => "Upload pictures",
                'pictures' => $pictures,
                'errorMessage' => $errorMessage
            ]
        );

        $this->view->render();
    }

    /**
     * Action to upload a new picture to the server
     *
     * @param array $picture
     */
    public function savePictureAction($picture)
    {
        $pictureManager = new PictureManager();

        $result = $pictureManager->uploadPicture($picture);

        switch ($result) {
            case 3:
                $redirectUrl = NAV_PATH_ADMIN_MANAGE_PICTURE . 'unknown_error';
            break;
            case 2:
                $redirectUrl = NAV_PATH_ADMIN_MANAGE_PICTURE . 'error_wrong_file_type';
                break;
            case 1:
                $redirectUrl = NAV_PATH_ADMIN_MANAGE_PICTURE . 'error_file_size';
                break;
            default:
                $redirectUrl = NAV_PATH_ADMIN_MANAGE_PICTURE;
        }

        $redirect = sprintf('Location: %s', $redirectUrl);
        header($redirect);
    }

    /**
     * Action to delete a specified picture from the server
     *
     * @param string $pictureName
     */
    public function deletePictureAction($pictureName)
    {
        $pictureManager = new PictureManager();

        list ($key, $pictureName) = explode('=', $pictureName);
        $pictureManager->deletePicture($pictureName);

        $redirect = sprintf('Location: %s', NAV_PATH_ADMIN_MANAGE_PICTURE);
        header($redirect);
    }

}