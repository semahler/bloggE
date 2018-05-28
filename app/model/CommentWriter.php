<?php

class CommentWriter
{
    protected $author;
    protected $email;
    protected $content;
    protected $createdAt;
    protected $postCreatedAt;
    protected $directoryPath;

    public function __construct()
    {
    }

    public function setCommentData($commentAuthor, $commentEmail, $commentContent, $postCreatedAt)
    {
        $this->author = $commentAuthor;
        $this->email = $commentEmail;
        $this->content = $commentContent;
        $this->createdAt = time();
        $this->postCreatedAt = $postCreatedAt;

        $directoryName = sprintf("Post_%s", $this->createdAt);
        $this->directoryPath = DATA_DIR . $directoryName;
    }

    public function saveComment()
    {
        $jsonString = $this->createJsonStringToSave();
        $this->writeJsonStringToFile($jsonString);
    }

    protected function createJsonStringToSave()
    {
        $json = json_encode(
            [
                'comment_author' => $this->author,
                'comment_email' => $this->email,
                'comment_content' => $this->content,
                'comment_createdAt' => $this->createdAt
            ]
        );

        return $json;
    }

    protected function writeJsonStringToFile($jsonString)
    {
        $fileName = $this->directoryPath . '/comments.json';

        $handle = fopen($fileName, 'a');
        fwrite($handle, $jsonString);

        fclose($handle);
    }
}