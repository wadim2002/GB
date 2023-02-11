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

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\UserController as UserController;
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

// Страницы с подключенным контроллером
Route::group([],static function(){
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/{id}/show', [NewsController::class, 'show'])->where('id', '\d+')->name('news.Show');
    Route::get('/news/create', [NewsController::class, 'store'])->name('news.store');
});


Route::group(['middleware'=>'auth'],static function (){
    Route::get('/logout', [LoginController::class, 'logout'])->name('account.logout');
    Route::get('/account', AccountController::class)->name('account');
    // Admin group
    Route::group(['prefix'=>'admin', 'middleware'=>'is.admin'], static function(){
        Route::get('/', AdminIndexController::class)->name('admin.index');
        Route::resource('categories' , AdminCategoryController::class);
        //Route::get('/news/create' , [AdminNewsController::class,'create'])->name('admin.news.create');
        Route::resource('news' , AdminNewsController::class);
        //Route::get('news' , [AdminNewsController::class,'index'])->name('admin.news');
        //Route::get('news/update/', [AdminNewsController::class,'update'])->name('admin.news.update');
        Route::get('sign' , AdminSignController::class)->name('admin.sign');
        Route::post('lk' , LKController::class)->name('lk');
        Route::get('users' , [UserController::class, 'index'])->name('admin.users');
        Route::get('changeUserRole' , [UserController::class, 'changeRoleInAdmin'])->name('user.changeRoleInAdmin');
    });
});
// Роуты для отзывов
Route::group(['prefix'=>'like'], static function(){
    // Страница с информацией о проекте
    Route::get('/AboutProject', function ():string {return "Это учебный проект на курсе {Laravel. Глубокое погружение} ";})->name('about');
    Route::get('send-like' , LikeController::class)->name('like');;
    Route::post('like-text' , HisorylikeController::class)->name('history');;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
