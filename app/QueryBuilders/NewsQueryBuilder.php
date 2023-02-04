<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use Illuminate\DaraBase\Eloquent\Model;
use App\Models\News;
//use App\QueryBuilders\Collection;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\View;
//use Illuminate\LenghtAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator;

final class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function setModel(): void{
        $this->model = News::query();
    }

    public function __consruct()
    {
        $this->model = News::query();
    }

    public function getNewsByStatus(string $status): Collection
    {
        return News::query()->where('status', $status)->get();
    }

    public function getNewsWithPagination(int $quantity = 5): LengthAwarePaginator
    {
        return News::with('categories')->paginate($quantity);
    }


    public function getAll(): Collection
    {
        return News::query()->get();
    }


}



?>