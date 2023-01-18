<?php

declare (strict_types=1);

namespace App\Http\Controllers;

trait CategoryTrait
{
    public function getCategory(int $id = null)
    {
        
        $Category = [];
        $quantityCategory = 3;    

        if ($id === null)
        {
            for($i=1; $i < $quantityCategory; $i++){
                $Category[]=[
                    'category' => \fake()->text(10),
                ];
            }
            return $Category;
        }

        return [
            'category' => \fake()->text(10),
        ];

    }
}