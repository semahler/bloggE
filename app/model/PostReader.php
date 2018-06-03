<?php

class PostReader extends AbstractReader
{
    protected $directoryPath;

    public function __construct()
    {
    }

    public function setPostDirectory($directoryName)
    {
        $this->directoryPath = DATA_DIR . $directoryName;
    }

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

    protected function checkPostDirectory()
    {
        if (is_dir($this->directoryPath)) {
            if (file_exists($this->directoryPath . '/post.json')) {
                return true;
            }
        }

        return false;
    }

    protected function preparePostData($post, $textPreviewMode, $parseText)
    {
        if ($parseText) {
            $Parsedown = new Parsedown();
            $post['post_content'] = $Parsedown->text($post['post_content']);
        }

        if ($textPreviewMode) {
            $post['post_content'] = $this->generateTextPreview($post['post_content']);
        }

        $post['post_url'] = '/index/read/' . $post['post_createdAt'];
        $post['id'] = $post['post_createdAt'];
        $post['post_createdAt'] = date('d/m/Y H:i', $post['post_createdAt']);
        $post['post_updatedAt'] = date('d/m/Y H:i', $post['post_updatedAt']);

        return $post;
    }

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