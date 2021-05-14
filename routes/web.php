<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SettingsController;

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

Route::get('/',[App\Http\Controllers\FrontEndController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{slug}', [App\Http\Controllers\FrontEndController::class, 'single'])->name('single');
Route::get('/category/{id}',[App\Http\Controllers\FrontEndController::class, 'category'])->name('category.single');
Route::get('/tag/{id}',[App\Http\Controllers\FrontEndController::class, 'tag'])->name('tag.single');


Route::get('/results', [App\Http\Controllers\FrontEndController::class, 'search']);

Route::group(['prefix'=>'admin','middleware' =>'auth'],function(){

    Route::get('post/create',[PostController::class, 'create'])->name('post.create');
    Route::post('post/store', [PostController::class, 'store' ])->name('post.store');
    Route::get('category/create',[CategoryController::class , 'create'])->name('category.create');
    Route::post('category/store',[CategoryController::class , 'store'])->name('category.store');
    Route::get('/categories',[CategoryController::class , 'index'])->name('categories');
    Route::get('/category/edit/{id}',[CategoryController::class , 'edit'])->name('category.edit');
    Route::get('/category/delete/{id}',[CategoryController::class , 'destroy'])->name('category.delete');
    Route::post('/category/update/{id}',[CategoryController::class , 'update'])->name('category.update');
    Route::get('/posts',[PostController::class, 'index'])->name('posts');
    Route::get('/posts/delete/{id}',[PostController::class, 'destroy'])->name('post.delete');
    Route::get('/posts/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
    Route::get('/posts/trashed', [PostController::class,'trashed'])->name('posts.trashed');
    Route::get('/posts/deletepermanent/{id}',[PostController::class,'postkill'])->name('post.kill');
    Route::get('/posts/restore/{id}',[PostController::class ,'postrestore'])->name('post.restore');
    Route::post('/posts/update/{id}',[PostController::class ,'update'])->name('post.update');
    Route::get('/tags' , [TagsController::class , 'index'])->name('tags');
    Route::get('/tags/edit/{id}' , [TagsController::class , 'edit'])->name('tag.edit');
    Route::post('/tags/update/{id}' , [TagsController::class , 'update'])->name('tag.update');
    Route::get('/tags/delete/{id}' , [TagsController::class , 'destroy'])->name('tag.delete');
    Route::get('/tags/create' , [TagsController::class , 'create'])->name('tag.create');
    Route::post('/tags/store' , [TagsController::class , 'store'])->name('tag.store');
    Route::get('/users',[UserController::class , 'index'])->name('users');
    Route::get('/create/user', [UserController::class, 'create'])->name('users.create');
    Route::post('/user/create' , [UserController::class, 'store'])->name('user.store');
    Route::get('/user/admin/{id}', [UserController::class, 'makeadmin'])->name('user.admin')->middleware('admin');
    Route::get('/user/user/{id}', [UserController::class, 'makeuser'])->name('user.user');
     Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/user/edit',[ProfilesController::class, 'index'])->name('user.edit');
    Route::post('/user/update',[ProfilesController::class, 'update'])->name('user.update');
    Route::get('/settings', [SettingsController::class,'index'])->name('settings');
    Route::post('/settings/update' , [SettingsController::class,'update'])->name('settings.update');
    

   
});




