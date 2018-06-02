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

        if ($jsonString) {
            $comments = json_decode($jsonString, true);
        }

        return $comments;

    }

    public function getCommentCountForPost()
    {
        $comments = $this->getComments();

        return count($comments);
    }


}