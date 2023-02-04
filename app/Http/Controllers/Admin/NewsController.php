<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View as View;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\enums\NewsStatus;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use App\QueryBuilders\NewsQueryBuilder;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsQueryBuilder $newsQueryBuilder):View
    {
        // ORM
        //$NewsList = $newsQueryBuilder->getNewsByStatus('draft');
        //dd($newsQueryBuilder->getNewsWithPagination());
        // С пагинацией
        $NewsList = $newsQueryBuilder->getNewsWithPagination();
        
        // С пагинацией
        return \view('admin.news.index', ['news' => $NewsList]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoriesQueryBuilder $CategoriesQueryBuilder):View
    {
        //dd($CategoriesQueryBuilder->getAll());
        return \view('admin.news.create',
        ['categories' => $CategoriesQueryBuilder->getAll(),
        'statuses' => NewsStatus::all()
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request):RedirectResponse
    {
        //return 'Проверка отправки формы с новостью' - сохраняет в json;
        //$myJson = json_encode(response()->json($request->all()));
        //\file_put_contents('Datafile.json', $myJson);
        //return response()->json(['title' => $request->input('title')]);
        
        //$request->validate([
        //    'title'=>'required'
        //]);
        $news = new News();
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->autohor = $request->input('author');
        $news->image = $request->input('image');

        //$news = News::create($request);
        //dd($news);

        if ($news->save()){
            return \redirect()->route('admin.news');
        }
        return \back()->with('error', 'не удалось добавить новость');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id,CategoriesQueryBuilder $CategoriesQueryBuilder)
    {
        $news = new News();
        $news = $news->getNewsByID($id);
        return \view('admin.news.edit', ['news' => $news, 'categories' => $CategoriesQueryBuilder->getAll(), 'statuses' => NewsStatus::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
