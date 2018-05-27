<?php

class Post
{
    protected $title;
    protected $content;
    protected $createdAt;
    protected $updatedAt;
    protected $directoryPath;

    public function __construct()
    {
    }

    public function setPostData($postTitle, $postContent, $postCreatedAt)
    {
        $this->title = $postTitle;
        $this->content = $postContent;

        $this->createdAt = $postCreatedAt;
        if (!$this->createdAt) {
            $this->createdAt = time();
        }

        $directoryName = sprintf("Post_%s", $this->createdAt);
        $this->directoryPath = DATA_DIR . $directoryName;
    }

    public function savePost()
    {
        $this->createPostDirectory();

        $jsonString = $this->createJsonStringToSave();
        $this->writeJsonStringToFile($jsonString);
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
                'post_updated' => $this->updatedAt
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