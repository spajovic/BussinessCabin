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
//Rute za logovanje i registraciju
Route::post('/register',[\App\Http\Controllers\UserController::class,'register'])->name('register');
Route::post('/login',[\App\Http\Controllers\UserController::class,'login'])->name('login');
Route::get('/logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout');


Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/posts',[\App\Http\Controllers\PostController::class,'index'])->name('posts.index');
Route::get('/posts/fetch',[\App\Http\Controllers\PostController::class,'ajaxFilter']);
Route::get('/posts/{post}',[\App\Http\Controllers\PostController::class,'show'])->name('posts.show');


// Subscribe NewsLetter
Route::post('/newsletter/store',[\App\Http\Controllers\MailController::class,'subscribe'])->name('newsletter.subscribe');




// Samo za ulogovane
Route::middleware('ulogovan')->group(function (){
    //Komentari
    Route::put('/comments/store',[\App\Http\Controllers\CommentController::class,'store'])->name('comments.store');
    //Email
    Route::post('/email/send',[\App\Http\Controllers\MailController::class,'send'])->name('send.mail');
    //New image for User
    Route::post('/users/{user}',[\App\Http\Controllers\UserController::class,'updatePic'])->name('user.new.picture');
});


//Admin
Route::middleware('admin')->group(function(){
    //Pocetna
    Route::get('/admin',[\App\Http\Controllers\AdminController::class,'firstPage'])->name('admin-first');

    //Posts
    Route::get('/admin/posts',[\App\Http\Controllers\AdminController::class,'showPosts'])->name('admin-posts');
    Route::get('/admin/posts/{post}/edit',[\App\Http\Controllers\PostController::class,'edit'])->name('posts.edit');
    Route::put('admin/posts/{post}',[\App\Http\Controllers\PostController::class,'update'])->name('posts.update');
    Route::get('/admin/posts/create',[\App\Http\Controllers\PostController::class,'create'])->name('posts.create');
    Route::post('/admin/posts',[\App\Http\Controllers\PostController::class,'store'])->name('posts.store');
    Route::delete('/admin/posts/{post}',[\App\Http\Controllers\PostController::class,'destroy'])->name('posts.destroy');

    //Comments
    Route::get('/admin/comments',[\App\Http\Controllers\AdminController::class,'showComments'])->name('admin-comments');
    Route::delete('/admin/comments/{comment}',[\App\Http\Controllers\CommentController::class,'destroy'])->name('comments.destroy');

    //Categories
    Route::get('/admin/categories',[\App\Http\Controllers\AdminController::class,'showCategories'])->name('admin-categories');
    Route::get('/admin/categories/{category}/edit',[\App\Http\Controllers\CategoriesController::class,'edit'])->name('categories.edit');
    Route::put('/admin/categories/{category}',[\App\Http\Controllers\CategoriesController::class,'update'])->name('categories.update');
    Route::get('/admin/categories/create',[\App\Http\Controllers\CategoriesController::class,'create'])->name('categories.create');
    Route::post('/admin/categories',[\App\Http\Controllers\CategoriesController::class,'store'])->name('categories.store');
    Route::delete('/admin/categories/{category}',[\App\Http\Controllers\CategoriesController::class,'destroy'])->name('categories.destroy');

    //Tags
    Route::get('/admin/tags',[\App\Http\Controllers\AdminController::class,'showTags'])->name('admin-tags');
    Route::get('/admin/tags/{tag}/edit',[\App\Http\Controllers\TagController::class,'edit'])->name('tags.edit');
    Route::put('/admin/tags/{tag}',[\App\Http\Controllers\TagController::class,'update'])->name('tags.update');
    Route::get('/admin/tags/create',[\App\Http\Controllers\TagController::class,'create'])->name('tags.create');
    Route::post('/admin/tags',[\App\Http\Controllers\TagController::class,'store'])->name('tags.store');
    Route::delete('/admin/tags/{tag}',[\App\Http\Controllers\TagController::class,'destroy'])->name('tags.destroy');

    //Korisnici
    Route::get('/admin/users',[\App\Http\Controllers\AdminController::class,'showUsers'])->name('admin-users');
    Route::post('/admin/users/{user}',[\App\Http\Controllers\UserController::class,'updateRole'])->name('users.update');

    //Newsletter
    Route::get('/admin/newsletter',[\App\Http\Controllers\AdminController::class,'showNewsletter'])->name('admin-newsletter');

    //Logs
    Route::get('/admin/loginfo',[\App\Http\Controllers\AdminController::class,'showLogs'])->name('admin-loginfo');

});




