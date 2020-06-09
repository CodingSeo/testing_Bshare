<?php
namespace App\DTO;

interface DTO
{
    public static function map($model);
    public function __get($name);
}
