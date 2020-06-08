<?php
namespace App\Services\Interfaces;

interface PostService{
    public function getPost();
    public function storePost();
    public function updatePost();
    public function deletePost();
}
