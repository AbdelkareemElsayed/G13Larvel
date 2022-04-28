<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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

Route :: middleware(['lang'])->group(function(){

Route::get('/', function () {
    return view('welcome');
});



// Route::get('Blade', function () {
//     return view('blades');
// });


// Route::get('User/Create',[userController::class,'Create']);
// Route::post('User/Store',[userController::class,'Store']);
// Route::get('User/prfile',[userController::class,'profile']);


Route :: middleware(['studentCheck'])->group(function(){

    Route::get('Student/',[studentController::class,'index']);   //->middleware('studentCheck');
    Route::get('Student/Create',[studentController::class,'Create']);
    Route::post('Student/Store',[studentController::class,'Store']);
    Route::get('Student/delete/{id}',[studentController::class,'destroy'])->middleware('checkDelete');
    Route::get('Student/edit/{id}',[studentController::class,'edit']);
    Route::post('Student/update/{id}',[studentController::class,'update']);



    # Blog Crud Routes
    Route::resource('Blog', blogController::class);

/*
 /Blog             GET       index      >>>    Route::get('Blog',[blogController :: class , 'index'])
 /Blog/create      GET       create     >>>    Route::get('Blog/create',[blogController :: class , 'create'])
 /Blog             POST      Store      >>>    Route::post('Blog',[blogController :: class , 'Store'])
 /Blog/{id}/edit   GET       Edit       >>>    Route::get('Blog/{id}/edit',[blogController :: class , 'edit'])
 /Blog/{id}        PUT       update     >>>    Route::put('Blog/{id}',[blogController :: class , 'update'])
 /Blog/{id}        Delete    delete     >>>    Route::delete('Blog/{id}',[blogController :: class , 'delete'])
 /Blog/{id}        GET       show       >>>    Route::get('Blog/{id}',[blogController :: class , 'show'])

 Route::get('Message',['Blog',blogController :: class , 'message']);

*/


});








Route::get('Login',[studentController::class,'login']);
Route::post('DoLogin',[studentController::class,'DoLogin']);
Route::get('Logout',[studentController::class,'logout']);




Route::get('Session',[studentController::class,'testSession']);



  Route::get('Lang/{lang}',function ($lang){

    # SET SESSION LANGAUGE .....
    session()->put('lang',$lang);

     return back();

  });

});



// Route::get('message/{name}/{id?}',function($name,$id = null){

//     echo 'Name : '.$name.' && id = '.$id;
// })->where(['id' => '[0-9]+'  , 'name' => '[a-zA-Z]+' ]);
// ->where('id','[0-9]+')->where('name','[a-zA-Z]+');


// Route::get('User/Create',function(){
//     return view('Create');
// });


// Route::post('User/Store',function(){
//     echo 'Store Method .... ';
// });

// Route::view('User/Create','Create');


// http://127.0.0.1:8000/message?id=2013
// http://127.0.0.1:8000/message/2013

/*
get
post
put
patch
delete

view


        composer update
        rename .env.example to .env
        php artisan key:generate


*/





