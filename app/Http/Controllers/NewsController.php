<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\News as News;
use App\QueryBuilders\NewsQueryBuilder;

//use App\Http\Controllers\View;
use Illuminate\View\View;



class NewsController extends Controller
{

    use NewsTrait;
    
    public function update(Request $request, News $news):RedirectResponse
    {

    }
    
    public function index(NewsQueryBuilder $newsQueryBuilder):View
    {
        // ORM
        //$NewsList = $newsQueryBuilder->getNewsByStatus('draft');

        // С пагинацией
        $NewsList = $newsQueryBuilder->getNewsWithPagination();
        
        // PDO
        //$model = new News();
        //$NewsList = [];
        //$NewsList = $model->getNews();
        
        // Mosk
        //return \view('news.index', ['news' => $this->getNews(), 'CategoryNews' => $this->getCategory()]);
        
        // PDO
        //return \view('news.index', ['news' => $NewsList]);
        
        // С пагинацией
        return \view('news.index', ['news' => $NewsList]);
    }
    public function show(int $id)
    {
        $model = new News();
        $News = $model->getNewsByID($id);

        //dd($this->getNews($id));
        //return $this->getNews($id);
        //return \view('news.show', ['news' => $this->getNews($id), 'CategoryNews' => $this->getCategory($id)]);
        //dd($News);
        return \view('news.show', ['news' => $News]);
    }
    
}
