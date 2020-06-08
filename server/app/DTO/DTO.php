<?php
namespace App\DTO;

interface DTO
{
   public function map($model);
   public function __construct(object $model);
   public function __get($name);
}
