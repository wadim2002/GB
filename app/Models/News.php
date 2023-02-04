<?php

declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\BelongToMany;


class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillabe = [

        'title',
        'autohor',
        'status',
        'description',
        'image'

    ];

    public function getNews():array
    {
        $data = [];
        $data = DB::select("select * from {$this->table}");
        //dd($data);
        return $data;
    }

    public static function getNewsByID(int $id):mixed
    {
        return \DB::selectOne("select * from news where id= :id", ['id'=> $id]);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_has_news','news_id','categories_id','id','id');
    }

    protected $casts = [
        'categories_id' => 'array',
    ];




}
