<?php

use App\Models\Post;
use App\Models\Ulasan;
use App\Models\Category;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [PostController::class, "index"])->name("home");

Route::get('/ulasan/{novel}', [UlasanController::class, 'index'])->name('ulasan');
// Route::controller(PostController::class)
//     ->as("posts.")
//     ->group(function () {
//         Route::get("/posts", "index")->name("index");
//         Route::get("/post/{post:slug}", "index")->name("show");
//     });

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    $post = Post::where('user_id', auth()->user()->id)->get();
    $jumlahProduk = $post->count();
    $ulasan = Ulasan::where('user_id', auth()->user()->id)->get();
    $jumlahLike = $ulasan->filter(function ($e) {
        if ($e->rate == "like") {
            return $e;
        }
    })->count();
    $jumlahDislike = $ulasan->filter(function ($e) {
        if ($e->rate == "dislike") {
            return $e;
        }
    })->count();
    return view('dashboard.index', [
        'jumlahProduk' => $jumlahProduk,
        'ulasan' => $ulasan,
        'jumlahLike' => $jumlahLike,
        'jumlahDislike' => $jumlahDislike
    ]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)
    ->names("dashboard.posts")
    ->middleware('auth');
