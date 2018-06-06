<?php

class PostReader extends AbstractReader
{
    protected $directoryPath;

    /**
     * Set the directory path of the post file to read
     *
     * @param string $directoryName
     */
    public function setPostDirectory($directoryName)
    {
        $this->directoryPath = DATA_DIR . $directoryName;
    }

    /**
     * Get all data of a post and return it as an array
     *
     * @param bool $textPreviewMode
     * @param bool $parseText
     * @return array|mixed
     */
    public function getPost($textPreviewMode = false, $parseText = true)
    {
        $post = [];

        if ($this->checkPostDirectory()) {

            $fileName = sprintf("%s/%s", $this->directoryPath, FILENAME_POST);
            $jsonString = $this->readFileToJsonString($fileName);

            $post = json_decode($jsonString, true);
            $post = $this->preparePostData($post, $textPreviewMode, $parseText);
        }

        return $post;
    }

    /**
     * Read out all available directories in the data-directory
     *
     * @return array
     */
    public function readPostDirectories()
    {
        $directoryArr = [];

        $handle = opendir(DATA_DIR);

        while ($dir = readdir($handle)) {
            if (is_dir(DATA_DIR . $dir)) {
                if ($dir != '.' && $dir != '..' && $dir != 'uploads') {
                    $directoryArr[] = $dir;
                }
            }
        }

        closedir($handle);

        rsort($directoryArr);

        return $directoryArr;
    }

    /**
     * Check if the directory and the file with the post exists at the expected path
     *
     * @return bool
     */
    protected function checkPostDirectory()
    {
        if (is_dir($this->directoryPath)) {
            if (file_exists($this->directoryPath . '/post.json')) {
                return true;
            }
        }

        return false;
    }

    /**
     * Collect and format the post
     * e.g. parsing the markdown content or limit the length for a preview
     *
     * @param array $post
     * @param bool $textPreviewMode
     * @param bool $parseText
     * @return mixed
     */
    protected function preparePostData($post, $textPreviewMode, $parseText)
    {
        if ($parseText) {
            $Parsedown = new Parsedown();
            $post['post_content'] = $Parsedown->text($post['post_content']);
        }

        if ($textPreviewMode) {
            $post['post_content'] = $this->generateTextPreview($post['post_content']);
        }

        $post['post_url'] = NAV_PATH_INDEX_READ . $post['post_createdAt'];
        $post['id'] = $post['post_createdAt'];
        $post['post_createdAt'] = date('d/m/Y H:i', $post['post_createdAt']);
        $post['post_updatedAt'] = date('d/m/Y H:i', $post['post_updatedAt']);

        return $post;
    }

    /**
     * Create the text-preview by limiting the number of chars
     *
     * @param string $text
     * @return string
     */
    protected function generateTextPreview($text)
    {
        if (strlen($text) > TEXT_PREVIEW_LENGTH) {
            $text = substr($text,0, TEXT_PREVIEW_LENGTH);
            $text = substr($text,0, strrpos($text,' '));
            $text.= '...';
        }

        return $text;
    }

}