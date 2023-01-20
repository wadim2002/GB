<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class NewsController extends Controller
{

    use NewsTrait;
    
    public function index()
    {
        //return "Список новостей";
        //dd($this->getNews());
        //return $this->getNews();
        return \view('news.index', ['news' => $this->getNews(), 'CategoryNews' => $this->getCategory()]);
    }
    public function show(int $id)
    {
        //return "Это новость № $id";
        //dd($this->getNews($id));
        //return $this->getNews($id);
        return \view('news.show', ['news' => $this->getNews($id), 'CategoryNews' => $this->getCategory($id)]);
    }
}
