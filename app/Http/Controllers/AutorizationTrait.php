<?php

declare (strict_types=1);

namespace App\Http\Controllers;

trait AutorizationTrait
{
    public function verify(stirng $username):bool
    {
        return true;

    }
}