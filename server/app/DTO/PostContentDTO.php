<?php
namespace App\DTO\Content;
class PostContentDTO extends ContentDTO{
    protected $post_id;

    /**
     * Get the value of post_id
     */
    public function getPost_id()
    {
        return $this->post_id;
    }
}
