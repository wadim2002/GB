<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\News as News;

class NewsController extends Controller
{

    use NewsTrait;
    
    public function index()
    {
        $model = new News();
        $NewsList = [];
        $NewsList = $model->getNews();
        //dd($NewsList);
        //return "Список новостей";
        //dd($this->getNews());
        //return $this->getNews();
        //return \view('news.index', ['news' => $this->getNews(), 'CategoryNews' => $this->getCategory()]);
        return \view('news.index', ['news' => $NewsList]);
    }
    public function show(int $id)
    {
        $model = new News();
        $News = $model->getNewsByID($id);

        //return "Это новость № $id";
        //dd($this->getNews($id));
        //return $this->getNews($id);
        //return \view('news.show', ['news' => $this->getNews($id), 'CategoryNews' => $this->getCategory($id)]);
        //dd($News);
        return \view('news.show', ['news' => $News]);
    }
}
