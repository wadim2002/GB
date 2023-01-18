<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


// Страница приветствия пользователя
Route::get('/hello/{name}', static function (string $name): string {
    return "Hello, {$name}";
});

// Страница с информацией о проекте
Route::get('/AboutProject', function ():string {
    return "Это учебный проект на курсе {Laravel. Глубокое погружение} ";
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
