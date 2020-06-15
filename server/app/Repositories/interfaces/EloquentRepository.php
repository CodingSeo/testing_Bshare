<?php

namespace App\Repositories\Interfaces;

interface EloquentRepository
{

    public function getOne(int $id) : object;
    public function findAll(): array;
    public function updateByDTO(object $content): object;
    public function updateByContent(array $content): object;
    public function delete(object $content);
    public function save($content): object;
}
