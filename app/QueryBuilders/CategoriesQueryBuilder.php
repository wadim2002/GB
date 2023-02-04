<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use Illuminate\DaraBase\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\View;

final class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __consruct()
    {
        $this->model = Category::query();
    }
    
    public function setModel(): void{
        $this->model = Category::query();
    }

    public function getAll(): Collection
    {
        return Category::query()->get();
    }
}

?>