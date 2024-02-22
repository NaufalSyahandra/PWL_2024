<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
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

//Basic Routing

Route::get('/', function () {
    return view('Selamat Datang');
});

Route::get('/hello', function () {
    return 'hello world';
});

Route::get('/world', function () {
    return 'world';
});

Route::get('/selamat', function () {
    return 'Selamat Datang';
});

Route::get('/about', function () {
    return 'NIM : 2241720189' . '<br>' . 'Nama : Mohammad Naufal Syahandra';
});

//Route Parameter

Route::get('/user/{name}', function ($name) {
    return 'Nama Saya ' . $name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'pos ke-' . $postId . ' komentar ke-: ' . $commentId;
});

Route::get('/articels/{id}', function ($id) {
    return 'Halaman Artikel dengan ID ' . $id;
});

//Optional Rating

Route::get('/user/{name?}', function ($name = 'John') {
    return "Nama Saya $name";
});

//Route Name

Route::get('/user/profile/{name}', function ($name) {
    return "Nama Saya $name";
})->name('profile');

Route::get('/trueProfile', function () {
    return to_route('profile', ['name' => 'Naufal']);
});

/**
 * Group Routing
 */
/*Route::middleware(['first', 'second'])->group(function () { Route::get('/', function () {
// Uses first & second middleware...
});
    Route::get('/user/profile', function () {
// Uses first & second middleware...
    });
});*/

/**
 * Group Routing
 */
//Route::domain('{account}.example.com')->group(function ()
//{ Route::get('user/{id}', function ($account, $id) {
//    //
//    });
//});

/**
 * Group Routing
 */
//Route::middleware('auth')->group(function () {
//    Route::get('/user', [UserController::class, 'index']);
//    Route::get('/post', [PostController::class, 'index']);
//    Route::get('/event', [EventController::class, 'index']);
//});

/**
 * Prefixes Routing
 */
//Route::prefix('admin')->group(function () {
//    Route::get('/user', [UserController::class, 'index']);
//    Route::get('/post', [PostController::class, 'index']);
//    Route::get('/event', [EventController::class, 'index']);
//});

/**
 * Redirect Routing
 */
Route::redirect('/here', '/there');

/**
 * View Routing
 */
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

//Routing with Controller

Route::get('/hello', [WelcomeController::class, 'hello']);

//Routing For modified Practicum point 2

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/articles/{id}', [PageController::class, 'articles']);

//Resource Controller

Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only(['index', 'show']);

Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);

//View

Route::get('/greeting', function () {
    return view('blog.hello', ['name' => 'Naufal']);
});

Route::get('/greeting', [WelcomeController::class, 'greeting']);
