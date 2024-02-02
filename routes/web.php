<?php

use App\Models\Adventure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdventureController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function(){
//     return response('<h1>hello world</h1>',200)
//     ->header('Content-Type', 'text/plain')
//     ->header("aya", "lfena");
// });


// Route::get('/post/{id}', function($id){
//     return response('Post'. $id);
// })->where('id', '[0-9]+');


// Route::get('/search', function(Request $request){
//    return $request->name . ' ' . $request->city;
// });




//All Adventures
Route::get('/', [AdventureController::class, 'index']);

//Show create form
Route::get('/adventure/create', [AdventureController::class, 'create'])->middleware('auth');

//Store Adventure Data
Route::post('/adventure', [AdventureController::class, 'store'])->middleware('auth');

//Show the edit Adventure 
Route::get('/adventure/{adventure}/edit', [AdventureController::class, 'edit'])->middleware('auth');

//Update Adventure 
Route::put('/adventure/{adventure}', [AdventureController::class, 'update'])->middleware('auth');

//Delete Adventure 
Route::delete('/adventure/{adventure}', [AdventureController::class, 'delete'])->middleware('auth');

//Manage Adventure
Route::get('/adventure/manage', [AdventureController::class, 'manage'])->middleware('auth');

//Single Adventure
Route::get('/adventure/{adventure}', [AdventureController::class, 'show']);

//Show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//Log user out 
Route::post('/logout', [UserController::class, 'logout']);

//Show log in form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');
