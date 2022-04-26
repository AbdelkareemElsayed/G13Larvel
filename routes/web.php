<?php

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

Route::get('/', function () {
    return view('welcome');
});



// Route::get('Blade', function () {
//     return view('blades');
// });


// Route::get('User/Create',[userController::class,'Create']);
// Route::post('User/Store',[userController::class,'Store']);
// Route::get('User/prfile',[userController::class,'profile']);



Route::get('Student/',[studentController::class,'index']);
Route::get('Student/Create',[studentController::class,'Create']);
Route::post('Student/Store',[studentController::class,'Store']);
Route::get('Student/delete/{id}',[studentController::class,'destroy']);
Route::get('Student/edit/{id}',[studentController::class,'edit']);
Route::post('Student/update/{id}',[studentController::class,'update']);


Route::get('Login',[studentController::class,'login']);
Route::post('DoLogin',[studentController::class,'DoLogin']);
Route::get('Logout',[studentController::class,'logout']);




Route::get('Session',[studentController::class,'testSession']);



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
*/





