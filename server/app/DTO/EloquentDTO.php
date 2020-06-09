<?php

namespace App\DTO;
use App\DTO\DTO;

class EloquentDTO implements DTO
{
    private $entity;
    public function map($model)
    {
        return new self($model);
    }
    public function __construct(object $model)
    {
        $this->entity =  $model->toArray();
    }
    public function __get($name)
    {
        if (array_key_exists($name, (array) $this->entity)) {
            return $this->entity[$name];
        } else return null;
    }
}
