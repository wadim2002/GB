<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View as View;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\enums\NewsStatus;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Enum;
use App\QueryBuilders\NewsQueryBuilder;
use App\Http\Requests\News\CreateRequest;

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
        //$newsList = News::all();
        //$newsList = News::where('author', 'ostreich')->where('status', 'draft')->get();
        //dd($newsList);
        //$NewsList = $newsQueryBuilder->getNewsByStatus('draft');
        //dd($newsQueryBuilder->getNewsWithPagination());
        // С пагинацией
        $newsList = $newsQueryBuilder->getNewsWithPagination();
        
        // С пагинацией
        return \view('admin.news.index', ['news' => $newsList]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoriesQueryBuilder $CategoriesQueryBuilder):View
    {
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
    public function store(CreateRequest $request):RedirectResponse
    {
        $news = new News($request->except('_token'));

        if ($news->save()){
            return \redirect('admin/news');
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
     * @param  News $news
     * @param  CategoriesQueryBuilder $CategoriesQueryBuilder
     * @return View
     */
    public function edit(News $news, CategoriesQueryBuilder $CategoriesQueryBuilder):View
    {
        return \view('admin.news.edit',
        ['news' => $news,
        'categories' => $CategoriesQueryBuilder->getAll(),
        'statuses' => NewsStatus::all()
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return Illuminate\Http\Response;
     */
    public function update(Request $request,News $news):RedirectResponse
    {
        
        
        $news = $news->fill($request->except('_token', 'category_ids'));
        if ($news->save()){
            $news->categories()->sync((array) $request->input('category_ids'));
            return redirect('admin/news')->with('success', 'Новоcть успешно обновлена');
        }
        return \back()->with('error','Не удалось обновить запись');
        
        //$news = $news->getNewsByID($id);
        //return \view('admin.news.edit', ['news' => $news, 'categories' => $CategoriesQueryBuilder->getAll(), 'statuses' => NewsStatus::all()]);
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
