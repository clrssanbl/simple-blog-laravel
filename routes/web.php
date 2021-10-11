<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;


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

Route::get('/', [HomeController::class,'index']);
//halaman semua post
Route::get('/posts', [PostController::class, 'index']);

//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

//add comment
Route::post('/comment/add',[CommentController::class,'store'])->name('comment.add')->middleware('auth');;
//add reply comment
Route::post('/reply/store', [CommentController::class,'replyStore'])->name('reply.add')->middleware('auth');;
//delete comment
Route::delete('/comment/delete/{comment:id}', [CommentController::class,'destroy'])->middleware('auth');;

//show all category
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

//login &register
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//halaman dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

//post activities
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');


/* Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'title' => "Post by Category : $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'author'),
    ]);
}); */

/* Route::get('/authors/{author:username}', function(User $author) {
    return view('posts', [
        'title' => "Post By Author : $author->name",
        "active" => 'posts',
        'posts' => $author->posts->load('category','author'),
    ]);
}); */

/* Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home',
    ]);
}); */



/* Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => 'about',
        "name" => "Clarissa Nabila",
        "email" => "clarissanabila@gmail.com",
        "image" => "Pas Foto (3x4).png"
    ]);
}); */
