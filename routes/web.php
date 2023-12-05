<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);
Route::get('/tutorial/{category_slug}', [App\Http\Controllers\FrontendController::class, 'viewCategoryPost']);
Route::get('/tutorial/{category_slug}/{post_slug}', [App\Http\Controllers\FrontendController::class, 'viewPost']);





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index']);

    route::get('/category', [App\Http\Controllers\Admin\CategoryController::class,'index']);
    route::get('/add-category', [App\Http\Controllers\Admin\CategoryController::class,'create']);
    route::post('/add-category', [App\Http\Controllers\Admin\CategoryController::class,'store']);
    route::get('/edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class,'edit']);    
    route::put('/update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class,'update']);
    // route::get('/delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class,'destroy']);
    route::post('delete-category/', [App\Http\Controllers\Admin\CategoryController::class,'destroy']);

    route::get('posts', [App\Http\Controllers\Admin\PostController::class,'index']);
    route::get('add-post', [App\Http\Controllers\Admin\PostController::class,'create']);
    route::post('add-post', [App\Http\Controllers\Admin\PostController::class,'store']);
    route::get('/post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'edit']);
    route::put('/update-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'update']);
    route::get('/delete-post/{post_id}',[App\Http\Controllers\Admin\PostController::class,'destroy']);

    route::get('/users',[App\Http\Controllers\Admin\UserController::class,'index']);
    route::get('/user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'edit']); 
    route::put('/update-user/{user_id}',[App\Http\Controllers\Admin\UserController::class,'update']);      
    
});

