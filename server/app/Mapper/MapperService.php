<?php
namespace App\DTO\Mapper;

use phpDocumentor\Reflection\Types\Mixed_;

interface MapperService{
    public function map(Mixed_ $object,string $path);
}
