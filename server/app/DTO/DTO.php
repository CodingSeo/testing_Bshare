<?php
namespace App\DTO;

class DTO
{
   private $entity;

   public static function make($model)
   {
       return new self($model);
   }

   public function __construct($model)
   {
       $this->entity = (object) $model->toArray();
   }

   public function __get($name)
   {
    if (array_key_exists($name, (array) $this->entity)) {
        return $this->entity[$name];
    }else return null;
   }
}
