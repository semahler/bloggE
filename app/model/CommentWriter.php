<?php

class CommentWriter
{
    protected $author;
    protected $email;
    protected $content;
    protected $createdAt;
    protected $postCreatedAt;
    protected $directoryPath;
    protected $directoryName;
    protected $commentFile;
    protected $commentReader;

    public function __construct()
    {
        $this->commentReader = new CommentReader();
    }

    public function setCommentData($commentAuthor, $commentEmail, $commentContent, $postCreatedAt)
    {
        $this->author = $commentAuthor;
        $this->email = $commentEmail;
        $this->content = $commentContent;
        $this->createdAt = time();
        $this->postCreatedAt = $postCreatedAt;

        $this->directoryName = $this->postCreatedAt;
        $directoryPath = DATA_DIR . $this->directoryName;
        $this->commentFile = $directoryPath . '/' . FILENAME_COMMENTS;
    }

    public function saveComment()
    {
        $commentArray = $this->createCommentArray();

        $jsonString = $this->createJsonStringToSave($commentArray);

        $this->writeJsonStringToFile($jsonString);
    }

    protected function createCommentArray()
    {
        return [
            'comment_author' => $this->author,
            'comment_email' => $this->email,
            'comment_content' => $this->content,
            'comment_createdAt' => date('d/m/Y H:i', $this->createdAt)
        ];
    }

    public function createJsonStringToSave(array $comment)
    {
        $json = "";

        $commentArray = $this->getExistingComments();

        array_push($commentArray, $comment);

        $json = json_encode($commentArray, JSON_PRETTY_PRINT);

        return $json;
    }

    protected function getExistingComments()
    {
        $comments = [];

        $this->commentReader->setPostDirectory($this->directoryName);
        $comments = $this->commentReader->getComments();

        return $comments;
    }

    protected function writeJsonStringToFile($jsonString)
    {
        $handle = fopen($this->commentFile, 'w');
        fwrite($handle, $jsonString);

        fclose($handle);
    }
}