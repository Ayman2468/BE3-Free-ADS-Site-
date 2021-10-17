<?php

use App\Models\category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization as FacadesLaravelLocalization;

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
define('paginationcount', 24);

Route::group([
    'prefix' => FacadesLaravelLocalization::setlocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
],function(){
Route::get('safety', function () {
    return view('rules.safety');
});
Route::get('privacy', function () {
    return view('rules.privacy');
});
Route::get('terms', function () {
    return view('rules.terms');
});
Route::get('cars', function () {
    return view('cars.cars');
});
Route::get('real-estate', function () {
    return view('real-estate.real-estate');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('/','App\Http\controllers\adcontroller@all');

Auth::routes();

Route::group(['prefix' => 'category'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('index', 'App\Http\Controllers\categorycontroller@index');
        Route::get('create', 'App\Http\Controllers\categorycontroller@create');
        Route::post('store', 'App\Http\Controllers\categorycontroller@store')->name('category.store');
        Route::get('edit/{categoryid}', 'App\Http\Controllers\categorycontroller@edit');
        Route::post('update/{categoryid}', 'App\Http\Controllers\categorycontroller@update')->name('category.update');
        Route::get('delete/{categoryid}', 'App\Http\Controllers\categorycontroller@destroy');
    });
});
Route::group(['prefix' => 'sub_category'], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('index/{categoryid}', 'App\Http\Controllers\sub_categorycontroller@index');
        Route::get('create/{category_id}', 'App\Http\Controllers\sub_categorycontroller@create');
        Route::post('store', 'App\Http\Controllers\sub_categorycontroller@store')->name('sub_category.store');
        Route::get('edit/{sub_categoryid}', 'App\Http\Controllers\sub_categorycontroller@edit');
        Route::post('update/{sub_categoryid}', 'App\Http\Controllers\sub_categorycontroller@update')->name('sub_category.update');
        Route::get('delete/{sub_categoryid}', 'App\Http\Controllers\sub_categorycontroller@destroy');
    });
});
Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('edit/{userid}', 'App\Http\Controllers\usercontroller@edit');
        Route::post('update/{userid}', 'App\Http\Controllers\usercontroller@update')->name('user.update');
        Route::get('passreset/{userid}', 'App\Http\Controllers\usercontroller@passreset');
        Route::post('doreset/{userid}', 'App\Http\Controllers\usercontroller@doreset')->name('user.doreset');
        Route::get('delete/{userid}', 'App\Http\Controllers\usercontroller@destroy');
        Route::get('display', 'App\Http\Controllers\usercontroller@userdisplay');
        Route::get('ads/{user_id}', 'App\Http\Controllers\usercontroller@ads')->name('user.ads');
    });
    Route::get('index', 'App\Http\Controllers\usercontroller@index')->middleware('mainadmin');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'mainadmin'], function () {
        Route::get('register/{adminid}', 'App\Http\Controllers\admincontroller@create');
        Route::get('masteredit/{userid}', 'App\Http\Controllers\admincontroller@masteredit');
        Route::post('store', 'App\Http\Controllers\admincontroller@store')->name('admin.store');
        Route::post('masterupdate/{adminid}', 'App\Http\Controllers\admincontroller@masterupdate')->name('admins.masterupdate');
    });
    Route::group(['middleware' => 'admin'], function () {
        Route::get('index', 'App\Http\Controllers\admincontroller@index');
        Route::get('delete/{adminid}', 'App\Http\Controllers\admincontroller@destroy');
    });
    Route::get('adminlogin', 'App\Http\Controllers\admincontroller@adminlogin')->name('adminlogin')->middleware('auth');
    Route::post('dologin', 'App\Http\Controllers\admincontroller@dologin')->name('dologin')->middleware('auth');
});

Route::prefix('ad')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('create','App\Http\Controllers\adcontroller@create');
        Route::get('edit/{adid}','App\Http\Controllers\adcontroller@edit');
        Route::post('store','App\Http\Controllers\adcontroller@store')->name('ad.store');
        Route::post('update/{adid}','App\Http\Controllers\adcontroller@update')->name('ad.update');
        Route::get('delete/{adid}','App\Http\Controllers\adcontroller@destroy');
    });
    Route::get('index','App\Http\Controllers\adcontroller@index')->middleware('admin');
    Route::get('approve/{adid}','App\Http\Controllers\adcontroller@approve')->middleware('admin');
    Route::get('display/{adid}','App\Http\Controllers\adcontroller@display');
    Route::post('load/{brandid}','App\Http\controllers\adcontroller@load')->name('load');
    Route::post('gov/{govid}','App\Http\controllers\adcontroller@gov')->name('gov');
    Route::post('cat/{catid}','App\Http\controllers\adcontroller@cat')->name('cat');
    Route::get('searchcat/{int}','App\Http\controllers\adcontroller@searchcat')->name('searchcat');
    Route::post('advance','App\Http\controllers\adcontroller@advance')->name('ad.advance');
});

Route::get('payment','App\Http\Controllers\paymentcontroller@paymentform');
Route::post('store/{ad_id}','App\Http\Controllers\commentcontroller@store')->name('comment.store');

});
