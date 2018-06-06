<?php

class CommentReader extends AbstractReader
{
    protected $directoryPath;

    /**
     * Set the directory path of the comment file to read
     *
     * @param string $directoryName
     */
    public function setPostDirectory($directoryName)
    {
        $this->directoryPath = DATA_DIR . $directoryName;
    }

    /**
     * Get all comments from the file
     *
     * @return array
     */
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

    /**
     * Get the number of comments for a post
     *
     * @return int
     */
    public function getCommentCountForPost()
    {
        $comments = $this->getComments();

        return count($comments);
    }


}