<?php
namespace App\Services\Interfaces;

interface CommentService{
    public function storeComment();
    public function updateComment();
    public function deleteComment();
}
