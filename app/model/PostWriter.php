<?php

class PostWriter
{
    protected $title;
    protected $content;
    protected $createdAt;
    protected $updatedAt;
    protected $directoryPath;
    protected $postFile;


    /**
     * Set the directory path of the post file to write
     *
     * @param string $directoryName
     */
    public function setPostDirectory($directoryName)
    {
        $this->directoryPath = DATA_DIR . $directoryName;
    }

    /**
     *  Parse the data from the model to the class var's
     *
     * @param string $postTitle
     * @param string $postContent
     * @param string $postCreatedAt
     */
    public function setPostData($postTitle, $postContent, $postCreatedAt)
    {
        $this->title = $postTitle;
        $this->content = $postContent;

        $this->createdAt = $postCreatedAt;
        if (!$this->createdAt) {
            $this->createdAt = time();
        }

        $this->setPostDirectory($this->createdAt);
        $this->postFile = $this->directoryPath . '/' . FILENAME_POST;
    }

    /**
     * Generate an array with the post data, convert it to json and
     * write the content into a file
     */
    public function savePost()
    {
        $this->createPostDirectory();

        $jsonString = $this->createJsonStringToSave();
        $this->writeJsonStringToFile($jsonString);
    }

    /**
     * Delete a post and the comment-file from the server
     */
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

    /**
     * Create a new directory for a post, if not exists
     */
    protected function createPostDirectory()
    {
        if(!is_dir($this->directoryPath)) {
            mkdir($this->directoryPath, 0755, true);

        }
    }

    /**
     * Generate an array with the data of a post and convert it to json string
     *
     * @return string
     */
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

    /**
     * Write the json-ified post to the post-file
     *
     * @param string $jsonString
     */
    protected function writeJsonStringToFile($jsonString)
    {
        $handle = fopen($this->postFile, 'w');

        fwrite($handle, $jsonString);

        fclose($handle);
    }
}