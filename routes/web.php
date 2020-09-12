<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
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
Route::get('/contact',function(){
    return view('contact');
});
Route::post('/contact',function(Request $request)
{
    Mail::send(new ContactMail($request));
    return redirect('/');
}); 
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/', 'WebsiteController@index')->name('index');
Route::get('category/{slug}', 'WebsiteController@category')->name('category');
Route::get('post/{slug}', 'WebsiteController@post')->name('post');
Route::get('page/{slug}', 'WebsiteController@page')->name('page');
Route::get('contact', 'WebsiteController@showContactForm',)->middleware(['auth','admin'])->name('contact.show');
Route::post('contact', 'WebsiteController@submitContactForm')->middleware(['auth','admin'])->name('contact.submit');


Route::get('blogerpost', 'BlogerController@create')->name('blogerpost');
Route::post('blogerpostsave', 'BlogerController@store')->name('blogerpostsave');



Route::get('post/createcomment', 'WebsiteController@createcomment')->name('createcomment');
Route::post('post/{post}/storecomment', 'WebsiteController@storecomment')->where('post','[0-9]+')->name('storecomment');

Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('posts', 'PostController');
    Route::resource('pages', 'PageController');
    Route::resource('galleries', 'GalleryController');
});



