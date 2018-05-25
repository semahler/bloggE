<?php

class Post
{
    protected $title;
    protected $content;
    protected $createdAt;
    protected $updatedAt;

    public function __construct($post_title, $post_content, $post_created_at = '')
    {
        $this->title = $post_title;
        $this->content = $post_content;

        $this->createdAt = $post_created_at;
        if (!$this->createdAt) {
            $this->createdAt = time();
        }
    }

    public function savePost()
    {

    }





}