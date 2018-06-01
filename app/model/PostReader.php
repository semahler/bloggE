<?php



class PostReader
{
    protected $directoryPath;

    public function __construct()
    {
    }

    public function getPostDirectories()
    {
        $directoryArr = [];

        $handle = opendir(DATA_DIR);

        while ($dir = readdir($handle)) {
            if (is_dir(DATA_DIR . $dir)) {
                if ($dir != '.' && $dir != '..') {
                    $directoryArr[] = $dir;
                }
            }
        }

        closedir($handle);

        return $directoryArr;
    }

    public function setPostDirectory($directoryName)
    {
        $this->directoryPath = DATA_DIR . $directoryName;
    }

    public function getPost()
    {
        $post = [];

        if ($this->checkPostDirectory()) {
            $jsonString = $this->readFileToJsonString();

            $post = json_decode($jsonString, true);
            $post = $this->preparePostData($post);
        }

        return $post;
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

    protected function readFileToJsonString()
    {
        $fileContent = "";

        $fileName = $this->directoryPath . '/post.json';
        $handle = fopen($fileName, 'r');

        $fileContent = fread($handle, filesize($fileName));
        fclose($handle);

        return $fileContent;
    }

    protected function preparePostData($post)
    {
        $Parsedown = new Parsedown();

        $post['post_content'] = $Parsedown->text($post['post_content']);
        $post['post_url'] = '/index/read/' . $post['post_createdAt'];
        $post['post_createdAt'] = date('d/m/Y H:i', $post['post_createdAt']);
        $post['post_updatedAt'] = date('d/m/Y H:i', $post['post_updatedAt']);

        return $post;
    }

}