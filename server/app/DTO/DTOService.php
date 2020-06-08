<?php
namespace App\DTO;

interface DTO
{
   public static function make($model);
   public function __construct($model);
   public function __get($name);
}
