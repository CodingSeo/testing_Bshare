<?php
namespace App\DTO\Mapper;

use App\DTO\DTO;
use JsonMapper;
use phpDocumentor\Reflection\Types\Mixed_;

class JSONMapperService implements MapperService{
    private $mapper;
    public function __construct(JsonMapper $mapper)
    {
        $mapper->bStrictNullTypes = false;
        $mapper->bEnforceMapType = false;
        $this->$mapper =$mapper;
    }
    public function map(Mixed_ $object,string $path){
        return $this->mapper->map($object,new $path);
    }
}
