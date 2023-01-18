<?php

declare (strict_types=1);

namespace App\Http\Controllers;

trait NewsTrait
{
    
    public function getNews(int $id = null)
    {
        
        $News = [];
        $quantityNews = 4;    
        if ($id === null)
        {
            for($i=0; $i < $quantityNews; $i++){
                $News[]=[
                    'id' => $i,
                    'category' => $this->getCategory($i),
                    'title' => \fake()->jobtitle(),
                    'description' => \fake()->text(100),
                    'autor' => \fake()->username(),
                    'create_at' => \now()->format('d-m-Y H:i'),
                ];
            }

            return $News;
        }

        return [
            'id' => $id,
            'category' => $this->getCategory($id),
            'title' => \fake()->jobtitle(),
            'description' => \fake()->text(100),
            'autor' => \fake()->username(),
            'create_at' => \now()->format('d-m-Y H:i'),
        ];

    }



    public function getCategory(int $id = null)
    {
        
        $Category = [];
        $quantityCategory = 5;    
        if ($id === null)
        {
            for($i=0; $i < $quantityCategory; $i++){
                $Category[]=[
                    'id' => $i,
                    'category' => \fake()->text(5),
                ];
            }

            return $Category;
        }

        return [
            'id' => $id,
            'category' => \fake()->text(5),
        ];

    }
}