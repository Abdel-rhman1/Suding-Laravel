<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/' , function(){
    return view('front.index');
})->name('home2');

Route::post('/' , function(){
    return view('front.index');
})->name('tr')->middleware('auth');

Route::get('/contuct-us' , function(){
    return view('front.contuct-us');
})->name('contuct-us');


Route::get('/redirect/{service}' , 'SocialController@redirect');
Route::get('/callback' , 'SocialController@callback');
Route::get('/about-us' , function(){
    return view('front.about-us');
})->name('about-us');


Route::group(['prefix'=>'offer'] , function(){
    
    Route::group(['prefix'=>'create'] , function(){
        Route::get('/' , 'CURD@create');
        Route::get('/locale/{locale}' , function($locale){
            Session::put('locale' , $locale);
            return redirect()->back();
        })->name('locale');
    });
    Route::group(['prefix' => 'index'] , function (){
        Route::get('/' ,'CURD@index');
        Route::get('/locale/{locale}' , function($locale){
            Session::put('locale' , $locale);
            return redirect()->back();
        });
    });
    // offer/Edit/{offer_id}
    Route::group(['prefix' => '/Edit'] , function(){
        Route::get('/Edit/{id}' , 'CURD@edit')->name('offer_edit');
    });
    Route::post('/store' , 'CURD@store')->name('offerstore');
});


Route::get('locale/{locale}' , function($locale){
    Session::put('locale' , $locale);
    return redirect()->back();
});