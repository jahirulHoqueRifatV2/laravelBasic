<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/database',function(){

    $fetchData= DB::select('select * from migrations');
    echo "<pre>";

    print_r($fetchData);

    echo "</pre>";
});

//Route::controller('/home2',homeController@hello);






Route::group(['prefix' => 'admin'],function(){

    Route::get('/', function () {
        return 'Admin Dashboard';
    });
    Route::get('/user-list', function () {
        return 'Admin Dashboard user list';
    });
    Route::get('/create-blog', function () {
        return 'Admin Dashboard create blog page';
    });
    Route::get('/profile',function(){
        return view('admin.profile',['name' => 'Jahirul Hoque']);
    });


});

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('home');
    });

});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');;
});
