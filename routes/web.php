<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\NewsController as AdminNewsController;
use App\Http\Controllers\admin\IndexController as AdminIndexController;
use App\Http\Controllers\admin\SignController as AdminSignController;

use App\Http\Controllers\LKController as LKController;
use App\Http\Controllers\LikeController as LikeController;
use App\Http\Controllers\HisorylikeController as HisorylikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Стартовая страница
Route::get('/', function () {
    //dd(app());
    return view('welcome');
});


// Страница приветствия пользователя
Route::get('/hello/{name}', static function (string $name): string {
    return "Hello, {$name}";
});



// Страница для вывода одной и нескольких новостей.
Route::get('/ShowNews/{ID}', function (int $ID):string {
    $news = array(
        "1" => "Новость №1",
        "2" => "Новость вторая",
        "3" => "третья новость"
    );    
    return "Это {$news[$ID]}";
});

// Страницы с подключенным контроллером
Route::group([],static function(){
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/{id}/show', [NewsController::class, 'show'])->where('id', '\d+')->name('news.Show');
});

// Админка
Route::get('/AdminPanel', function () {
    return view('AdminPanel');
});
Route::group(['prefix'=>'admin'], static function(){
    Route::get('/', AdminIndexController::class)->name('admin.index');
    Route::resource('categories' , AdminCategoryController::class);
    Route::resource('news' , AdminNewsController::class);
    Route::get('sign' , AdminSignController::class)->name('admin.sign');;
    Route::post('lk' , LKController::class)->name('lk');;
});

// Роуты для отзывов
Route::group(['prefix'=>'like'], static function(){
    // Страница с информацией о проекте
    Route::get('/AboutProject', function ():string {return "Это учебный проект на курсе {Laravel. Глубокое погружение} ";});
    Route::get('send-like' , LikeController::class)->name('like');;
    Route::post('like-text' , HisorylikeController::class)->name('history');;
});
