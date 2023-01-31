<?php

declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews():array
    {
        $data = [];
        $data = DB::select("select * from {$this->table}");
        //dd($data);
        return $data;
    }

    public function getNewsByID(int $id):mixed
    {
        return \DB::selectOne("select * from {$this->table} where id= :id", ['id'=> $id]);
    }

}
