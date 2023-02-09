<?php

declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
//use App\Models\BelongToMany;
//use App\Models\hasOne;
use Illuminate\Support\Collections;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = array(
        'title',
        'author',
        'status',
        'description',
        'image',
    );

    public function getNews():array
    {
        $data = [];
        $data = DB::select("select * from {$this->table}");
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

    public function sourses(): hasOne
    {
        return $this->hasOne(Sourses::class);
    }

    protected $casts = [
        'categories_id' => 'array',
    ];
}
