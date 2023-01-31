<?php
declare(strict_types=1);

namespace App\enums;
enum NewsStatus:string{
    case DRAFT = 'draft';
    case ACTIVE = 'activ';
    case BLOCKED = 'blocked';



 public static function all():array{
    return [

        self::DRAFT->value,
        self::ACTIVE->value,
        self::BLOCKED->value,


    ];
 }
}
?>