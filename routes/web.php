<?php

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


//view route
Route::get('/', function () {
    return view('welcome');
});
Route::get('home', function () {
    return view('welcome');
});
Route::get('test', function (){
    echo 'welcome to laravel';
});


//route parameters
Route::get('users/{id}', function ($id){
    dd('user id = ' . $id);
});
Route::get('users/{id}/comments/{comments}', function ($id, $comments){
    dd('User id = ' . $id . ' Comment No. = ' . $comments);
});


//redirect route
/*
Route::get('blog', function (){
    return redirect()->route('my_new_blog');
});*/
Route::redirect('blog','new_blog','301'); // تم نقله بشكل دائم
Route::redirect('google','https://google.com','301');
Route::get('new_blog', function (){
    dd('my new blog');
})->name('my_new_blog');


//prefix
Route::prefix('admin')->group(function(){
    Route::get('dashboard',function (){

    });
    Route::get('products',function (){

    });
    Route::get('categories',function (){

    });
    Route::prefix('users')->group(function(){
        Route::get('profile',function (){

        });
        Route::get('reset_password',function (){

        });
    });
});


// middleware
Route::middleware(['check.ip'])->group(function (){
    Route::get('dashboard',function (){

    });
});


//rate limited
Route::middleware('throttle:5,1')->group(function (){
    Route::get('admin',function (){

    });
});

