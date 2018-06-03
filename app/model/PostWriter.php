<?php

class PostWriter
{
    protected $title;
    protected $content;
    protected $createdAt;
    protected $updatedAt;
    protected $directoryPath;

    public function __construct()
    {
    }

    public function setPostDirectory($directoryName)
    {
        $this->directoryPath = DATA_DIR . $directoryName;
    }

    public function setPostData($postTitle, $postContent, $postCreatedAt)
    {
        $this->setPostDirectory($postCreatedAt);

        $this->title = $postTitle;
        $this->content = $postContent;

        $this->createdAt = $postCreatedAt;
        if (!$this->createdAt) {
            $this->createdAt = time();
        }
    }

    public function savePost()
    {
        $this->createPostDirectory();

        $jsonString = $this->createJsonStringToSave();
        $this->writeJsonStringToFile($jsonString);
    }

    public function deletePost()
    {
        $postFile = $this->directoryPath . '/' . FILENAME_POST;
        if (file_exists($postFile)) {
            @unlink($postFile);
        }

        $commentFile = $this->directoryPath . '/' . FILENAME_COMMENTS;
        if (file_exists($commentFile)) {
            @unlink($commentFile);
        }

        @rmdir($this->directoryPath);
    }

    protected function createPostDirectory()
    {
        if(!is_dir($this->directoryPath)) {
            mkdir($this->directoryPath, 0755, true);
        }
    }

    protected function createJsonStringToSave()
    {
        $this->updatedAt = time();

        $json = json_encode(
            [
                'post_title' => $this->title,
                'post_content' => $this->content,
                'post_createdAt' => $this->createdAt,
                'post_updatedAt' => $this->updatedAt
            ]
        );

        return $json;
    }

    protected function writeJsonStringToFile($jsonString)
    {
        $fileName = $this->directoryPath . '/post.json';

        $handle = fopen($fileName, 'w');

        fwrite($handle, $jsonString);

        fclose($handle);
    }
}