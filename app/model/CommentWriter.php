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

    /**
     * CommentWriter constructor.
     */
    public function __construct()
    {
        $this->commentReader = new CommentReader();
    }

    /**
     * Parse the data from the model to the class var's
     *
     * @param string $commentAuthor
     * @param string $commentEmail
     * @param string $commentContent
     * @param string $postCreatedAt
     */
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

    /**
     * Generate an array with the comment data, convert it to json and
     * write the content into a file
     */
    public function saveComment()
    {
        $commentArray = $this->createCommentArray();

        $jsonString = $this->createJsonStringToSave($commentArray);

        return $this->writeJsonStringToFile($jsonString);
    }

    /**
     * Generate and return a array with the comment data
     *
     * @return array
     */
    protected function createCommentArray()
    {
        return [
            'comment_author' => $this->author,
            'comment_email' => $this->email,
            'comment_content' => $this->content,
            'comment_createdAt' => date('d/m/Y H:i', $this->createdAt)
        ];
    }

    /**
     * Read out existing comments, add the new one to the array
     * and convert it to json string
     *
     * @param array $comment
     * @return string
     */
    public function createJsonStringToSave(array $comment)
    {
        $json = "";

        $commentArray = $this->getExistingComments();

        array_push($commentArray, $comment);

        $json = json_encode($commentArray, JSON_PRETTY_PRINT);

        return $json;
    }

    /**
     * Read out and returns an array of all comments for a post
     *
     * @return array
     */
    protected function getExistingComments()
    {
        $comments = [];

        $this->commentReader->setPostDirectory($this->directoryName);
        $comments = $this->commentReader->getComments();

        return $comments;
    }

    /**
     * Write the json-ified comments to the comment file
     *
     * @param $jsonString
     * @return bool
     */
    protected function writeJsonStringToFile($jsonString)
    {
        $handle = fopen($this->commentFile, 'w');

        if (!fwrite($handle, $jsonString)) {
            return false;
        }

        fclose($handle);

        return true;
    }
}