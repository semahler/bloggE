<?php

class CommentReader extends AbstractReader
{
    protected $directoryPath;

    public function __construct()
    {
    }

    public function setPostDirectory($directoryName)
    {
        $this->directoryPath = DATA_DIR . $directoryName;
    }

    public function getComments()
    {
        $comments = [];

        $fileName = sprintf("%s/%s", $this->directoryPath, FILENAME_COMMENTS);
        $jsonString = $this->readFileToJsonString($fileName);

        $comment = json_decode($jsonString, true);
        $comment = $this->prepareCommentData($comment);

        return $comments;
    }

    public function getCommentCountForPost()
    {
        $comments = $this->getComments();

        return count($comments);
    }

    protected function prepareCommentData($comment)
    {
        $comment['comment_createdAt'] = date('d/m/Y H:i', $comment['comment_createdAt']);

        return $comment;
    }

}