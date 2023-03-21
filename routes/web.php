<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\BlogController;
use App\Http\Controllers\FrontEnd\ContactController as FrontContactController;
use App\Http\Controllers\FrontEnd\SystemController as FrontSystemsController;
use App\Http\Controllers\FrontEnd\PostsController as FrontPostsController;

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\SystemsController;
use App\Http\Controllers\Admin\CustomerCareController;
use CKSource\CKFinderBridge\Controller\CKFinderController;
use App\Http\Controllers\Admin\NewsController;

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



Route::any('/ckfinder/connector', [CKFinderController::class, 'requestAction'])
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', [CKFinderController::class, 'browserAction'])
    ->name('ckfinder_browser');

Route::any('/ckfinder/examples/{example?}', [CKFinderController::class, 'examplesAction'])
    ->name('ckfinder_examples');

Auth::routes();
//front routes
Route::group([
    'as' => 'front.',
], function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/search', [HomeController::class, 'search'])
        ->name('search.project');

    Route::get('/trang-chu', [HomeController::class, 'index'])
        ->name('trang-chu');

    Route::get('/gioi-thieu', [FrontPostsController::class, 'index'])
        ->name('gioi-thieu');

    Route::get('/lao-dong-nhat-ban', [FrontPostsController::class, 'byCategory'])
        ->name('lao-dong-nhat-ban');

    Route::get('/thuc-tap-sinh', [FrontPostsController::class, 'show'])
        ->name('thuc-tap-sinh');

    Route::get('/thong-tin-don-hang', [FrontSystemsController::class, 'index'])
        ->name('thong-tin-don-hang');

    Route::get('/hoat-dong-ptm', [FrontSystemsController::class, 'show'])
        ->name('hoat-dong-ptm');

    Route::get('/ptmtv', [CustomerCareController::class, 'index'])
        ->name('ptmtv');

    Route::get('/tin-tuc-ptm', [BlogController::class, 'index'])
        ->name('tin-tuc-ptm');

    Route::get('/goc-nhat-ban', [BlogController::class, 'byCategory'])
        ->name('goc-nhat-ban');

    Route::get('/lien-he', [BlogController::class, 'show'])
        ->name('lien-he');

    Route::get('/dang-ky-tu-van', [FrontContactController::class, 'index'])
        ->name('dang-ky-tu-van');

    Route::post('/dang-ky-tu-van', [FrontContactController::class, 'store'])
        ->name('dang-ky-tu-van.store');

});

//admin routes
Route::group([
    'as' => 'admin.',
    'middleware' => ['admin', 'auth'],
    'prefix' => 'admin',
], function () {
    Auth::routes();
    Route::get('/home', [AdminHomeController::class, 'index'])
        ->name('home');
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
//    Route::resource('systems', SystemsController::class);
    Route::resource('posts', PostsController::class);
    Route::resource('banners', BannerController::class);
//    Route::resource('introduces', \App\Http\Controllers\Admin\IntroduceController::class);
//    Route::resource('news', NewsController::class);
    Route::resource('contacts', ContactsController::class);
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
