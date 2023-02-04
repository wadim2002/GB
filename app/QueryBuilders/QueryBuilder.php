<?php

declare(strict_types=1);

namespace App\QueryBuilders;

//use Illuminate\DaraBase\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class QueryBuilder
{
    //abstract function setModel():void;
    abstract function getAll():Collection;
}



?>